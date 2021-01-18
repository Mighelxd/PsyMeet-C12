<!DOCTYPE html>
<html>
<?php
    include "../../storage/DatabaseInterface.php";
    include "../../storage/Professionista.php";
    include "../../storage/Terapia.php";
    include  "../../storage/Paziente.php";
    include "../../plugins/libArray/FunArray.php";
    include "../../applicationLogic/PazienteControl.php";
    include "../../applicationLogic/terapiaControl.php";
    session_start();
    if(!isset($_SESSION["codiceFiscale"]) || $_SESSION["tipo"]!="professionista") {
    header("Location: ../Utente/login.php");
    exit();
    }
    $cf=$_SESSION["codiceFiscale"];
    if(!isset($_SESSION["paziente"]) || !isset($_SESSION["professionista"])){
        header("Location: indexProfessionista.php");
        exit();
    }
    $paziente=$_SESSION["paziente"];
    $professionista=$_SESSION["professionista"];
    $terapie=terapiaControl::getTerapie($paziente->getCf(),$professionista->getCfProf());
    $_SESSION["cfPazTer"]=$paziente->getCf();
    if(!isset($terapie[0])){
        header("Location: indexProfessionista.php");
    }
    $_SESSION["idTerCorr"]=$terapie[0]->getIdTerapia();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Videochiamata con <?php echo $paziente->getNome()." ".$paziente->getCognome();  ?> </title>
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
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <script src="../../dist/js/videoChiamata.js"></script>
    <script src='https://meet.jit.si/external_api.js'></script>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
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
                    <a href="areaPersonaleProfessionista.php" class="d-block">Alexander Pierce <i class="nav-icon fas fa-book-open" style="padding-left: 2%;" ></i></a>
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
                                        <a href="schedaPaziente.php" class="nav-link">
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


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="col-lg-12">
            <!-- Default box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Videochiamata con <?php echo $paziente->getNome()." ".$paziente->getCognome();  ?></h3>
                </div>
                <span style="color:red"><?php if(isset($_SESSION['eccezione'])){echo $_SESSION['eccezione'];} ?></span>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6" id="videochiamata">
                        </div>
                        <div class="col-lg-3" id="bottoni">
                            <button type="button" class="btn-lg btn-primary" id="bottoneCart" onclick="apriFinestra('../../applicationLogic/GestioneCartellaClinica.php',1000,1000)">Cartella Clinica</button>
                            <button type="button" class="btn-lg btn-primary" id="bottoneDat" onclick="apriFinestra('schedaPaziente.php',1000,1000)">Dati Paziente</button>
                            <button type="button" class="btn-lg btn-primary" id="bottoneCom" onclick="apriFinestra('gestioneCompiti.php',1000,1000)">Compiti</button>
                            <button type="button" class="btn-lg btn-primary" id="bottoneTermina" onclick="terminaChiamata()">Termina chiamata</button>
                        </div>
                        <div class="col-lg-3" id="sedute">
                            <button type="button" class="btn-lg btn-primary" id="bottonePr" onclick="apriFinestra('SchedaPrimoColloquio.php',1000,1000)">Scheda Primo Colloquio</button>
                            <button type="button" class="btn-lg btn-primary" id="bottoneAssFoc" onclick="apriFinestra('SchedaAssessmentFocalizzato.php',1000,1000)">Scheda Assessment Focalizzato</button>
                            <button type="button" class="btn-lg btn-primary" id="bottoneAssGen" onclick="apriFinestra('SchedaAssessmentGeneralizzato.php',1000,1000)">Scheda Assessment Generalizzato</button>
                            <button type="button" class="btn-lg btn-primary" id="bottoniFoll" onclick="apriFinestra('SchedaFollowUp.php',1000,1000)">Scheda FollowUp</button>
                            <button type="button" class="btn-lg btn-primary" id="bottoneMod" onclick="apriFinestra('SchedaModelloEziologico.php',1000,1000)">Scheda ModelloEziologico</button>
                        </div>
                        <div id="messaggio" class="col-lg-12 alert alert-success"></div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <form id="formChiamata" method="post">
                        <input type="text" name="action" value="avvia" hidden="true">
                        <button type="submit" id="sottometti" class="btn btn-primary">Avvia Videochiamata</button>
                    </form>
                    <div id="messaggioChiamata" class="col-lg-12 alert alert-success" ></div>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script>
    $(".card-body").hide();
    $(".alert-success").hide();
    $("#formChiamata").submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '../../applicationLogic/SeduteControlForm.php',
            data: $("#formChiamata").serialize(),
            type: 'post',
            success:function(data){
                var response=JSON.parse(data);
                if(response.esito==true){
                    $("#formChiamata").remove();
                    $(".card-body").show();
                    $("#messaggioChiamata")[0].innerHTML="Per terminare la chiamata usare il tasto termina chiamata a sinistra.";
                    $("#messaggioChiamata").show()
                    var api=iniziaChiamata("<?php echo md5($paziente->getCognome().$paziente->getNome()); ?>");
                    $(".nav-link active").removeClass("active");
                    $(".nav-link").addClass("disabled")
                }
                console.log(response);
            },
            error: function(err){
                console.log(err);
            }
        })
    })
</script>
</body>

</html>
