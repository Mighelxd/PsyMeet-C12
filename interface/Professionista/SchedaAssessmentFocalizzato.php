<?php
session_start();
include '../../storage/DatabaseInterface.php';
include '../../storage/SchedaAssessmentFocalizzato.php';
include '../../applicationLogic/SeduteControl.php';

$scheda = SeduteControl::recuperaScheda('SchedaAssessmentFocalizzato');
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PSYMeet | Schede</title>
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
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
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
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Inizio menu a sinistra-->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../../dist/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3"
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
                    <a href="cartellaClinica.html" class="nav-link">
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
                          <a href="SchedaAssessmentFocalizzato.html" class="nav-link active">
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
    <!-- /.sidebar fine menu a sinistra-->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Scheda Assesment Focalizzato</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Schede</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Ass.Focalizzato</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">

              <div class="form-group">
                <label>Date:</label>
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
              </div>


            <div class="card-body">
              <div class="form-group">
                <label for="inputDescription">Episodio 1</label>
                  <button type="button" class="btn btn-block btn-primary" style="width: 50px">+</button>

              </div>
              <div class="form-group">
                <label for="inputDescription">Analisi Funzionale EP.1</label>
                <textarea id="inputDescription" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Esempio di testo per il colonna A</td>
                        <td>Esempio di testo per il colonna B</td>
                        <td>Esempio di testo per il colonna C</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->


              <div class="form-group">
                <label for="inputClientCompany">Appunti Terapeuta</label>
                <textarea id="inputDescription" class="form-control" rows="4"></textarea>
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

      </div>
      <div class="row">




      </div>
    </section>
    <div class="col-12">
      <a href="#" class="btn btn-secondary">Cancella</a>
        <input type="submit" value="Sottometi Scheda" class="btn btn-success" style=" float: right">
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

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
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
   $(function () {
      $("#reservationdate").datetimepicker({
        format: 'L'
      });
   })
</script>
<!-- date-range-picker -->

</body>
</html>
