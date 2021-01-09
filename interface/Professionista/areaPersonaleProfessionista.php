
<?php
/*
    * areaPersonaleProfessionista.php
    * Pagina area personale professionista
    * Autore: Martino D'Auria
    * Versione: 0.1
    * 2020 Copyright by PsyMeet - University of Salerno
*/
include "../../storage/DatabaseInterface.php";
include "../../storage/Professionista.php";
include "../../applicationLogic/ProfessionistaControl.php";
$Professionista = professionistaControl::recuperaProfessionisti();
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | User Profile</title>
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
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>

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
          <li class="nav-item">
            <a href="Pazienti.html" class="nav-link">
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
            <?php for($i=0;$i<count($Professionista);$i++) { 
              ?>
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>
                 <td>
                    <?php echo $Professionista[$i]->getNome() , $Professionista[$i]->getCognome();
                      ?>
                 </td>
                <p class="text-muted text-center">// </p>

                <ul class="list-group list-group-unbordered mb-3">
				  <li class="list-group-item">
                    <b>Data di Nascita:</b> <td> <?php echo $Professionista[$i]->getDataNascita();?></td>
                  </li>
				  <li class="list-group-item">
                    <b>N iscrizione albo</b>       <td> <?php echo $Professionista[$i]->getNIscrizioneAlbo();?></td>
                  </li>
				  <li class="list-group-item">
                    <b>Email</b> <td> <?php echo $Professionista[$i]->getEmail();?></td>
                  </li>
				  <li class="list-group-item">
                    <b>Telefono</b> <td> <?php echo $Professionista[$i]->getTelefono();?></td>
                  </li>
				  <li class="list-group-item">
                    <b>Cellulare</b> <td> <?php echo $Professionista[$i]->getCellulare();?></td>
                  </li>
				  	  <li class="list-group-item">
                    <b>P.IVA</b> <td> <?php echo $Professionista[$i]->getPartitaIva();?></td>
                  </li>
				  	  <li class="list-group-item">
                    <b>Polizza RC</b> <td> <?php echo $Professionista[$i]->getPolizzaRc();?></td>
                  </li>
				  	  <li class="list-group-item">
                    <b>PEC</b> <td> <?php echo $Professionista[$i]->getPec();?></td>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <?php 
            }
          ?>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
            <?php for($i=0;$i<count($Professionista);$i++) { 
              ?>
              <div class="card-header">
                <h3 class="card-title">Scheda tecnica</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

			  <strong><i class="fas fa-graduation-cap"></i> Titolo di studio</strong>
          <td>  
            <?php echo $Professionista[$i]->getTitoloStudio();?>
          </td>
                <hr>
        <strong><i class="fas fa-book mr-1"></i> Pubblicazioni</strong>
          <td>  
            <?php echo $Professionista[$i]->getPubblicazioni();?>
          </td>
                <hr>
          <strong><i class="fas fa-map-marker-alt mr-1"></i> Indirizzo studio fisico</strong>
          <td>  
            <?php echo $Professionista[$i]->getIndirizzoStudio();?>
          </td>
                <hr>
          <strong><i class="fas fa-handshake"></i> Esperienze</strong>
          <td>  
            <?php echo $Professionista[$i]->getEsperienze();?>
          </td>
              <hr>
              </div>
              <?php 
                }
              ?>
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
                          <input type="text" class="form-control" id="cellulare" placeholder="Cellulare" name="cellulare">
                        </div>
                      </div>
					   <div class="form-group row">
                        <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="telefono" placeholder="Telefono" name="telefono">
                        </div>
                      </div>
					      <div class="form-group row">
                        <label for="indirizzoFisico" class="col-sm-2 col-form-label">Indirizzo studio</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="indirizzoFisico" placeholder="Indirizzo fisico" name="IndirizzoStudio">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="Email">
                        </div>
                      </div>
					      <div class="form-group row">
                        <label for="pax" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="pax" placeholder="Password" name="Password">
                        </div>
                      </div>
                <div class="form-group row">
                        <label for="titoloStudio" class="col-sm-2 col-form-label">Titolo di studio</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="titoloStudio" placeholder="Titolo di studio" name="TitoloDiStudio"></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="pubblicazioni" class="col-sm-2 col-form-label">Pubblicazioni</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="pubblicazioni" placeholder="Pubblicazioni" name="Pubblicazioni"></textarea>
                        </div>
                      </div>

					  <div class="form-group row">
                        <label for="esperienze" class="col-sm-2 col-form-label">Esperienze</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="esperienze" placeholder="Esperienze" name="Esperienze"></textarea>
                        </div>
                      </div>

  					<div class="form-group row">
              <label for="videoPresentazione" class="col-sm-2 col-form-label">Video di Presentazione</label>
              <div class="col-sm-10">
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Seleziona file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text" id="">Upload</span>
                  </div>
                </div>
              </div>
            </div>


                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" name="action" value="aggiornaDati"class="btn btn-danger">Conferma</button> 
                        </div>
                      </div>
                    </form>
                  </div>
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
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
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
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>