<?php
session_start();
include '../../plugins/libArray/FunArray.php';
include '../../storage/DatabaseInterface.php';
include '../../storage/SchedaAssessmentFocalizzato.php';
include '../../storage/Episodio.php';
include '../../applicationLogic/SeduteControl.php';

$scheda = SeduteControl::recuperaScheda('SchedaAssessmentFocalizzato');

$idSchedaCorr = $_SESSION['idSCorr'];

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
  <!-- Stile textarea sedute -->
  <link rel="stylesheet" href="../../dist/css/sedute.css">
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

  <!-- Inizio menu a sinistra-->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../../dist/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3"
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
                    <a href="gestioneTerapia.php" class="nav-link">
                      <i class="fas fa-clipboard nav-icon"></i>
                      <p>Terapia
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="cartellaClinica.html" class="nav-link">
                      <i class="fas fa-notes-medical nav-icon"></i>
                      <p>Cartella clinica</p>
                    </a>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fas fa-id-card-alt nav-icon"></i>
                        <p>Dati Paziente
                        </p>
                      </a>
                    </li>
                    <li class="nav-item has-treeview menu-open">
                      <a href="#" class="nav-link">
                      <i class="fas fa-brain nav-icon"></i>
                      <p>Sedute
                        <i class="right fas fa-angle-left"></i>
                      </p>
                      </a>
                      <ul class="nav nav-treeview" style="padding-left: 1%;">
                        <li class="nav-item">
                          <a href="SchedaPrimoColloquio.html" class="nav-link">
                            <i class="fas fa-clipboard nav-icon"></i>
                            <p>Primo colloquio
                            </p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="SchedaAssessmentGeneralizzato.html" class="nav-link">
                            <i class="fas fa-clipboard nav-icon"></i>
                            <p>Assessment generalizzato
                            </p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="SchedaAssessmentFocalizzato.html" class="nav-link active">
                            <i class="fas fa-clipboard nav-icon"></i>
                            <p>Assessment focalizzato
                            </p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="SchedaFollowUp.html" class="nav-link">
                            <i class="fas fa-clipboard nav-icon"></i>
                            <p>Follow-up
                            </p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="SchedaModelloEziologico.html" class="nav-link">
                            <i class="fas fa-clipboard nav-icon"></i>
                            <p>Modello eziologico
                            </p>
                          </a>
                        </li>
                      </ul>
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
    <!-- /.sidebar fine menu a sinistra-->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Scheda Assesment Focalizzato</h1>
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
          <?php for($i=0;$i<count($scheda);$i++){ ?>
          <div class="card card-primary collapsed-card"><!--//////////////////////-->
            <div class="card-header">
              <?php $date=date_create($scheda[$i][0]->getData()); $dS = date_format($date,"d/m/Y"); ?>
              <h3 class="card-title">Assessment Focalizzato <?php echo $dS; ?> </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-plus"></i></button><!-- /////////////////////////////-->
              </div>
            </div>
            <div class="card-body" style="display:none;"><!--//////////////////////-->

              <div class="form-group">
                <label>Date:</label>
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                      <input type="text" name="dateScheda" value='<?php echo $dS; ?>' class="form-control datetimepicker-input" data-target="#reservationdate" readonly/>
                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
              </div>


              <?php
              $dataCorr = date("Y,m,d");
              $dataCorr = str_replace(',','-',$dataCorr);
              if($scheda[$i][0]->getData() == $dataCorr){
                echo("<button type='button' id='btnAddAnEp' class='btn btn-block btn-primary' onclick='anEp(".$idSchedaCorr.")' style='width:100px'>+ episodio</button>");
              }
                ?>
                <!--<button type="button" class="btn btn-block btn-primary" onclick="newEp(document.getElementById('hideIdScheda').value)" style="width: 100px">+ episodio</button>-->
              <?php for($j=0;$j<count($scheda[$i][1]);$j++){ ?>
            <div class="card-body"><!--inizio episodio-->
              <?php if($scheda[$i][0]->getData() == $dataCorr){ ?>
              <form method="post" class="anEpisodio" action="../../applicationLogic/SeduteControlForm.php">
              <?php } ?>
              <p>Episodio<input type="text" name ="numero" value='<?php echo $scheda[$i][1][$j]->getNum(); ?>' style="width:40px;text-align:center;border:none;" readonly/></p>
              <div class="form-group">
                <label for="inputDescription">Analisi Funzionale</label>
                <textarea id="inputDescription" name="analisi" class="form-control" rows="4" readonly><?php echo $scheda[$i][1][$j]->getAnalisiFun(); ?></textarea>
              </div>
              <div class="form-group">
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><textarea name="a" class="textABC" readonly><?php echo $scheda[$i][1][$j]->getMA(); ?></textarea></td>
                        <td><textarea name="b" class="textABC" readonly><?php echo $scheda[$i][1][$j]->getMB(); ?></textarea></td>
                        <td><textarea name="c" class="textABC" readonly><?php echo $scheda[$i][1][$j]->getMC(); ?></textarea></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->


              <div class="form-group">
                <label for="appunti">Appunti Terapeuta</label>
                <textarea id="appunti" name="appunti" class="form-control" rows="4" readonly><?php echo $scheda[$i][1][$j]->getAppunti(); ?></textarea>
              </div>

            </div>
            <!-- /.card-body -->
            <?php if($scheda[$i][0]->getData() == $dataCorr){ ?>
            <div class="col-12">
              <a href="#" class="btn btn-secondary">Cancella episodio</a>
              <input type="submit" value="Modifica episodio" class="btn btn-success" style=" float: right">
            </div>
          <?php } ?>
          <?php if($scheda[$i][0]->getData() == $dataCorr){ ?>
        </form>
      <?php } ?>
          </div>
          <?php } ?>
          <!-- /.card fine episodi-->
        </div>
      </div>
    <?php } ?>

    <!-- Scheda nascosta che si vuole creare -->
    <div class="card card-primary" id="newScheda" hidden>
      <div class="card-header">
        <h3 class="card-title">Ass.Focalizzato</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label>Date:</label>
          <div class="input-group date" id="reservationdate" data-target-input="nearest">
              <input type="text" id="da" name="dateScheda" class="form-control datetimepicker-input" data-target="#reservationdate"/>
              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
          </div>
          <input type="text" id="idTerapia" name="idTerapia" value="1" hidden/>
          <button type="button" class="btn btn-success" id="btnAddScheda" onclick="saveScheda(document.getElementById('da').value,document.getElementById('idTerapia').value)" style=" float: right">Aggiungi Scheda</button>
      <!--  </form>-->
        </div>
        <input type="text" id="hideIdScheda" hidden/>
        <button type="button" id="btnAddEp" class="btn btn-block btn-primary" onclick="newEp(document.getElementById('hideIdScheda').value)" style="width: 100px"/hidden>+ episodio</button>
        <div class="card-body"><!--inizio episodi-->
          <form method="post" id="episodio" action="../../applicationLogic/SeduteControlForm.php">
          </form>
        <!-- /.card fine episodi-->
      </div><!-- Fine scheda aggiungi-->
    </div>
    </section>
    <div class="col-12">
      <button class="btn btn-success" id="btnNew" onclick="viewScheda();" style=" float: right">Nuova Scheda</button>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper Della nuova scheda che si vuole creare-->
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
<!-- date-range-picker -->
<!--script bottoni -->
<script src="../../dist/js/sedute.js"></script>
</body>
</html>
