<?php
session_start();
include '../../plugins/libArray/FunArray.php';
include '../../storage/DatabaseInterface.php';
include '../../storage/Terapia.php';
include '../../applicationLogic/terapiaControl.php';
include '../../applicationLogic/PazienteControl.php';
include '../../applicationLogic/AreaInformativaControl.php';
include '../../storage/Paziente.php';
include '../../storage/Professionista.php';
include '../../storage/SchedaModelloEziologico.php';
$tipoUtente = $_SESSION['tipo'];
if ($tipoUtente != 'paziente') {
	header('Location: ../Utente/login.php');
}

/*if(isset($_POST["codFiscalePaz"])){
	$cfPazienteTer=$_POST['codFiscalePaz'];
	$_SESSION["cfPazTer"] = $cfPazienteTer;
	$pazienteTer = PazienteControl::getPaz($cfPazienteTer);
}
else if(isset($_SESSION["datiPaziente"])){
	$pazienteTer = $_SESSION['datiPaziente'];
	$_SESSION["cfPazTer"] = $pazienteTer->getCf();
	$cfPazienteTer = $pazienteTer->getCf();
}*/

$cf= $_SESSION['codiceFiscale'];
$paz = PazienteControl::getPaz($cf);

$img=base64_encode($paz->getFotoProfiloPaz());

$terapie = terapiaControl::getTerapiePaz($cf);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Terapie</title>
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
            <span style="color:red"><?php if (isset($_SESSION['eccezione'])) {
	echo $_SESSION['eccezione'];
} ?></span>
            <?php if (count($terapie)>0) {
	for ($i=0; $i<count($terapie); $i++) {
		$modEz = terapiaControl::getEziologicoForPaz($terapie[$i]->getIdTerapia()); ?>
                <!-- Default box -->
                <div class="card">
                    <div class="card-header" style="background-color : #007bff;">
                        <h3 class="card-title" style="color : #ffffff;">Terapia <?php echo $terapie[$i]->getDescrizione(); ?> | Data inizio: <?php $d=$terapie[$i]->getData();
		echo substr($d, 8) . '/' . substr($d, 5, 2) . '/' . substr($d, 0, 4) ?></h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
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
                                <th>
                                    Professionista
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr> <!--INIZIO -->
                                    <td>
                                        <?php
										echo $modEz->getIdScheda(); ?>
                                    </td>
                                    <td>
                                        <a>
                                            <?php
											echo $modEz->getTipo(); ?>
                                        </a>
                                        <br/>

                                    </td>
                                    <td>
                                        <?php
										echo $modEz->getData(); ?>
                                    </td>
                                    <td>
                                        <?php $prof=AreaInformativaControl::getProf($terapie[$i]->getCfProf());
		echo 'Dott. ' . $prof->getNome() . ' ' . $prof->getCognome(); ?>
                                    </td>
                                    <td class="project-actions text-right">
                                        <?php
										$_SESSION['fc'] = $modEz->getFattoriCausativi();
		$_SESSION['fp'] = $modEz->getFattoriPrecipitanti();
		$_SESSION['fm'] = $modEz->getFattoriMantenimento();
		$_SESSION['rf'] = $modEz->getRelazioneFinale(); ?>
                                        <a class="btn btn-primary btn-sm" href='modelloEziologicoPaz.php'>
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php
	} ?>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            <?php
} ?>
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
<script src="../../dist/js/terapia.js"></script>
</body>
</html>
