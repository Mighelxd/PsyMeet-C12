<?php
include '../../storage/DatabaseInterface.php';
include '../../storage/Professionista.php';
include '../../applicationLogic/AreaInformativaControl.php';

$professionisti = AreaInformativaControl::recuperaProfessionisti();

//var_dump($professionisti);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Welcome PsyMeet</title>
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
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="../../dist/css/indexProfessionista.css" rel="stylesheet">
  <!-- slideshow -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="../../dist/css/slideshow.css" rel="stylesheet">
  <!-- stile homepage -->
  <link href="../../dist/css/home.css" rel="stylesheet">
</head>


<body class="hold-transition sidebar-mini layout-fixed" onload="rimuovi()">
  <!-- bar nav -->
  <nav>
    <img src="../../dist/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3"style="opacity: .8">
    <span >PsyMeet</span>
    <a href="registrazioneProfessionista.php" class="btnReg">Registrati come professionista</a>
    <a href="registrazionePaziente.php" class="btnReg">Registrati come paziente</a>
    <a href='login.php' class="btnAccess">Accedi</a>
  </nav>
  <h1 id="welcomeTitle">Benvenuti in PsyMeet</h1>
  <!--slideshow-->
  <div class="container mt-3">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ul class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ul>
      <!-- The slideshow -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../../dist/img/jitsimeet.jpg" alt="photo3" width="1100" height="500">
        </div>
        <div class="carousel-item">
          <img src="../../dist/img/seduta1.jpg" alt="Photo" width="1100" height="500">
        </div>
        <div class="carousel-item">
          <img src="../../dist/img/seduta2.jpg" alt="Photo" width="1100" height="500">
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
  </div>
  <br>
  <!-- Titolo intro -->
  <h4 id="intro">Incontra i nostri professionisti</h4>
  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <!-- scheda professionista in row -->
            <span style="color:red"><?php echo $_SESSION['eccezione'] ?></span>
          <?php
          if($professionisti != null){
          for($i=0;$i<count($professionisti);$i++){ ?>
          <div class="card card-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-info">
              <h3 class="widget-user-username"><?php echo $professionisti[$i]->getNome()." ".$professionisti[$i]->getCognome(); ?></h3>
              <h5 class="widget-user-desc"><?php echo $professionisti[$i]->getSpecializzazione();?></h5>
            </div>
            <div class="widget-user-image">
              <img id="imageprof" class="img-circle elevation-2" src="../../dist/img/user2-160x160.jpg" alt="User Avatar" style="max-width: 90; max-height: 90px;">
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $professionisti[$i]->getPec();?></h5>
                    <span class="description-text">PEC</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $professionisti[$i]->getTelefono();?></h5>
                    <span class="description-text">TELEFONO STUDIO</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $professionisti[$i]->getIndirizzoStudio();?></h5>
                    <span class="description-text">Indirizzo Studio</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.card-footer-->
          </div>
        <?php }
          } ?>
  </section>
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
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
<script src="../../dist/js/test.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- slide show script-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->
<!-- script button nav-->
<script>
/*  $('.btn btn-primary').click(function(){

});*/
  $('.btn btn-success').click(function(){
    window.location.replace('../Professionista/registrazioneProfessionista.php');
  });
</script>
</body>
</html>
