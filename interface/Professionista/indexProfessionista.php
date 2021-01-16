<?php
    include "../../storage/DatabaseInterface.php";
    include "../../storage/Professionista.php";
    include "../../storage/Terapia.php";
    include  "../../storage/Paziente.php";
    include "../../plugins/libArray/FunArray.php";
    include "../../applicationLogic/PazienteControl.php";
    include "../../storage/Pacchetto.php";
    include "../../storage/scelta.php";
    include "../../applicationLogic/PacchettoControl.php";
    include "../../applicationLogic/ProfessionistaControl.php";

    session_start();
    if(!isset($_SESSION["codiceFiscale"]) || $_SESSION["tipo"]!="professionista") {
        header("Location: ../Utente/login.php");
        exit();
    }
    $cf=$_SESSION["codiceFiscale"];
    /*$result=DatabaseInterface::selectQueryById(array("cf_prof"=>$cf), Professionista::$tableName);
    if(!isset($result)||$result==false || $result->num_rows!=1){
        header("Location: ../Utente/login.php");
        exit();
    }
    $result=$result->fetch_array();
    $professionista = new Professionista($cf, $result["nome"],$result["cognome"],$result["data_nascita"],$result["email"],$result["telefono"],$result["cellulare"],$result["passwor"],$result["indirizzo_studio"],$result["esperienze"],$result["pubblicazioni"],$result["titolo_studio"],$result["n_iscrizione_albo"],$result["partita_iva"],$result["pec"],$result["specializzazione"],$result["polizza_RC"],$result["foto_profilo_professionista"]);
    */


$professionista = ProfessionistaControl::getProf($cf);
    $pazienti=PazienteControl::getPazientiByProf($cf);

    $pacchettoByProf= PacchettoControl::selectAllPacchettoProf($cf);

    $img=base64_encode($professionista->getImmagineProfessionista());
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home Professionista</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
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
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="../../dist/js/test.js"></script>
    <script src="../../dist/js/adminlte.min.js"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
</head>

<body class="hold-transition sidebar-mini layout-fixed" onload="rimuovi()">

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
<div class="wrapper">
    <!-- Navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="indexProfessionista.php" class="brand-link">
            <img src="../../dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">PsyMeet</span>
        </a>



            <!-- MENU' A SINISTRA -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4" >
                <!-- Brand Logo -->
                <a href="indexProfessionista.php" class="brand-link">
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
                            <a href="areaPersonaleProfessionista.php" class="d-block"><?php echo $professionista->getNome() . " " . $professionista->getCognome() ?> <i class="nav-icon fas fa-book-open" style="padding-left: 2%;" ></i></a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                            <li class="nav-item ">
                                <a href="indexProfessionista.php" class="nav-link active">
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
                                <a href="gestionePacchettiProf.php" class="nav-link">
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
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Professionista</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../Utente/Homepage.php">Home</a></li>
                            <li class="breadcrumb-item active">Area Professionista</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-info">
                                <h3 class="widget-user-username"><?php echo $professionista->getNome()." ".$professionista->getCognome() ?></h3>
                                <h5 class="widget-user-desc"><?php echo $professionista->getSpecializzazione() ?></h5>
                            </div>
                            <div class="widget-user-image">
                                <?php if ($img != NULL) {
                                    echo '<img class="img-circle elevation-2" src="data:image/jpeg;base64,'.$img.'"/>' ;
                                }
                                else {
                                    echo '<img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">';
                                }

                                ?>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header"><?php echo $professionista->getPec() ?></h5>
                                            <span class="description-text">PEC</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header"><?php echo $professionista->getCellulare() ?></h5>
                                            <span class="description-text">CELLULARE</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header"><?php echo $professionista->getIndirizzoStudio() ?></h5>
                                            <span class="description-text">Indirizzo Studio</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>

                        <!-- /.card -->

                        <div class="card" >
                            <div class="card-header border-0">
                                <h3 class="card-title">Pacchetti</h3>
                                <!--  <div class="" style="float: right" >
                                    <button type="button" class="btn btn-primary" name="button">Aggiungi</button>
                                  </div> -->
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                    <tr>
                                        <th>Pacchetto</th>
                                        <th>Prezzo</th>
                                        <th>Dettagli</th>
                                    </tr>
                                    </thead>

                                    <?php  if($pacchettoByProf !=NULL){
                                        for($i=0;$i<count($pacchettoByProf);$i++){


                                            $p=PacchettoControl::recuperaPacchetto($pacchettoByProf[$i]->getIdPacchetto());
                                            ?>
                                            <form method="post" action="../../applicationLogic/PacchettoControlForm.php">
                                                <input type="text" name="action" value="delPacchetto" hidden="true">
                                                <input type="text" name="idPacchetto" value= <?php echo $p->getIdPacchetto(); ?> hidden="true">
                                                <tbody>
                                                <tr>
                                                    <td >
                                                        <?php echo $p->getTipologia(); ?>
                                                    </td>
                                                    <td >
                                                        <?php echo $p->getPrezzo(); ?>
                                                    </td>
                                                    <td>
                                                        <a href="gestionePacchettiProf.php" class="text-muted">
                                                            <i class="fas fa-search"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </form>
                                            <?php
                                        }
                                    }
                                    else{
                                        echo "<tbody>
                  <tr>
                    <td >
                        vuota
                    </td>
                    <td >
                     vuota
                    </td>
                    <td></td>
                  </tr>

                  </tbody>";
                                    } ?>
                                </table>
                            </div>
                        </div>










                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable">
                        <!-- /.Table pazienti -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Pazienti in cura</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Cognome</th>
                                        <th style="width: 40px">Avvia Chiamata</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                     if($pazienti != NULL){

                                        foreach($pazienti as $paziente){ ?>
                                        <tr>
                                            <td><?php echo $paziente->getNome(); ?></td>
                                            <td><?php echo $paziente->getCognome(); ?></td>
                                            <td><button type="button" id="call" class="btn btn-block btn-danger btn-sm" onclick="buttonCall()" <?php if($paziente->getVideo()) echo "disabled" ?>><i class="fas fa-phone"></i></button></td>
                                        </tr>
                                    <?php }
                                     }

                                    else{
                                        echo '<tr>
                                            <td>vuoto</td>
                                            <td>vuoto</td>
                                            <td>vuoto</td>
                                        </tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.row -->

                    </section>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
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


<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script>
    function buttonCall(){
        <?php $_SESSION["codFiscalePaz"]=$paziente->getCf(); ?>
        window.location.replace("../../applicationLogic/videoConferenzaControl.php");
    }

</script>
</body>
</html>