
<?php
/*
    * areaPersonaleProfessionista.php
    * Pagina area personale professionista
    * Autore: Martino D'Auria
    * Versione: 0.1
    * 2020 Copyright by PsyMeet - University of Salerno
*/
include ("../../plugins/libArray/FunArray.php");
include "../../storage/DatabaseInterface.php";
include "../../storage/Professionista.php";
include "../../applicationLogic/AreaInformativaControl.php";
//include "../../applicationLogic/modificaProfessionistaControl.php";


session_start();
$tipoUtente = $_SESSION["tipo"];
if($tipoUtente != "professionista"){
  header("Location: ../Utente/login.php");
}
$cfProfessionista = $_SESSION["codiceFiscale"];

$Professionista = AreaInformativaControl::getProf($cfProfessionista);
$img=base64_encode($Professionista->getImmagineProfessionista());


?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Area Personale</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
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
          <?php if ($img != NULL) {
            echo '<img class="img-circle elevation-2" src="data:image/jpeg;base64,'.$img.'"/>' ;
          }
          else {
              echo '<img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">';
          }

          ?>
        </div>
        <div class="info">
          <a href="areaPersonaleProfessionista.php" class="d-block"><?php echo $Professionista->getNome() ." ". $Professionista->getCognome(); ?> <i class="nav-icon fas fa-book-open" style="padding-left: 2%;" ></i></a>
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
          <li class="nav-item">
            <a href="Pazienti.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pazienti
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
            <h1>Area personale</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><?php echo $Professionista->getNome() ." ". $Professionista->getCognome(); ?> </li>
              <li class="breadcrumb-item active">Area personale</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <?php if ($img != NULL){
                     echo '<img class="profile-user-img img-fluid img-circle" src="data:image/jpeg;base64,'.$img.'"/>';
                  }
                  else {
                    echo '<img class="profile-user-img img-fluid img-circle"
                         src="../../dist/img/user4-128x128.jpg"
                         alt="User profile picture">';
                  }?>


                </div>

                <p class="text-muted text-center"><?php echo $Professionista->getNome() ." ". $Professionista->getCognome(); ?></p>

                <ul class="list-group list-group-unbordered mb-3">
				  <li class="list-group-item">
                    <b>Data di Nascita:</b> <td> <?php echo $Professionista->getDataNascita();?></td>
                  </li>
				  <li class="list-group-item">
                    <b>N iscrizione albo</b>       <td> <?php echo $Professionista->getNIscrizioneAlbo();?></td>
                  </li>
				  <li class="list-group-item">
                    <b>Email</b> <td> <?php echo $Professionista->getEmail();?></td>
                  </li>
				  <li class="list-group-item">
                    <b>Telefono</b> <td> <?php echo $Professionista->getTelefono();?></td>
                  </li>
				  <li class="list-group-item">
                    <b>Cellulare</b> <td> <?php echo $Professionista->getCellulare();?></td>
                  </li>
				  	  <li class="list-group-item">
                    <b>P.IVA</b> <td> <?php echo $Professionista->getPartitaIva();?></td>
                  </li>
				  	  <li class="list-group-item">
                    <b>Polizza RC</b> <td> <?php echo $Professionista->getPolizzaRc();?></td>
                  </li>
				  	  <li class="list-group-item">
                    <b>PEC</b> <td> <?php echo $Professionista->getPec();?></td>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>

            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">

              <div class="card-header">
                <h3 class="card-title">Scheda tecnica</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

			  <strong><i class="fas fa-graduation-cap"></i> Titolo di studio</strong>
          <td>
            <?php echo $Professionista->getTitoloStudio();?>
          </td>
                <hr>
        <strong><i class="fas fa-book mr-1"></i> Pubblicazioni</strong>
          <td>
            <?php echo $Professionista->getPubblicazioni();?>
          </td>
                <hr>
          <strong><i class="fas fa-map-marker-alt mr-1"></i> Indirizzo studio fisico</strong>
          <td>
            <?php echo $Professionista->getIndirizzoStudio();?>
          </td>
                <hr>
          <strong><i class="fas fa-handshake"></i> Esperienze</strong>
          <td>
            <?php echo $Professionista->getEsperienze();?>
          </td>
              <hr>
              </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9"> <!--Inizio -->
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">

                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab" >Modifica</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="tab-pane fade show active" id="settings">
                    <form class="form-horizontal" action="../../applicationLogic/modificaProfessionistaControl.php" method="post">

					     <div class="form-group row">
                        <label for="cellulare" class="col-sm-2 col-form-label">Cellulare</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="cellulare" placeholder="Cellulare" name="cellulare" pattern="[0-9]{10}" title="10 Numeri">
                        </div>
                      </div>
					   <div class="form-group row">
                        <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="telefono" placeholder="Telefono" name="telefono" pattern="[0-9]{10}" title="10 Numeri">
                        </div>
                      </div>
					      <div class="form-group row">
                        <label for="indirizzoFisico" class="col-sm-2 col-form-label">Indirizzo studio</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="indirizzoFisico" placeholder="Indirizzo fisico" name="IndirizzoStudio" pattern="[A-Z a-z 0-9 ']{2,250}" title="Da 2 a 250 caratteri Alfanumerici(Apostrofi Consentiti)">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="Email" pattern="^[\w-.]+@([\w-]+.)+[\w-]{2,4}$" title="formato email errato (email@gmail.it)">
                        </div>
                      </div>
					      <div class="form-group row">
                        <label for="pax" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="pax" placeholder="Password" name="Password" pattern=".{8,25}" title="da 8 a 25 caratteri (Quaslaisi carattere consentito)">
                        </div>
                      </div>
                <div class="form-group row">
                        <label for="titoloStudio" class="col-sm-2 col-form-label">Titolo di studio</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="titoloStudio" placeholder="Titolo di studio" name="TitoloDiStudio" pattern="[A-Z a-z 0-9 ']{2,500}" title="Da 2 a 500 caratteri Alfanumerici(Apostrofi Consentiti)"></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="pubblicazioni" class="col-sm-2 col-form-label">Pubblicazioni</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="pubblicazioni" placeholder="Pubblicazioni" name="Pubblicazioni" pattern="[A-Z a-z 0-9 ']{2,500}" title="Da 2 a 500 caratteri Alfanumerici(Apostrofi Consentiti)"></textarea>
                        </div>
                      </div>

					  <div class="form-group row">
                        <label for="esperienze" class="col-sm-2 col-form-label">Esperienze</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="esperienze" placeholder="Esperienze" name="Esperienze" pattern="[A-Z a-z 0-9 ']{2,500}" title="Da 2 a 500 caratteri Alfanumerici(Apostrofi Consentiti)"></textarea>
                        </div>
                      </div>




                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" name="action" value="aggiornaDati"class="btn btn-danger">Conferma</button><span style="color:red">
                        </div>
                      </div>
                    </form>


                    <form enctype="multipart/form-data" action="../../applicationLogic/modificaProfessionistaControl.php" method="post" id="modificaFoto" >
                     <div class="form-group row">
                       <label for="videoPresentazione" class="col-sm-2 col-form-label">Foto Profilo</label>
                       <div class="col-sm-10">
                         <div class="input-group">
                           <div class="custom-file">
                             <input type="file" class="custom-file-input" name="fotoProfiloProf" id="fotoProfiloProf" name="immagine" accept=".jpg,.jpeg,.png,.bmp" required>
                             <label class="custom-file-label" for="exampleInputFile">Seleziona file</label>
                           </div>
                         </div>
                       </div>
                     </div>
                     <div class="form-group row">
                       <div class="offset-sm-2 col-sm-10">
                     <input type="text" name="action" value="modificaFoto" hidden = "true">
                     <input type="submit" class="btn btn-danger" name="modificaFoto" value="modifica foto"><span style="color:red">
                    </div>
                    </div>
                    </form>
                      <span style="color:red"><?php if (isset($_SESSION['eccmodprof'])){echo $_SESSION['eccmodprof'];} ?></span>
                  </div>
                    <span style="color:red"><?php if (isset($_SESSION['eccareaprof'])){echo $_SESSION['eccareaprof'];} ?></span>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
