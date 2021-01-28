<?php 
include '../../storage/professionista.php';
include '../../storage/DatabaseInterface.php';
include '../../plugins/libArray/FunArray.php';
include '../../applicationLogic/AreaInformativaControl.php';

$listProf = AreaInformativaControl::recuperaProfessionisti();
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PsyMeet | Lista professionisti</title>
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

        </div>
        <div class="info">
          <a href="Homepage.php" class="d-block">Homepage<i class="nav-icon fas fa-book-open" style="padding-left: 2%;" ></i></a>
        </div>
      </div>

      <!-- Sidebar Menu -->

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
            <h1>Professionisti</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Professionisti</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
              <?php if (isset($_SESSION['eccezione'])) {
 	echo $_SESSION['eccezione'];
 } ?>
            <?php
			if ($listProf != null) {
				for ($i=0; $i < count($listProf); $i++) {
					$img=base64_encode($listProf[$i]->getImmagineProfessionista()); ?>

            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <?php echo $listProf[$i]->getSpecializzazione(); ?>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b><?php echo $listProf[$i]->getNome() . ' ' . $listProf[$i]->getCognome(); ?></b></h2>
                      <p class="text-muted text-sm"><b>About: </b> <?php echo $listProf[$i]->getEsperienze(); ?></p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: <?php echo $listProf[$i]->getIndirizzoStudio(); ?></li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: <?php echo $listProf[$i]->getTelefono(); ?></li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <?php
					  if ($img != null) {
					  	echo '<img class="img-circle img-fluid" src="data:image/jpeg;base64,' . $img . '"/>';
					  } else {
					  	echo '<img src="../../dist/img/user1-128x128.jpg" alt="" class="img-circle img-fluid">';
					  } ?>
                      <!--<img src="../../dist/img/user1-128x128.jpg" alt="" class="img-circle img-fluid">-->
                    </div>
                  </div>
                </div>
                <div class="card-footer">


                  <div class="text-right">

                      <!--<i class="fas fa-user"></i> View Profile-->


                    <form class="" action="schedaProfessionista.php" method="post">
                      <input type="text" name="codFiscaleProf" value="<?php echo $listProf[$i]->getCfProf(); ?>" hidden ="true">
                        <button type="submit" class="btn btn-primary float-right" name="button" style="background-color: #007bff; border-color: #007bff;">
                            <i class="nav-icon fas fa-table">
                              View Profile
                            </i>
                        </button>
                    </form>

</div>
                </div>
              </div>
            </div>
          <?php
				}
			} ?>

          </div>
        </div>
      </div>



        <!-- /.card-body -->

        <!-- /.card-footer -->
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
