<?php
/*
* GUI Paziente
* Questa View fornisce tutti gli elementi grafici della home page relativa al paziente
* Autore: Giuseppe Ferrante
* Versione: 0.2
* 2020 Copyright by PsyMeet - University of Salerno
*/
include "../../storage/Paziente.php";
include ("../../storage/DatabaseInterface.php");
include ("../../plugins/libArray/FunArray.php");
include "../../applicationLogic/PazienteControl.php";



session_start();
$tipoUtente = $_SESSION["tipo"];
if($tipoUtente != "paziente"){
  header("Location: ../Utente/login.php");
}
$cfPaziente = $_SESSION["codiceFiscale"];

$paz = PazienteControl::getPaz($cfPaziente);

$img=base64_encode($paz->getFotoProfiloPaz());




/*$arr = array("cf" => "NSTFNC94M23H703G",);
$result = DatabaseInterface::selectQueryById($arr,"paziente");
$arr = $result -> fetch_array();
$paz = new Paziente($arr[0], $arr[1], $arr[2], $arr[3], $arr[4], $arr[5], $arr[6], $arr[7], $arr[8], $arr[9], $arr[10], $arr[11]);
*/
 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Area Personale Paziente</title>
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
           <?php echo '<img class="img-circle elevation-2" src="data:image/jpeg;base64,'.$img.'"/>' ?>

         </div>
         <div class="info">
           <a href="areaPersonalePaziente.php" class="d-block"><?php echo $paz->getNome() ." ". $paz->getCognome(); ?> <i class="nav-icon fas fa-book-open" style="padding-left: 2%;" ></i></a>
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
               <div class="card-body box-profile">
                 <div class="text-center">


                        <?php echo '<img class="profile-user-img img-fluid img-circle" src="data:image/jpeg;base64,'.$img.'"/>' ?>

                 </div>

                 <h3 class="profile-username text-center"><?php echo $paz->getNome() ." " .$paz->getCognome(); ?></h3>

                 <p class="text-muted text-center">Data di nascita: <?php echo $paz->getDataNascita(); ?></p>

                 <ul class="list-group list-group-unbordered mb-3">
 				  <li class="list-group-item">
                     <b>Codice Fiscale:</b> <a class="float-right"><?php echo $paz->getCf(); ?></a>
                   </li>

 				  <li class="list-group-item">
                     <b>Email</b> <a class="float-right"><?php echo $paz->getEmail(); ?></a>
                   </li>
 				  <li class="list-group-item">
                     <b>Telefono</b> <a class="float-right"><?php echo $paz->getTelefono(); ?></a>
                   </li>
 				  	  <li class="list-group-item">
                     <b>Indirizzo</b> <a class="float-right"><?php  echo $paz->getIndirizzo(); ?></a>
                   </li>
                   <li class="list-group-item">
                          <b>Istruzione</b> <a class="float-right"><?php echo $paz->getIstruzione(); ?></a>
                        </li>

                        <li class="list-group-item">
                               <b>Lavoro</b> <a class="float-right"><?php echo $paz->getLavoro(); ?></a>
                             </li>

                             <li class="list-group-item">
                                    <b>Difficoltà cura</b> <a class="float-right"><?php echo $paz->getDifficolCura(); ?></a>
                                  </li>

                 </ul>
               </div>
               <!-- /.card-body -->
             </div>
             <!-- /.card -->

             <!-- About Me Box -->

             <!-- /.card -->
           </div>
           <!-- /.col -->
           <div class="col-md-9">
             <div class="card">
               <div class="card-header p-2">
                 <ul class="nav nav-pills">

                   <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab" >Settings</a></li>
                 </ul>
               </div><!-- /.card-header -->
               <div class="card-body">
                 <div class="tab-content">

                   <div class="tab-pane fade show active" id="settings">
                     <form class="form-horizontal" action="../../applicationLogic/AreaPersonalePazienteControl.php" method="post">
                       <input type="text" name="action" value="ModificaPaziente" hidden ="true">
 					   <div class="form-group row">
                         <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                         <div class="col-sm-10">
                           <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono">
                         </div>
                       </div>
 					      <div class="form-group row">
                         <label for="indirizzo" class="col-sm-2 col-form-label">Indirizzo</label>
                         <div class="col-sm-10">
                           <input type="text" class="form-control" name="indirizzo" id="indirizzo" placeholder="Indirizzo">
                         </div>
                       </div>
                       <div class="form-group row">
                         <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                         <div class="col-sm-10">
                           <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email">
                         </div>
                       </div>
 					      <div class="form-group row">
                         <label for="pax" class="col-sm-2 col-form-label">Password</label>
                         <div class="col-sm-10">
                           <input type="password" class="form-control" name="password" id="pax" placeholder="Password">
                         </div>
                       </div>

 					 <div class="form-group row">
                         <label for="titoloStudio" class="col-sm-2 col-form-label">Istruzione</label>
                         <div class="col-sm-10">
                           <input type="text" class="form-control" name="istruzione" id="istruzione" placeholder="Istruzione"></textarea>
                         </div>
                       </div>





                       <div class="form-group row">
                         <div class="offset-sm-2 col-sm-10">
                           <input type="submit"  class="btn btn-danger"></button>
                         </div>
                       </div>
                     </form>

                    <form enctype="multipart/form-data" action="../../applicationLogic/AreaPersonalePazienteControl.php" method="post" id="modificaFoto" >
                     <div class="form-group row">
                       <label for="videoPresentazione" class="col-sm-2 col-form-label">Foto Profilo</label>
                       <div class="col-sm-10">
                         <div class="input-group">
                           <div class="custom-file">
                             <input type="file" class="custom-file-input" name="fotoProfiloPaz" id="fotoProfiloPaz" name="immagine" accept=".jpg,.jpeg,.png,.bmp" required>
                             <label class="custom-file-label" for="exampleInputFile">Seleziona file</label>
                           </div>
                         </div>
                       </div>
                     </div>
                     <div class="form-group row">
                       <div class="offset-sm-2 col-sm-10">
                     <input type="text" name="action" value="modificaFoto" hidden = "true">
                     <input type="submit" class="btn btn-danger" name="modificaFoto" value="modifica foto">
                   </div>
                 </div>
                   </form>

                    <span style="color:red"><?php if(isset($_SESSION['eccezione'])){echo $_SESSION['eccezione'];} ?></span>
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
