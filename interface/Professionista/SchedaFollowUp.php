<?php
session_start();
include '../../plugins/libArray/FunArray.php';
include '../../storage/DatabaseInterface.php';
include '../../storage/SchedaAssessmentFocalizzato.php';
include '../../storage/Episodio.php';
include '../../applicationLogic/SeduteControl.php';
include "../../storage/SchedaPrimoColloquio.php";
include "../../storage/SchedaModelloEziologico.php";
include "../../storage/SchedaFollowUp.php";
include "../../storage/SchedaAssessmentGeneralizzato.php";
include "../../applicationLogic/terapiaControl.php";

$tipoUtente = $_SESSION["tipo"];
if($tipoUtente != "professionista" || $tipoUtente == null){
  header("Location: ../Utente/login.php");
}

$exist = false;
if(isset($_SESSION['idTerCorr'])){
  $idTerCorr = $_SESSION['idTerCorr'];
  $allSc = terapiaControl::recuperaSchede($idTerCorr);
  for($i=0;$i<count($allSc);$i++){
    if($allSc[$i]->getTipo() == 'Scheda Follow Up'){
      $schFollow[] = $allSc[$i];
      $exist = true;
    }
  }
}
  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PsyMeet</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.css">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Project Add</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- ELEM CARTELLA CLINICA CSS -->
  <link rel="stylesheet" href="../../dist/css/elemCartellaCss.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PsyMeet</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Project Add</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- ELEM CARTELLA CLINICA CSS -->
    <link rel="stylesheet" href="../../dist/css/elemCartellaCss.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
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

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->



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
              <a href="Pazienti.php" class="nav-link">
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
                    <p>Nome Paziente
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview" style="padding-left: 2%;">
                    <li class="nav-item has-treeview">
                      <a href="gestioneTerapia.php" class="nav-link">
                        <i class="fas fa-clipboard nav-icon"></i>
                        <p>Terapia
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="cartellaClinica.php" class="nav-link">
                        <i class="fas fa-notes-medical nav-icon"></i>
                        <p>Cartella clinica</p>
                      </a>
                      <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="fas fa-id-card-alt nav-icon"></i>
                          <p>Dati Paziente
                          </p>
                        </a>
                      </li>
                      <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link">
                        <i class="fas fa-brain nav-icon"></i>
                        <p>Sedute
                          <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview" style="padding-left: 1%;">
                          <li class="nav-item">
                            <a href="SchedaPrimoColloquio.php" class="nav-link">
                              <i class="fas fa-clipboard nav-icon"></i>
                              <p>Primo colloquio
                              </p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="SchedaAssessmentGeneralizzato.php" class="nav-link">
                              <i class="fas fa-clipboard nav-icon"></i>
                              <p>Assessment generalizzato
                              </p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="SchedaAssessmentFocalizzato.php" class="nav-link">
                              <i class="fas fa-clipboard nav-icon"></i>
                              <p>Assessment focalizzato
                              </p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="SchedaFollowUp.php" class="nav-link active">
                              <i class="fas fa-clipboard nav-icon"></i>
                              <p>Follow-up
                              </p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="SchedaModelloEziologico.php" class="nav-link">
                              <i class="fas fa-clipboard nav-icon"></i>
                              <p>Modello eziologico
                              </p>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li class="nav-item">
                        <a href="gestioneCompiti.php" class="nav-link">
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
              <a href="gestionePacchettiProf.php" class="nav-link">
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Scheda Follow Up</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Follow Up</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php if($exist){ ?>
    <section class="content">
      <form method="POST" action="../../applicationLogic/SeduteControlForm.php">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Scheda Follow Up</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputDescription">Ricadute</label>
                <textarea id="inputDescription" name="ric" class="form-control" rows="4"><?php echo $schFollow[0]->getRicadute(); ?></textarea>
              </div>
              <div class="form-group">
                <label for="inputDescription">Esiti Positivi</label>
                <textarea id="inputDescription" name="esPos" class="form-control" rows="4"><?php echo $schFollow[0]->getEsitiPositivi(); ?></textarea>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>


      </div>
      <div class="row">
        <div class="col-12">
          <button type='submit' id='BtnModNFU' name="action" value="modSFU" class='btn btn-primary float-right'>Modifica</button>
        </div>
      </div>
    </form>
    <form method="POST" action="../../applicationLogic/SeduteControlForm.php">
      <button type='submit' id='BtnDelNFU' name="action" value="delSFU" class='btn btn-danger'>Elimina</button>
    </form>
    </section>
    <!-- /.content -->
  <?php }
        else{
          echo("<button type='button' id='btnNFU' class='btn btn-primary' onclick='newSchFU()'>Nuova Scheda</button>");
        } ?>

        <section class="content" id="nuovoFU">
          <form method="POST" action="../../applicationLogic/SeduteControlForm.php">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Scheda Follow Up</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputDescription">Ricadute</label>
                    <textarea id="inputDescription" name="ric" class="form-control" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="inputDescription">Esiti Positivi</label>
                    <textarea id="inputDescription" name="esPos" class="form-control" rows="4"></textarea>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>


          </div>
          <div class="row">
            <div class="col-12">
              <button type='button' id='AnnBtnNFU' class='btn btn-secondary' onclick='AnnNewSchFU()'>Annulla</button>
              <button type='submit' id='BtnAddNFU' name="action" value="addSFU" class='btn btn-primary float-right'>Aggiungi</button>
            </div>
          </div>
        </form>
        </section>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
$('#nuovoFU').hide();
function newSchFU(){
  $('#nuovoFU').show();
  $('#btnNFU').hide();
}
function AnnNewSchFU(){
  $('#nuovoFU').hide();
  $('#btnNFU').show();
}
</script>
</body>
</html>
