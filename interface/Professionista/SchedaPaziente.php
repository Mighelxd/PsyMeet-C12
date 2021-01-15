<?php

include "../../storage/professionista.php";
include ("../../storage/DatabaseInterface.php");
include ("../../plugins/libArray/FunArray.php");
include "../../applicationLogic/ProfessionistaControl.php";
include "../../applicationLogic/PazienteControl.php";
include "../../storage/Paziente.php";

session_start();
$tipoUtente = $_SESSION["tipo"];
if($tipoUtente != "professionista"){
  header("Location: ../Utente/login.php");
}


$cfProfessionista = $_SESSION["codiceFiscale"];
//$cfPazienteTer = $_POST["codFiscalePaz"];
$cfPazienteTer = isset($_POST["codFiscalePaz"]) ? $_POST['codFiscalePaz'] : "";
if($cfPazienteTer != ""){
   $_SESSION["cfPazTer"] = $cfPazienteTer;
}
else if ($cfPazienteTer == "") {
  $cfPazienteTer = $_SESSION["cfPazTer"];
}

$paziente = PazienteControl::getPaz($cfPazienteTer);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Dati Paziente</title>

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
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li>
        </ul>




      </nav>

      <!-- INIZIO MENU SINISTRA -->
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
              <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="areaPersonale.html" class="d-block">Alexander Pierce <i class="nav-icon fas fa-book-open" style="padding-left: 2%;" ></i></a>
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
              <li class="nav-item has-treeview menu-open">
                <a href="Pazienti.html" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Pazienti
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview menu-open" style="padding-left:2%;">
                  <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                      <i class="fas fa-user nav-icon"></i>
                      <p><?php echo $paziente->getNome() ." ". $paziente->getCognome(); ?>
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview" style="padding-left: 2%;">
                      <li class="nav-item has-treeview">
                        <a href="gestioneTerapia.html" class="nav-link">
                          <i class="fas fa-clipboard nav-icon"></i>
                          <p>Terapia
                          </p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="cartellaClinica.html" class="nav-link">
                          <i class="fas fa-notes-medical nav-icon"></i>
                          <p>Cartella clinica</p>
                        </a>
                        <li class="nav-item">
                          <a href="#" class="nav-link active">
                            <i class="fas fa-id-card-alt nav-icon"></i>
                            <p>Dati Paziente
                            </p>
                          </a>
                        </li>
                        <li class="nav-item has-treeview">
                          <a href="#" class="nav-link">
                          <i class="fas fa-brain nav-icon"></i>
                          <p>Sedute
                            <i class="right fas fa-angle-left"></i>
                          </p>
                          </a>
                          <ul class="nav nav-treeview" style="padding-left: 1%;">
                            <li class="nav-item">
                              <a href="SchedaPrimoColloquio.html" class="nav-link">
                                <i class="fas fa-clipboard nav-icon"></i>
                                <p>Primo colloquio
                                </p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="SchedaAssessmentGeneralizzato.html" class="nav-link">
                                <i class="fas fa-clipboard nav-icon"></i>
                                <p>Assessment generalizzato
                                </p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="SchedaAssessmentFocalizzato.html" class="nav-link">
                                <i class="fas fa-clipboard nav-icon"></i>
                                <p>Assessment focalizzato
                                </p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="SchedaFollowUp.html" class="nav-link">
                                <i class="fas fa-clipboard nav-icon"></i>
                                <p>Follow-up
                                </p>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a href="SchedaModelloEziologico.html" class="nav-link">
                                <i class="fas fa-clipboard nav-icon"></i>
                                <p>Modello eziologico
                                </p>
                              </a>
                            </li>
                          </ul>
                        </li>
                        <li class="nav-item">
                          <a href="gestioneCompiti.html" class="nav-link">
                            <i class="fas fa-sticky-note nav-icon"></i>
                            <p>Compiti
                            </p>
                          </a>
                        </li>
                    </ul>
                  </li>
                </ul>
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
                <a href="Pacchetti.html" class="nav-link">
                  <i class="nav-icon fas fa-shopping-cart"></i>
                  <p>
                    Pacchetti
                  </p>
                </a>
              </li>

            </ul>
          </nav> -->
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
      <!-- FINE MENU SINISTRA -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dati Paziente</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Dati Paziente</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">
        <div class="row">

    <div class="col-lg-12" >
      <div class="card card-primary" >
        <div class="card-header"style="background-color: #28a745">
          <h3 class="card-title" >Info</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

          <div class="card-body">
            <div class="form-group">
              <label for="pacchettoNew">Nome</label>
              <input type="text" class="form-control" readonly value="<?php echo $paziente->getNome(); ?>">
            </div>
            <div class="form-group">
              <label for="text">Cognome</label>
              <input type="text" class="form-control" readonly value="<?php echo $paziente->getCognome(); ?>">
            </div>
            <div class="form-group">
              <label for="text">Data di nascita</label>
              <input type="text" class="form-control" readonly value="<?php echo $paziente->getDataNascita(); ?>">
            </div>
            <div class="form-group">
              <label for="text">Email</label>
              <input type="text" class="form-control" readonly value="<?php echo $paziente->getEmail(); ?>">
            </div>
            <div class="form-group">
              <label for="text">Telefono</label>
              <input type="text" class="form-control" readonly value="<?php echo $paziente->getTelefono(); ?>">
            </div>
            <div class="form-group">
              <label for="text">Indirizzo</label>
              <input type="text" class="form-control" readonly value="<?php echo $paziente->getIndirizzo(); ?>">
            </div>
            <div class="form-group">
              <label for="text">Istruzione</label>
              <input type="text" class="form-control" readonly value="<?php echo $paziente->getIstruzione(); ?>">
            </div>
            <div class="form-group">
              <label for="text">Lavoro</label>
              <input type="text" class="form-control" readonly value="<?php echo $paziente->getLavoro(); ?>">
            </div>

          </div>
          <!-- /.card-body -->



      </div>

    </div>

        <!-- /.card-body -->
      </div>
      <!-- /.card -->



    </section>
    <!-- /.content -->


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