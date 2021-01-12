<?php
    include "../../storage/CartellaClinica.php";
    include "../../storage/Paziente.php";
    session_start();
    if(!isset($_SESSION["codiceFiscale"]) || !isset($_SESSION["tipo"])){
      header("Location: ../Utente/login.php");
      exit();
    }
    if(!isset($_SESSION["datiPaziente"])){
      header("Location: pazienti.php");
    }
    $paziente=$_SESSION["datiPaziente"];
    if(isset($_SESSION["cartellaClinica"])){
      $cartellaClinica=$_SESSION["cartellaClinica"];
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PsyMeet</title>
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
   <!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
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

<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script> 
  <!-- ELEM CARTELLA CLINICA CSS -->
  <link rel="stylesheet" href="../../dist/css/elemCartellaCss.css">
  <link rel="stylesheet" href="../../dist/css/anamnesi.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

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
                    <a href="gestioneTerapia.html" class="nav-link">
                      <i class="fas fa-clipboard nav-icon"></i>
                      <p>Terapia
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="cartellaClinica.html" class="nav-link active">
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
                          <a href="schedaAssessmentFocalizzato.html" class="nav-link">
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
    <!-- /.sidebar -->
  </aside>
<!-- FINE MENU' A SINISTRA -->




<!-- DIV CHE SI TROVA TRA NAV E I BOX -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <h1 class="m-0 text-dark">Cartella clinica</h1>
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-lg-12" style="padding-top: 30px;">
              <div class="card card-primary" >
                <div class="card-header">
                  <h3 class="card-title">Dati cartella</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
              <form role="form" method="post" id="formCartella">
                  <div class="card-body">
                    <div class="form-group">
                     <label for="name">Nome</label>
	    			 <input type="text" id="name" name="name" value="<?php echo $paziente->getNome(); ?>" readonly>
                    </div>
                    <div class="form-group">
                     <label for="surname">Cognome</label>
	    			 <input type="text" id="surname" name="surname" value="<?php echo $paziente->getCognome() ?>" readonly>
                    </div>
                    <div class="form-group">
                       <label for="data">Data</label>
		    		   <input type="date" id="data" name="data" <?php if(!isset($cartellaClinica)){ ?><?php echo "value=\"".date(Y-m-d)."\"";}?> <?php if(isset($cartellaClinica)){ ?><?php echo "value=\"".$cartellaClinica->getData()."\"";}?>  readonly>
                    </div>
                    <div class="form-group">
                       <label for="professione">Professione</label>
	   				   <input type="text" id="professione" name="profes" value="<?php echo $paziente->getLavoro()?>" readonly>
                    </div>
                    <div class="form-group">
                       <label for="istruzione">Istruzione</label>
	    			   <input type="text" id="istruzione" name="istr" value="<?php echo $paziente->getIstruzione()?>"  readonly>
                    </div>
                    <div class="accordion"><b>ANAMNESI</b></div>
                    <div class="panel">
                      <div class="form-group">
                          <label for="farmaci">Farmaci/Psicofarmaci</label>
  	    				<textarea id="farmaci" name="farma" <?php if(!isset($cartellaClinica)){ ?>placeholder="scrivi...." <?php } ?>style="height:200px" required><?php if(isset($cartellaClinica)) echo $cartellaClinica->getFarmaci() ?></textarea>
                      </div>
                      <div class="form-group">
                          <label for="umore">Qualità dell'umore</label>
  	    				<textarea id="umore" name="umo" <?php if(!isset($cartellaClinica)){ ?>placeholder="scrivi...." <?php } ?> style="height:200px" required><?php if(isset($cartellaClinica)) echo $cartellaClinica->getQualitaUmore() ?></textarea>
                      </div>
                      <div class="form-group">
                          <label for="patologia">Patologie pregresse psichiche/fisiche</label>
  	    				<textarea id="patologia" name="patol" placeholder="scrivi..." style="height:200px" required><?php if(isset($cartellaClinica)) echo $cartellaClinica->getPatologiePregresse() ?></textarea>
                      </div>
                      <div class="form-group">
                          <label for="relazioni">Qualità relazioni affettive</label>
  	    				<textarea id="relazioni" name="relaz" placeholder="scrivi..." style="height:200px" required><?php if(isset($cartellaClinica)) echo $cartellaClinica->getQualitaRealazioni() ?></textarea>
                    </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <input type="text" name="codFiscalePaz" value="<?php echo $paziente->getCf() ?>" hidden="true">
                  
                  <?php if(!isset($cartellaClinica)){ ?>
                  <div class="card-footer" style="background-color: white">
                    <input type="text" name="azione" value="modifica" hidden ="true">
                    <button type="submit" class="btn btn-primary" style="float: right">Aggiungi</button>
                    <div class="alert alert-success" style="display:none;">Cartella Clinica aggiunta con successo!</div>
                  </div>
                  <?php } else { ?>
                  <div class="card-footer" style="background-color: white">
                    <input type="text" name="azione" value="modifica" hidden ="true">
                    <div class="alert alert-success" style="display:none;">Cartella Clinica modificata con successo</div>
                    <button type="submit" class="btn btn-primary" style="float:right">Modifica</button>
                  </div>
                  <?php } ?>
                </form>
              </div>

            </div>
                    
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- FINE DIV CHE SI TROVA TRA NAV E I BOX -->

<?php
  $_SESSION["datiPaziente"]=NULL;
  $_SESSION["cartellaClinica"]=NULL
?>

 <!-- INIZIO PIE DI PAGINA -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>
  <!-- FINE PIE DI PAGINA -->







  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- script per sezione anamnesi -->
<script src="../../dist/js/anamnesi.js"></script>
<script>
  $("#formCartella").submit(function(e){
      e.preventDefault();
      $.ajax({
            url: '../../applicationLogic/CartellaClinicaControl.php',
            data: $("#formCartella").serialize(),
            type: 'post',
            success:function(data){
              var response=JSON.parse(data);
              if(response.esito==true){
                 $(".alert-success").show();
                  setTimeout(function(){
                    window.location.replace("Pazienti.php");
                  },5000)
              }
              else{
                $(".alert").removeClass("alert-success");
                $(".alert").addClass("alert-danger");
                $(".alert")[0].innerHTML=esito.errore;
                $(".alert").show();
              }
            },
            error: function(err){
              console.log(err);
            }
          })
    })
</script>
</body>
</html>
