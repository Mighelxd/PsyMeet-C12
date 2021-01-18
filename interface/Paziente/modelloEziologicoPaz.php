<?php

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

session_start();
$tipoUtente = $_SESSION['tipo'];
$cf= $_SESSION['codiceFiscale'];
if ($tipoUtente != 'paziente') {
    header('Location: ../Utente/login.php');
}

$modEz = SeduteControl::recAllModEzPaz($cf);





?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PSYMeet | Modello Eziologico</title>
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
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="../Utente/listaProfessionisti.php" class="nav-link">Professionisti</a>
            </li>
        </ul>


            <!-- Notifications Dropdown Menu -->
        </ul>
    </nav>
    <!-- /.navbar -->

    <aside class="main-sidebar sidebar-dark-primary elevation-4" >
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
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
                    <li class="nav-item ">
                        <a href="modelloEziologicoPaz.php" class="nav-link">
                            <i class="fas fa-clipboard nav-icon"></i>
                            <p>
                                Modello Eziologico
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
                        <h1>Scheda Modello Eziologico</h1>
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
                            <?php
                            if($modEz!=null){
                            for ($i=0; $i<count($modEz); $i++) {
                            ?>
                            <h3 class="card-title">Modello Eziologico</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputDescription">Fattori Causativi</label>
                                    <textarea id="inputDescription" class="form-control" rows="4" readonly> <?php echo $modEz[$i]->getFattoriCausativi(); ?> </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Fattori Precipitanti</label>
                                    <textarea id="inputDescription" class="form-control" rows="4" readonly><?php echo $modEz[$i]->getFattoriPrecipitanti(); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Fattori Mantenimento</label>
                                    <textarea id="inputDescription" class="form-control" rows="4" readonly><?php echo $modEz[$i]->getFattoriMantenimento(); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Relazione Finale</label>
                                    <textarea id="inputDescription" class="form-control" rows="4" readonly><?php echo $modEz[$i]->getRelazioneFinale(); ?></textarea>
                                </div>

                            </div>
                            <?php
                                }
                            }
                            ?>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </div>
            <span style="color:red"><?php if(isset($_SESSION['eccezione'])){echo $_SESSION['eccezione'];} ?></span>
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
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>


</body>
</html>

