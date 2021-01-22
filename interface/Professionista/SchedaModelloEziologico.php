<?php
session_start();
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
include "../../applicationLogic/AreaInformativaControl.php";
include "../../applicationLogic/PazienteControl.php";
include "../../storage/Paziente.php";
include "../../storage/Professionista.php";

$tipoUtente = $_SESSION["tipo"];
if($tipoUtente != "professionista" || $tipoUtente == null){
  header("Location: ../Utente/login.php");
}
$exist=false;
if(isset($_SESSION['idTerCorr'])){
  $idTerCorr = $_SESSION['idTerCorr'];
  $allSc = terapiaControl::recuperaSchede($idTerCorr);
  for($i=0;$i<count($allSc);$i++){
    if($allSc[$i]->getTipo() == 'Scheda Modello Eziologico'){
      $schModEz[] = $allSc[$i];
      $exist=true;
    }
  }
}
else{
    header("Location: Pazienti.php");
}

$cfProfessionista = $_SESSION["codiceFiscale"];
$professionista = AreaInformativaControl::getProf($cfProfessionista);
$img=base64_encode($professionista->getImmagineProfessionista());
$cf = $_SESSION["cfPazTer"];
$paziente = PazienteControl::getPaz($cf);
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
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
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
                    <?php if ($img != NULL) {
                        echo '<img class="img-circle elevation-2" src="data:image/jpeg;base64,'.$img.'"/>' ;
                    }
                    else {
                        echo '<img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">';
                    }

                    ?>
                </div>
                <div class="info">
                    <a href="areaPersonaleProfessionista.php" class="d-block"><?php echo $professionista->getNome() ." ". $professionista->getCognome(); ?> <i class="nav-icon fas fa-book-open" style="padding-left: 2%;" ></i></a>
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
                    <li class="nav-item has-treeview">
                        <a href="Pazienti.php" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Pazienti
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user nav-icon"></i>
                            <p><?php echo $paziente->getNome()." ".$paziente->getCognome(); ?>
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
                                <a href="cartellaClinica.php" class="nav-link">
                                    <i class="fas fa-notes-medical nav-icon"></i>
                                    <p>Cartella clinica</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="schedaPaziente.php" class="nav-link">
                                    <i class="fas fa-id-card-alt nav-icon"></i>
                                    <p>Dati Paziente
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link active">
                                    <i class="fas fa-brain nav-icon"></i>
                                    <p>Sedute
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="padding-left: 1%;">
                                    <li class="nav-item">
                                        <a href="schedaPrimoColloquio.php" class="nav-link">
                                            <i class="fas fa-clipboard nav-icon"></i>
                                            <p>Primo colloquio
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="SchedaAssessmentGeneralizzato.php" class="nav-link">
                                            <i class="fas fa-clipboard nav-icon"></i>
                                            <p>Assessment generalizzato
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="SchedaAssessmentFocalizzato.php" class="nav-link">
                                            <i class="fas fa-clipboard nav-icon"></i>
                                            <p>Assessment focalizzato
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="SchedaFollowUp.php" class="nav-link">
                                            <i class="fas fa-clipboard nav-icon"></i>
                                            <p>Follow-up
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="SchedaModelloEziologico.php" class="nav-link active">
                                            <i class="fas fa-clipboard nav-icon"></i>
                                            <p>Modello eziologico
                                            </p>
                                        </a>
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
                        <a href="gestionePacchettiProf.php" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                Pacchetti
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a class="btn btn-danger" href="../../applicationLogic/logout.php">Logout</a>
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
        <span style="color:red"><?php if(isset($_SESSION['eccezione'])){echo $_SESSION['eccezione'];} ?></span>
    </section>

    <!-- Main content -->
    <?php if($exist){ ?>
    <section class="content">
      <form method="POST" action="../../applicationLogic/SeduteControlForm.php">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Modello Eziologico</h3>
            </div>
            <div class="card-body">



            <div class="card-body">
              <div class="form-group">
                <label for="inputDescription">Fattori Causativi</label>
                <textarea id="inputDescription" name="fc" class="form-control" rows="4"><?php echo $schModEz[0]->getFattoriCausativi(); ?></textarea>
              </div>
              <div class="form-group">
                <label for="inputDescription">Fattori Precipitanti</label>
                <textarea id="inputDescription2" name="fp" class="form-control" rows="4"><?php echo $schModEz[0]->getFattoriPrecipitanti(); ?></textarea>
              </div>
              <div class="form-group">
                <label for="inputDescription">Fattori Mantenimento</label>
                <textarea id="inputDescription3" name="fm" class="form-control" rows="4"><?php echo $schModEz[0]->getFattoriMantenimento(); ?></textarea>
                </div>
              <div class="form-group">
                <label for="inputDescription">Relazione Finale</label>
                <textarea id="inputDescription4" name="rf" class="form-control" rows="4"><?php echo $schModEz[0]->getRelazioneFinale(); ?></textarea>
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

      </div>
      <div class="row">
        <div class="col-12">
          <button type='submit' id='BtnModNME' name="action" value="modSME" class='btn btn-primary float-right'>Modifica</button>
        </div>
      </div>
    </form>
    <form method="POST" action="../../applicationLogic/SeduteControlForm.php">
      <button type='submit' id='BtnDelNME' name="action" value="delSME" class='btn btn-danger'>Elimina</button>
    </form>
    </section>
    <!-- /.content -->
  <?php }
        else{
          echo("<button type='button' id='btnNME' class='btn btn-primary' onclick='newSchME()'>Nuova Scheda</button>");
        } ?>

        <section class="content" id="nuovoME">
          <form method="POST" action="../../applicationLogic/SeduteControlForm.php">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Modello Eziologico</h3>
                </div>
                <div class="card-body">



                <div class="card-body">
                  <div class="form-group">
                    <label for="inputDescription">Fattori Causativi</label>
                    <textarea id="inputDescription5" name="fc" class="form-control" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="inputDescription">Fattori Precipitanti</label>
                    <textarea id="inputDescription6" name="fp" class="form-control" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="inputDescription">Fattori Mantenimento</label>
                    <textarea id="inputDescription7" name="fm" class="form-control" rows="4"></textarea>
                    </div>
                  <div class="form-group">
                    <label for="inputDescription">Relazione Finale</label>
                    <textarea id="inputDescription8" name="rf" class="form-control" rows="4"></textarea>
                  </div>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>

          </div>
          <div class="row">
            <div class="col-12">
              <button type='button' id='AnnBtnNME' class='btn btn-secondary' onclick='AnnNewSchME()'>Annulla</button>
              <button type='submit' id='BtnAddNME' name="action" value="addSME" class='btn btn-primary float-right'>Aggiungi</button>
            </div>
          </div>
        </form>
        </section>
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
<script>
   $(function () {
      $("#reservationdate").datetimepicker({
        format: 'L'
      });
   })
</script>
<script>
$('#nuovoME').hide();
function newSchME(){
  $('#nuovoME').show();
  $('#btnNME').hide();
}
function AnnNewSchME(){
  $('#nuovoME').hide();
  $('#btnNME').show();
}
</script>
<!-- date-range-picker -->

</body>
</html>
