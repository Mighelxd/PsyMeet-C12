<?php
/*
    * gestioneTerapia.php
    * Pagina per la gestione della terapia
    * Autore: Martino D'Auria
    * Versione: 0.1
    * 2020 Copyright by PsyMeet - University of Salerno
*/
include ("../../plugins/libArray/FunArray.php");
include "../../storage/DatabaseInterface.php";
include "../../storage/Terapia.php";
include "../../storage/SchedaPrimoColloquio.php";
include "../../storage/SchedaModelloEziologico.php";
include "../../storage/SchedaFollowUp.php";
include "../../storage/SchedaAssessmentGeneralizzato.php";
include "../../storage/SchedaAssessmentFocalizzato.php";
include "../../applicationLogic/terapiaControl.php";
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

$pazienteTer = PazienteControl::getPaz($cfPazienteTer);

$terapia = terapiaControl::getTerapie($cfPazienteTer, $cfProfessionista);
/*if(count($listTerapie) > 0 ){
  for($i=0;$i<count($listTerapie);$i++){
    $terapie = terapiaControl::recuperaSchede($listTerapie[0]->getIdTerapia());
    $_SESSION['totSchede'] = $terapie;
  }
}
else
  $terapie = [];*/
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Projects</title>
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
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
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
                Paziente
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview menu-open" style="padding-left:2%;">
              <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p><?php echo $pazienteTer->getNome() ." ". $pazienteTer->getCognome(); ?>
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <?php
                    $terapie = terapiaControl::recuperaSchede($terapia[0]->getIdTerapia());
                    $_SESSION['idTerCorr'] = $terapia[0]->getIdTerapia();

                ?>
                <ul class="nav nav-treeview" style="padding-left: 2%;"><!--inizio blocco terapie-->
                  <li class="nav-item has-treeview">
                    <a href="gestioneTerapia.html" class="nav-link active">
                      <i class="fas fa-clipboard nav-icon"></i>
                      <p>Terapia <?php echo $terapia[0]->getIdTerapia(); ?>
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="cartellaClinica.html" class="nav-link">
                      <i class="fas fa-notes-medical nav-icon"></i>
                      <p>Cartella clinica</p>
                    </a>
                    <li class="nav-item">
                      <a href="schedaPaziente.html" class="nav-link">
                        <i class="fas fa-id-card-alt nav-icon"></i>
                        <p>Dati Paziente
                        </p>
                      </a>
                    </li>
                    <li class="nav-item has-treeview">
                      <a href="gestioneTerapia.html" class="nav-link">
                      <i class="fas fa-brain nav-icon"></i>
                      <p>Sedute
                        <i class="right fas fa-angle-left"></i>
                      </p>
                      </a>
                      <ul class="nav nav-treeview" style="padding-left: 1%;">
                        <li class="nav-item">
                          <a href="schedaPrimoColloquio.html" class="nav-link">
                            <i class="fas fa-clipboard nav-icon"></i>
                            <p>Primo colloquio
                            </p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="schedaAssessmentGeneralizzato.html" class="nav-link">
                            <i class="fas fa-clipboard nav-icon"></i>
                            <p>Assessment generalizzato
                            </p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="schedaAssessmentFocalizzato.php" class="nav-link">
                            <i class="fas fa-clipboard nav-icon"></i>
                            <p>Assessment focalizzato
                            </p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="schedaFollowUp.html" class="nav-link">
                            <i class="fas fa-clipboard nav-icon"></i>
                            <p>Follow-up
                            </p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="schedaModelloEziologico.html" class="nav-link">
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
                </ul><!--fine blocco terapie-->
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
<!-- FINE MENU' A SINISTRA -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Terapia</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Terapia</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Terapie in corso</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          Tipo scheda
                      </th>

                      <th>
                          Data Inizio
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php
                  for($i=0;$i<count($terapie);$i++) {
                ?>
                  <tr> <!--INIZIO -->
                      <td>
                          <?php
                            echo $terapie[$i]->getIdScheda();
                          ?>
                      </td>
                      <td>
                          <a>
                          <?php
                            echo $terapie[$i]->getTipo();
                          ?>
                          </a>
                          <br/>

                      </td>
                      <td>
                          <?php
                            echo $terapie[$i]->getData();
                          ?>
                      </td>
                      <td class="project-actions text-right">
                          <?php
                            $tipo = str_replace(' ','',$terapie[$i]->getTipo());
                            $tipo = $tipo.".html";
                           // echo($tipo);
                          ?>
                          <a class="btn btn-primary btn-sm" href='<?php echo($tipo) ?>'>
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                      </td>
                  </tr>
                  <?php
                    }
                  ?>

              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

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

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
