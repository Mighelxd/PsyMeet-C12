<?php
session_start();
include '../../storage/Compito.php';
include '../../storage/DatabaseInterface.php';
include '../../plugins/libArray/FunArray.php';
include '../../applicationLogic/CompitoControl.php';
include "../../applicationLogic/terapiaControl.php";
include "../../storage/SchedaPrimoColloquio.php";
include "../../storage/SchedaModelloEziologico.php";
include "../../storage/SchedaFollowUp.php";
include "../../storage/SchedaAssessmentGeneralizzato.php";
include '../../storage/SchedaAssessmentFocalizzato.php';
include "../../applicationLogic/AreaInformativaControl.php";
include "../../applicationLogic/PazienteControl.php";
include "../../storage/Paziente.php";
include "../../storage/Professionista.php";

$tipoUtente = $_SESSION['tipo'];
$cf= $_SESSION['codiceFiscale'];
if ($tipoUtente != 'professionista') {
	header('Location: ../Utente/login.php');
}

if(isset($_SESSION['idTerCorr'])){
    $idTerCorr = $_SESSION['idTerCorr'];
    $allSc = terapiaControl::recuperaSchede($idTerCorr);
    for($i=0;$i<count($allSc);$i++){
        if($allSc[$i]->getTipo() == 'Scheda Primo Colloquio'){
            $schPrimoColl[] = $allSc[$i];
            $exist = true;
        }
    }
}
else{
    header("Location: Pazienti.php");
}


$compito= CompitoControl::selectAllCompitiProf($cf);

//$cfProfessionista = $_SESSION["codiceFiscale"];
$professionista = AreaInformativaControl::getProf($cf);
$img=base64_encode($professionista->getImmagineProfessionista());
$cfT = $_SESSION["cfPazTer"];
$paziente = PazienteControl::getPaz($cfT);

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
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PsyMeet | Compiti</title>
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
  <!-- ELEM CARTELLA CLINICA CSS -->
  <link rel="stylesheet" href="../../dist/css/elemCartellaCss.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
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
                                        <a href="SchedaModelloEziologico.php" class="nav-link">
                                            <i class="fas fa-clipboard nav-icon"></i>
                                            <p>Modello eziologico
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="gestioneCompiti.php" class="nav-link active">
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
            <h1>Menù Compiti</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Menù Compiti</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
        <span style="color:red"><?php if(isset($_SESSION['eccezione'])){echo $_SESSION['eccezione'];} ?></span>
    </section>

    <!-- Main content -->


    <section class="content">
      <form method="post" enctype="application/x-www-form-urlencoded" action="../../applicationLogic/CorrCompControl.php" onsubmit=" return validate();">
        <input type="text" name="action" value="addComp" hidden="true">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Aggiungi un nuovo compito</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>

            <div class="card-body">
              <div class="form-group">
                <label for="data">Data</label>
                <input type="date" id="inputData" name="data" class="form-control" rows="1" >
                <span id="dataSpan"> </span>
              </div>
              <div class="form-group">
                <label for="titolo">Titolo</label>
                <textarea name="titolo" class="form-control" rows="1" required></textarea>
              </div>
              <div class="form-group">
                <label for="descrizione">Descrizione</label>
                <textarea name="descrizione" class="form-control" rows="3" required ></textarea>
              </div>
              <div class="form-group">
                <label for="svolgimento">Svolgimento Compito</label>
                <textarea name="svolgimento" class="form-control" rows="3" readonly></textarea>
              </div>
              <div class="form-group">
                <label for="correzione">Correzione Compito</label>
                <textarea name="correzione" class="form-control" rows="3" readonly></textarea>
              </div>
              <div class="form-group">
                <label for="effettuato">Effettuato</label>
                <input type="checkbox" name="effettuato" class="form-control" rows="3" disabled>
              </div>
              <button name='action' type="submit" value="addComp" class="btn btn-success float-right" >Aggiungi Compito</button>

            </div>
          </form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- /.card -->
        </div>

      <?php
      if($compito!=null){
	   for ($i=0; $i<count($compito); $i++) {
	   	?>

      <form  nome"correz" method="post" enctype="application/x-www-form-urlencoded" action="../../applicationLogic/CorrCompControl.php">
        <input type="text" name="action" value="correzione" hidden="true">
      <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 name="id"  class="card-title">Compito <?php echo $compito[$i]->getId(); ?>  </h3>
                <input type="text" name="id" value="<?php echo $compito[$i]->getId(); ?>" hidden="true">
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="data">Data</label>
                  <input type="date" name="data"  value="<?php echo $compito[$i]->getData(); ?>" class="form-control" rows="1" readonly>
                </div>
                <div class="form-group">
                  <label for="titolo">Titolo</label>
                  <textarea name="titolo" class="form-control" rows="1" readonly> <?php echo $compito[$i]->getTitolo(); ?> </textarea>
                </div>
                <div class="form-group">
                  <label for="descrizione">Descrizione</label>
                  <textarea name="descrizione" class="form-control" rows="3" readonly> <?php echo $compito[$i]->getDescrizione(); ?> </textarea>
                </div>
                <div class="form-group">
                  <label for="svolgimento">Svolgimento Compito</label>
                  <textarea id="svl" name="svolgimento" class="form-control" rows="3" readonly>  <?php echo $compito[$i]->getSvolgimento(); ?> </textarea>
                    <span id="svolgSpan"> </span>
                </div>
                <div class="form-group">
                  <label for="correzione">Correzione Compito</label>
                  <textarea name="correzione" class="form-control" rows="3"> <?php echo $compito[$i]->getCorrezione(); ?> </textarea>
                </div>


              <?php
				$effett=$compito[$i]->getEffettuato();
	   	if ($effett=='1') {
	   		?>

                <div class="form-group">
                  <label for="effettuato">Effettuato</label>
                  <input  type="checkbox" value="1" name="effettuato" class="form-control" rows="1"  checked>
                </div>

              <?php
			} else {
				?>

                  <div class="form-group">
                    <label for="effettuato">Effettuato</label>
                    <input type="checkbox"  value="0" name="effettuato" class="form-control" rows="1">
                  </div>

            <?php
			} ?>

                <?php if ($compito[$i]->getSvolgimento() != '') { ?>
                  <input type="submit" value="Correggi Compito" class="btn btn-success float-right" >
                <?php } ?>
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->
            <!-- /.card -->
          </div>
            <!-- /.card -->
          </div>

            </form>
  <?php
	   }
      } ?>
    <span style="color:red"><?php echo $_SESSION['eccezione'] ?></span>
  </div>
    </section>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- validazione della data -->
<script>
function validate(){
  var data=document.getElementById("inputData");

  if(data_validation(data)) {
    return;
  }

  return false;


}

function data_validation(data){
	var currentDate = new Date();
	currentDate = currentDate.toISOString();
	currentDate = currentDate.substr(0,10);

	if(data.value < currentDate || data.value > currentDate){
		$("#dataSpan").text("Data inserita non valida!");
		$("#dataSpan").css("color", "red");
		$("#inputData").css("background-color", "red");
		return false;
	}
	else{
		return true;
	}
}
</script>

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
