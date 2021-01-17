<?php

include "../../storage/Paziente.php";
include "../../storage/Pacchetto.php";
include "../../storage/Fattura.php";
include "../../storage/scelta.php";
include "../../storage/Professionista.php";
include "../../storage/Terapia.php";
include "../../storage/Compito.php";
include ("../../storage/DatabaseInterface.php");
include ("../../plugins/libArray/FunArray.php");
include "../../applicationLogic/PazienteControl.php";
include "../../applicationLogic/PacchettoControl.php";
include "../../applicationLogic/ProfessionistaControl.php";
include "../../applicationLogic/terapiaControl.php";
include "../../applicationLogic/CompitoControl.php";

session_start();
$tipoUtente = $_SESSION["tipo"];
if($tipoUtente != "paziente"){
    header("Location: ../Utente/login.php");
}
$cfPaziente = $_SESSION["codiceFiscale"];



$paz = PazienteControl::getPaz($cfPaziente);

$img=base64_encode($paz->getFotoProfiloPaz());

$pacchettiPaz = PacchettoControl::selectAllPacchettoPaz($cfPaziente);
$professionistiByPaz = ProfessionistaControl::getProfessionistByPaz($cfPaziente);
$compitiPaz = CompitoControl::selectAllCompitiPaz($cfPaziente);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home page Paziente</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="../../dist/js/paziente.js"></script>
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
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
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
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
                    <a href="areaPersonalePaziente.php" class="d-block"><?php echo $paz->getNome() ." ". $paz->getCognome(); ?>  <i class="nav-icon fas fa-book-open" style="padding-left: 2%;" ></i></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item ">
                        <a href="indexProfessionista.html" class="nav-link">
                            <i class="nav-icon fas fa-address-book"></i>
                            <p>
                                Area Informativa
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Pazienti.html" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Pazienti
                            </p>
                        </a>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="calendario.html" class="nav-link">
                            <i class="nav-icon fas fa-calendar"></i>
                            <p>
                                Appuntamenti
                            </p>
                        </a>

                    </li>
                    <li class="nav-item has-treeview">
                        <a href="Pacchetti.html" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                Pacchetti
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- FINE MENU' A SINISTRA -->



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Home</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-6">
                    <div class="card card-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-info">
                            <h3 class="widget-user-username"><?php echo $paz->getNome()." ".$paz->getCognome() ?></h3>

                        </div>
                        <div class="widget-user-image">
                            <?php if ($img != NULL) {
                                echo '<img class="img-circle elevation-2" src="data:image/jpeg;base64,'.$img.'"/>' ;
                            }
                            else {
                                echo '<img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">';
                            }

                            ?>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header"><?php echo $paz->getEmail() ?></h5>
                                        <span class="description-text">Email</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header"><?php echo $paz->getTelefono() ?></h5>
                                        <span class="description-text">CELLULARE</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header"><?php echo $paz->getIndirizzo() ?></h5>
                                        <span class="description-text">Indirizzo </span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    </div>



                    <div class="col-md-6">
                    <div class="card" >
                        <div class="card-header border-0">
                            <h3 class="card-title">Pacchetti acquistati</h3>
                            <!--  <div class="" style="float: right" >
                                <button type="button" class="btn btn-primary" name="button">Aggiungi</button>
                              </div> -->
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                <tr>
                                    <th>Pacchetto</th>
                                    <th>Prezzo</th>
                                    <th>numero di visite</th>
                                </tr>
                                </thead>

                                <?php  if($pacchettiPaz !=NULL){
                                    for($i=0;$i<count($pacchettiPaz);$i++){


                                        ?>
                                        <form method="post" action="../../applicationLogic/PacchettoControlForm.php">
                                            <input type="text" name="action" value="delPacchetto" hidden="true">
                                            <input type="text" name="idPacchetto" value= <?php echo $pacchettiPaz[$i]->getIdPacchetto(); ?> hidden="true">
                                            <tbody>
                                            <tr>
                                                <td >
                                                    <?php echo $pacchettiPaz[$i]->getTipologia(); ?>
                                                </td>
                                                <td >
                                                    <?php echo $pacchettiPaz[$i]->getPrezzo(); ?>
                                                </td>
                                                <td>
                                                    <?php echo $pacchettiPaz[$i]->getNSedute(); ?>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </form>
                                        <?php
                                    }
                                }
                                else{
                                    echo "<tbody>
                  <tr>
                    <td >
                        vuota
                    </td>
                    <td >
                     vuota
                    </td>
                    <td></td>
                  </tr>

                  </tbody>";
                                } ?>
                            </table>
                        </div>
                    </div>
                    </div>



                    <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Professionisti</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Cognome</th>
                                    <th style="width: 40px">info</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if($professionistiByPaz != NULL){

                                    for($i=0;$i<count($professionistiByPaz);$i++){ ?>
                                        <tr>
                                            <td><?php echo $professionistiByPaz[$i]->getNome(); ?></td>
                                            <td><?php echo $professionistiByPaz[$i]->getCognome(); ?></td>
                                            <td><form class="" action="../Utente/schedaProfessionista.php" method="post">
                                                    <input type="text" name="codFiscaleProf" value="<?php echo $professionistiByPaz[$i]->getCfProf();  ?>" hidden ="true">
                                                    <button type="submit" class="btn btn-primary btn-sm" name="button" style="background-color: #007bff; border-color: #007bff;">
                                                        <i class="nav-icon fas fa-table">
                                                            View Profile
                                                        </i>

                                                    </button>

                                                </form></i></td>
                                        </tr>
                                    <?php }
                                }

                                else{
                                    echo '<tr>
                                            <td>vuoto</td>
                                            <td>vuoto</td>
                                            <td>vuoto</td>
                                        </tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn-primary" onclick="checkChiamata()" id="bottoneCheck">Controlla videochiamata</button>
                            <button type="button" class="btn-primary" onclick="vaiChiamata()" id="bottoneChiamata" style="float:right">Vai a videochiamata</button>
                        </div>
                    </div>
                    </div>


                    <div class="col-md-6">
                        <div class="card" >
                            <div class="card-header border-0">
                                <h3 class="card-title">Compiti</h3>
                                <!--  <div class="" style="float: right" >
                                    <button type="button" class="btn btn-primary" name="button">Aggiungi</button>
                                  </div> -->
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                    <tr>
                                        <th>data</th>
                                        <th>titolo</th>
                                        <th>stato</th>
                                    </tr>
                                    </thead>

                                    <?php  if($compitiPaz !=NULL){
                                        for($i=0;$i<count($compitiPaz);$i++){


                                            ?>

                                                <tbody>
                                                <tr>
                                                    <td >
                                                        <?php echo $compitiPaz[$i]->getData(); ?>
                                                    </td>
                                                    <td >
                                                        <?php echo $compitiPaz[$i]->getTitolo(); ?>
                                                    </td>
                                                    <td>
                                                        <?php $eff = $compitiPaz[$i]->getEffettuato();
                                                              if ($eff == 1){
                                                                echo "compito svolto";
                                                              }
                                                              else if($eff == 0){
                                                                  echo "compito non svolto";
                                                              }
                                                        ?>
                                                    </td>
                                                </tr>
                                                </tbody>

                                            <?php
                                        }
                                    }
                                    else{
                                        echo "<tbody>
                  <tr>
                    <td >
                        vuota
                    </td>
                    <td >
                     vuota
                    </td>
                    <td></td>
                  </tr>

                  </tbody>";
                                    } ?>
                                </table>
                            </div>
                        </div>
                    </div>







                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>
    $("#bottoneChiamata").hide();
</script>
</body>
</html>
