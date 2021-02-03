<?php
session_start();
include '../../storage/DatabaseInterface.php';
include '../../plugins/libArray/FunArray.php';
include '../../applicationLogic/AreaInformativaControl.php';
include '../../storage/Paziente.php';
include '../../applicationLogic/PazienteControl.php';

$tipoUtente = $_SESSION['tipo'];
if ($tipoUtente != 'paziente' || $tipoUtente == null) {
	header('Location: ../Utente/login.php');
}

$cfPaziente = $_SESSION['codiceFiscale'];
$paz = PazienteControl::getPaz($cfPaziente);
$img=base64_encode($paz->getFotoProfiloPaz());
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
                    <?php echo '<img class="img-circle elevation-2" src="data:image/jpeg;base64,' . $img . '"/>' ?>

                </div>
                <div class="info">
                    <a href="areaPersonalePaziente.php" class="d-block"><?php echo $paz->getNome() . ' ' . $paz->getCognome(); ?> <i class="nav-icon fas fa-book-open" style="padding-left: 2%;" ></i></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item ">
                        <a href="indexPaziente.php" class="nav-link">
                            <i class="nav-icon fas fa-address-book"></i>
                            <p>
                                Area Informativa
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="listaProfessionisti.php" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Professionisti
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="TerapiePaz.php" class="nav-link">
                            <i class="fas fa-clipboard nav-icon"></i>
                            <p>
                                Terapie
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="gestioneCompitiPaziente.php" class="nav-link">
                            <i class="fas fa-sticky-note nav-icon"></i>
                            <p>
                                Compiti
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
                    <li class="nav-item">
                        <a href="fatture.php" class="nav-link">
                            <i class="far fa-credit-card"></i>
                            <p>
                                Fatture
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a class="btn btn-danger" href="../../applicationLogic/logout.php">Logout</a>
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
                    <h1>Appuntamenti</h1>
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
        <span style="color:red;"><?php if (isset($_SESSION['erroreApp'])) {
	echo $_SESSION['erroreApp'];
} ?></span>
        <div class="container-fluid">
            <div class="row">
                <!-- Appuntamenti -->
                <div id="appuntamenti">
                </div>
                <!-- fine Appuntamenti -->
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
<script src="../../dist/js/appPaz.js"></script>
<!-- Validazione campi
<script src="../../dist/js/validationAppForm.js"></script> -->
</body>
</html>
