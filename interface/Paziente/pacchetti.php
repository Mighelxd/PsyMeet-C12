<?php

include '../../plugins/libArray/FunArray.php';
include '../../storage/Paziente.php';
include '../../storage/DatabaseInterface.php';
include '../../applicationLogic/PazienteControl.php';
include '../../applicationLogic/PacchettoControl.php';
include '../../applicationLogic/AreaInformativaControl.php';
include '../../storage/scelta.php';
include '../../storage/Pacchetto.php';
include '../../storage/Professionista.php';


session_start();
$tipoUtente = $_SESSION['tipo'];
if ($tipoUtente != 'paziente') {
	header('Location: ../Utente/login.php');
}
$cfPaziente = $_SESSION['codiceFiscale'];







$paz = PazienteControl::getPaz($cfPaziente);

$img=base64_encode($paz->getFotoProfiloPaz());

if (isset($_POST['cfProfessionista'])) {
	$cfProf = $_POST['cfProfessionista'];
	$_SESSION['cfProf'] = $cfProf;
}

if (isset($cfProf) == null) {
	$cfProf = $_SESSION['cfProf'];
}


$pacchettoByProf = PacchettoControl::selectAllPacchettoProf($cfProf);
$professionista = AreaInformativaControl::getProf($cfProf);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Pacchetti </title>

    <!-- Font Awe <li class="nav-item">
                        <a href="gestioneTerapia.html" class="nav-link">
                          <i class="fas fa-id-card-alt nav-icon"></i>
                          <p>Dati Paziente
                          </p>
                        </a>
                      </li>e Icons -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
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
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Pacchetti</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Pacchetti</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6" >



                        <div class="card" >
                            <div class="card-header border-0">
                                <h3 class="card-title">Pacchetti</h3>
                                <!--  <div class="" style="float: right" >
                                    <button type="button" class="btn btn-primary" name="button">Aggiungi</button>
                                  </div> -->
                            </div>
                            <span style="color:red"><?php if (isset($_SESSION['eccezione'])) {
	echo $_SESSION['eccezione'];
} ?></span>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                    <tr>
                                        <th>Pacchetto</th>
                                        <th>Prezzo</th>
                                        <th>Professionista</th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <?php  if ($pacchettoByProf !=null) {
	for ($i=0; $i<count($pacchettoByProf); $i++) {
		$p=PacchettoControl::recuperaPacchetto($pacchettoByProf[$i]->getIdPacchetto()); ?>
                                            <form method="post" action="../../applicationLogic/PacchettoControlForm.php">
                                                <input type="text" name="action" value="compraPacchetto" hidden="true">
                                                <!--<input type="text" name="idPacchetto" value= <?php echo $p->getIdPacchetto(); ?> hidden="true"> -->
                                                <input type="text" name="cfProf" value= <?php echo $cfProf; ?> hidden>
                                                <input type="text" name="cfPaz" value= <?php echo $cfPaziente; ?> hidden>
                                                <input type="text" name="idScelta" value= <?php echo $pacchettoByProf[$i]->getIdScelta(); ?> hidden>
                                                <tbody>
                                                <tr>
                                                    <td >
                                                        <?php echo $p->getTipologia(); ?>
                                                    </td>
                                                    <td >
                                                        <?php echo $p->getPrezzo(); ?>
                                                    </td>
                                                    <td><?php echo $professionista->getNome() . ' ' . $professionista->getCognome(); ?></td>
                                                    <td>
                                                        <button type"submit"  class="btn btn-danger">compra Pacchetto</button>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </form>
                                            <?php
	}
} else {
										echo '<tbody>
                  <tr>
                    <td >
                        vuota
                    </td>
                    <td >
                     vuota
                    </td>
                    <td></td>
                  </tr>

                  </tbody>';
									} ?>
                                </table>
                            </div>
                        </div>

                        <!-- /.card -->





                        <!-- /.d-flex -->


                    </div>






                </div>

            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

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
