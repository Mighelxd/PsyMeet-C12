<!DOCTYPE html>
<html>
<?php
    include "../../storage/DatabaseInterface.php";
    include  "../../storage/Paziente.php";
    include "../../plugins/libArray/FunArray.php";
    include "../../applicationLogic/PazienteControl.php";session_start();
    if(!isset($_SESSION["codiceFiscale"]) && !isset($_SESSION["tipo"])){
        header("Location: ../utente/login.php");
        exit();
    }
    elseif($_SESSION["tipo"]!="paziente"){
        header("Location: ../utente/login.php");
        exit();
    }
    $paziente=PazienteControl::getPaz($_SESSION["codiceFiscale"]);
    if(!$paziente->getVideo()){
        header("Location: indexPaziente.php");
        exit();
    }
    $img=$paziente->getFotoProfiloPaz();
        ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Videochiamata con il Professionista</title>
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
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <script src="../../dist/js/videoChiamata.js"></script>
    <script src='https://meet.jit.si/external_api.js'></script>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

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
                    <?php if(isset($img))echo '<img class="img-circle elevation-2" src="data:image/jpeg;base64,'.$img.'"/>' ?>
                </div>
                <div class="info">
                    <a href="areaPersonalePaziente.php" class="d-block"><?php echo $paziente->getNome() ." ". $paziente->getCognome(); ?> <i class="nav-icon fas fa-book-open" style="padding-left: 2%;" ></i></a>
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
                        <h1></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <span style="color:red"><?php if(isset($_SESSION['eccezione'])){echo $_SESSION['eccezione'];} ?></span>
            <div class="col-lg-12">
            <!-- Default box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Videochiamata con il Professionista</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6" id="videochiamata">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div id="messaggioChiamata" class="col-lg-12 alert alert-success" >Video chiamata in corso</div>
                    <button type="button" class="btn-lg btn-primary" onclick="terminaChiamataPaz()" style="float: right">Termina Chiamata</button>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script>
        iniziaChiamata("<?php echo md5($paziente->getCognome().$paziente->getNome()); ?>");

</script>
</body>

</html>
