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

$utenteNome = "Francesco";
$utenteCognome = "Nesta";
$utenteCf = "NSTFNC94M23H703G";


/*
$arrrr = array('nome' =>"nome1" , );
$pazientes = PazienteControl::searchPaz($arrrr);
var_dump($pazientes);*/
/*
$pazientiPaz = PazienteControl::getListPaz();
echo $pazientiPaz[2]->getCf();
$i =0;
while ($i < count($pazientiPaz)) {
  echo $pazientiPaz[$i]->getCf() ."<br>";
  echo $pazientiPaz[$i]->getNome()."<br>";
  echo $pazientiPaz[$i]->getCognome()."<br>";
  echo $pazientiPaz[$i]->getDataNascita()."<br>";
  echo $pazientiPaz[$i]->getEmail()."<br>";
  echo $pazientiPaz[$i]->getTelefono()."<br>";
  echo $pazientiPaz[$i]->getPassword()."<br>";
  echo $pazientiPaz[$i]->getIndirizzo()."<br>";
  echo $pazientiPaz[$i]->getIstruzione()."<br>";
  echo $pazientiPaz[$i]->getLavoro()."<br>";
  echo $pazientiPaz[$i]->getDifficolCura()."<br>";
  echo $pazientiPaz[$i]->getFotoProfiloPaz()."<br>";
  $i++;
}

*/

$paz = PazienteControl::getPaz($utenteCf);
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
       <li class="nav-item d-none d-sm-inline-block">
         <a href="#" class="nav-link">Home</a>
       </li>
       <li class="nav-item d-none d-sm-inline-block">
         <a href="#" class="nav-link">Contact</a>
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
           <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
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
             <a href="calendario.html" class="nav-link">
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
               <div class="card-body box-profile">
                 <div class="text-center">
                   <img class="profile-user-img img-fluid img-circle"
                        src="../../dist/img/user2-160x160.jpg"
                        alt="User profile picture">
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


                   </div>
                   <!-- /.tab-pane -->

                 </div>
                 <!-- /.tab-content -->

               </div><!-- /.card-body -->
             </div>
              <!-- /.nav-tabs-custom -->

              <div class = "card-body">

             <div class="form-group row">
               <label for="videoPresentazione" class="col-sm-2 col-form-label">Foto Profilo</label>
               <div class="col-sm-10">
                 <div class="input-group">
                   <div class="custom-file">
                     <input type="file" class="custom-file-input" name="fotoProfiloPaz" id="fotoProfiloPaz">
                     <label class="custom-file-label" for="exampleInputFile">Seleziona file</label>
                   </div>
                   <div class="input-group-append">
                     <span class="input-group-text" id="">Upload</span>
                   </div>
                 </div>
               </div>
             </div>

           </div>

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
