<?php
/*
* Pazienti
* Questa View fornisce tutti gli elementi grafici della home page relativa alla lista di pazienti
* Autore: Giuseppe Ferrante
* Versione: 0.1
* 2020 Copyright by PsyMeet - University of Salerno
*/
include ("../../storage/DatabaseInterface.php");
include ("../../plugins/libArray/FunArray.php");
include "../../applicationLogic/PazienteControl.php";
include "../../storage/Paziente.php";
include "../../storage/Terapia.php";
include '../../applicationLogic/AuntenticazioneControl.php';
include "../../storage/Professionista.php";
include "../../applicationLogic/AreaInformativaControl.php";

session_start();
$tipoUtente = $_SESSION["tipo"];
if($tipoUtente != "professionista" || $tipoUtente == null){
  header("Location: ../Utente/login.php");
}

$cfProfessionista = $_SESSION["codiceFiscale"];
$professionista = AreaInformativaControl::getProf($cfProfessionista);
$img=base64_encode($professionista->getImmagineProfessionista());
$listPaz = PazienteControl::getPazientiByProf($cfProfessionista);
$listPazNonCur = PazienteControl::getListPaz();
if($listPazNonCur != null && $listPaz !=null){
    for($j=0;$j<count($listPaz);$j++){
        for($i=0;$i<count($listPazNonCur);$i++){
            if($listPazNonCur[$i]->getCf() == $listPaz[$j]->getCf()){
                unset($listPazNonCur[$i]);
                $listPazNonCur = array_values($listPazNonCur);
                break;
            }
        }
    }
}
$_SESSION["cfPazTer"] = "";



 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Pazienti</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>

    <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- MENU' A SINISTRA -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" >
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="../../dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text font-weight-light">PsyMeet</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <?php if ($img != NULL) {
                            echo '<img class="img-circle elevation-2" src="data:image/jpeg;base64,'.$img.'"/>' ;
                        }
                        else {
                            echo '<img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">';
                        }

                        ?>
                    </div>
                    <div class="info">
                        <a href="areaPersonaleProfessionista.php" class="d-block"><?php echo $professionista->getNome() ." ". $professionista->getCognome(); ?> <i class="nav-icon fas fa-book-open" style="padding-left: 2%;" ></i></a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-item ">
                            <a href="indexProfessionista.php" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                    Area Informativa
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Pazienti.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Pazienti
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="calendario.php" class="nav-link">
                                <i class="nav-icon fas fa-calendar"></i>
                                <p>
                                    Appuntamenti
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="gestionePacchettiProf.php" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>
                                    Pacchetti
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a class="btn btn-danger" href="../../applicationLogic/logout.php">Logout</a>
                        </li>
                    </ul>
                </nav> -->
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- FINE MENU' A SINISTRA -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Pazienti</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active"><?php echo $professionista->getNome() ." ". $professionista->getCognome(); ?></li>
                  <li class="breadcrumb-item active">Pazienti</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
            <span style="color:red"><?php if(isset($_SESSION['eccezione'])){echo $_SESSION['eccezione'];} ?></span>
        </div>
        <!-- /.content-header -->


    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">
        <div class="row">
        <div class="col-lg-12" >
              <!-- Default box -->
              <div class="card">
                <div class="card-body p-0">
                  <table class="table table-striped projects">
                      <thead>
                          <tr>
                              <th >
                                  Nome e Cognome
                              </th>
                              <th >
                                  Avatar
                              </th>
                              <th>
                                Dettagli
                              </th>

                              <th >
                              </th>
                          </tr>
                      </thead>
                      <?php if($listPaz != null){ ?>
                      <tbody>

                        <?php for($i=0 ; $i < count($listPaz) ; $i++){
                          $img=base64_encode($listPaz[$i]->getFotoProfiloPaz()); ?>
                          <tr>

                              <td>
                                  <a>
                                      <?php echo $listPaz[$i]->getNome() ." ". $listPaz[$i]->getCognome();?>
                                  </a>
                                  <br/>

                              </td>
                              <td>
                                    <?php if($img != NULL){
                                       echo '<img class="table-avatar" src="data:image/jpeg;base64,'.$img.'"/>';
                                    }

                                    else {
                                      echo '<img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">';
                                    }
                                    ?>


                              </td>
                              <td style=" padding-left: 35px;">

                                <form class="" action="SchedaPaziente.php" method="post">
                                  <input type="text" name="codFiscalePaz" value="<?php echo $listPaz[$i]->getCf();  ?>" hidden ="true">
                                    <button type="submit" class="btn btn-primary btn-sm" name="button" >

                                      <i class="fas fa-search" ></i>
                                    </button>

                                    </form>
                              <!--      <a href="SchedaPaziente.html" class="text-muted">
                                  <i class="fas fa-search"></i>
                                </a>-->


                              </td>
                              <td class="project-actions text-right">
                              <form class="" action="../../applicationLogic/GestioneCartellaClinica.php" method="post">
                                <input type="text" name="codFiscalePaz" value="<?php echo $listPaz[$i]->getCf();  ?>" hidden ="true">
                                <input type="text" name="azione" value="visualizza" hidden ="true">
                                  <button type="submit" class="btn btn-primary btn-sm" name="button" style="background-color: #9966ff; border-color: #9966ff; margin-bottom:1%;">
                                      <i class="nav-icon fas fa-table">
                                        Cartella Clinica
                                      </i>
                              </form>

                              <!--   <a class="btn btn-primary btn-sm" style="background-color: #9966ff; border-color: #9966ff;"href="gestioneTerapia.php"></a> -->
                              <form class="" action="gestioneTerapia.php" method="post">
                                <input type="text" name="codFiscalePaz" value="<?php echo $listPaz[$i]->getCf();  ?>" hidden ="true">
                                  <button type="submit" class="btn btn-primary btn-sm" name="button" style="background-color: #9966ff; border-color: #9966ff;width:38.2%;">
                                      <i class="nav-icon fas fa-table">
                                        Terapia
                                      </i>

                                  </button>

                                  </form>
                              </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                      <?php } ?>
                  </table>
                </div>
              </div>
            </div>
        <?php echo $_SESSION["cfPazTer"]; ?>


                <!-- /.card-body -->
        </div>
              <!-- /.card -->
    </section>
    <!-- /.content -->


          <section class="content">
              <h5>Pazienti non in cura</h5>
              <!-- Lista Pazienti non in cura-->
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-12" >
                          <!-- Default box -->
                          <div class="card">
                              <div class="card-body p-0">
                                  <table class="table table-striped projects">
                                      <thead>
                                      <tr>
                                          <th >
                                              Nome e Cognome
                                          </th>
                                          <th >
                                              Avatar
                                          </th>
                                          <th>
                                              Dettagli
                                          </th>

                                          <th >
                                          </th>
                                      </tr>
                                      </thead>
                                      <?php if($listPazNonCur != null){ ?>
                                          <tbody>

                                          <?php for($i=0 ; $i < count($listPazNonCur) ; $i++){
                                              $img=base64_encode($listPazNonCur[$i]->getFotoProfiloPaz()); ?>
                                              <tr>

                                                  <td>
                                                      <a>
                                                          <?php echo $listPazNonCur[$i]->getNome() ." ". $listPazNonCur[$i]->getCognome();?>
                                                      </a>
                                                      <br/>

                                                  </td>
                                                  <td>
                                                      <?php if($img != NULL){
                                                          echo '<img class="table-avatar" src="data:image/jpeg;base64,'.$img.'"/>';
                                                      }

                                                      else {
                                                          echo '<img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">';
                                                      }
                                                      ?>


                                                  </td>
                                                  <td style=" padding-left: 35px;">

                                                      <form class="" action="SchedaPaziente.php" method="post">
                                                          <input type="text" name="codFiscalePaz" value="<?php echo $listPazNonCur[$i]->getCf();  ?>" hidden ="true">
                                                          <button type="submit" class="btn btn-primary btn-sm" name="button" >

                                                              <i class="fas fa-search" ></i>
                                                          </button>

                                                      </form>
                                                      <!--      <a href="SchedaPaziente.html" class="text-muted">
                                                          <i class="fas fa-search"></i>
                                                        </a>-->


                                                  </td>
                                                  <td class="project-actions text-right">
                                                      <!--   <a class="btn btn-primary btn-sm" style="background-color: #9966ff; border-color: #9966ff;"href="gestioneTerapia.php"></a> -->
                                                      <form class="" action="gestioneTerapia.php" method="post">
                                                          <input type="text" name="codFiscalePaz" value="<?php echo $listPazNonCur[$i]->getCf();  ?>" hidden ="true">
                                                          <button type="submit" class="btn btn-primary btn-sm" name="button" style="background-color: #9966ff; border-color: #9966ff;">
                                                              <i class="nav-icon fas fa-table">
                                                                  Inizia una terapia
                                                              </i>

                                                          </button>

                                                      </form>
                                                  </td>
                                              </tr>
                                          <?php } ?>
                                          </tbody>
                                      <?php } ?>
                                  </table>
                              </div>
                          </div>
                      </div>
                      <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
          </section>


  </div>
  <!-- /.content-wrapper -->

</div>



    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="../../dist/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="../../plugins/chart.js/Chart.min.js"></script>
    <script src="../../dist/js/demo.js"></script>
    <script src="../../dist/js/pages/dashboard3.js"></script>
  </body>
</html>
