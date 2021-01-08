<?php
  session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PsyMeet | Calendar</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="../../plugins/fullcalendar/main.min.css">
    <link rel="stylesheet" href="../../plugins/fullcalendar-daygrid/main.min.css">
    <link rel="stylesheet" href="../../plugins/fullcalendar-timegrid/main.min.css">
    <link rel="stylesheet" href="../../plugins/fullcalendar-bootstrap/main.min.css">
    <!-- appuntamenti -->
    <link rel="stylesheet" href="../../dist/css/appuntamenti.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar-->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links-->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <!--<li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li>-->
        </ul>
        <!-- SEARCH FORM
        <form class="form-inline ml-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>-->
        <!-- Right navbar links-->
    <!--    <ul class="navbar-nav ml-auto">-->
        <!-- Messages Dropdown Menu
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">-->
        <!-- Message Start
        <div class="media">
          <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
          <div class="media-body">
            <h3 class="dropdown-item-title">
              Brad Diesel
              <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
            </h3>
            <p class="text-sm">Call me whenever you can...</p>
            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
          </div>
        </div>-->
        <!-- Message End
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">-->
        <!-- Message Start
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
        </div>-->
        <!-- Message End
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">-->
        <!-- Message Start
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
        </div>-->
        <!-- Message End
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>-->
    </div>
        <!--</li>
        <!-- Notifications Dropdown Menu
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
            </li>-
            <li class="nav-item">
              <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
              </a>
            </li>-->
        <!--  </ul>-->
        </nav>
        <!-- /.navbar -->
        <!-- MENU' A SINISTRA -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
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
                        <a href="areaPersonale.html" class="d-block">Alexander Pierce <i class="nav-icon fas fa-book-open" style="padding-left: 2%;"></i></a>
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
                            <a href="calendario.php" class="nav-link active">
                                <i class="nav-icon fas fa-calendar"></i>
                                <p>
                                    Appuntamenti
                                </p>
                            </a>

                        </li>
                        <li class="nav-item has-treeview">
                            <a href="Pacchetti.php" class="nav-link">
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
                            <h1>Calendario appuntamenti</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="indexProfessionista.php">Home</a></li>
                                <li class="breadcrumb-item active">Calendario</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content (calendario)-->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="sticky-top mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Dati appuntamento</h4>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- the events -->
                                            <div id="external-events">
                                                <button type="button" class="btn btn-block btn-primary" id="newApp" value="newApp">+ appuntamento</button>
                                                <form id="addForm" method="post" enctype="application/x-www-form-urlencoded" action="../../applicationLogic/AppuntamentoControl.php" onSubmit="return validationAppForm();"></form>
                                                <form id="delForm" method="POST" enctype="application/x-www-form-urlencoded" action="../../applicationLogic/AppuntamentoControl.php"></form>
                                                <form id="modForm" method="post" enctype="application/x-www-form-urlencoded" action="../../applicationLogic/AppuntamentoControl.php" onSubmit="return validationAppForm();"></form>
                                            </div>
                                        </div>
                                        <!-- the events -->
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card card-primary">
                                <div class="card-body p-0">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            <!-- Appuntamenti -->
            <div id="appuntamenti">
            </div>
            <!-- fine Appuntamenti -->
        </div>
        <!-- /.content-wrapper -->
        <!-- footer
        <footer class="main-footer">
          <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.0
          </div>
          <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
          reserved.
        </footer>-->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery UI -->
    <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="../../plugins/moment/moment.min.js"></script>
    <script src="../../plugins/fullcalendar/main.min.js"></script>
    <script src="../../plugins/fullcalendar-daygrid/main.min.js"></script>
    <script src="../../plugins/fullcalendar-timegrid/main.min.js"></script>
    <script src="../../plugins/fullcalendar-interaction/main.min.js"></script>
    <script src="../../plugins/fullcalendar-bootstrap/main.min.js"></script>
    <script src="../../dist/js/createCalendar.js"></script>
    <!-- appuntamenti -->
    <script src="../../dist/js/appuntamenti.js"></script>
    <!-- Validazione campi -->
    <script src="../../dist/js/validationAppForm.js"></script>
</body>
</html>