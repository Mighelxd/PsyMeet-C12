<?php
    include "../storage/DatabaseInterface.php";
    include "../storage/Professionista.php";
    include "../storage/Paziente.php";
    include "../plugins/libArray/FunArray.php";
        if(!isset($_POST["azione"])){
        session_start();
        if(!isset($_SESSION["codiceFiscale"]) || $_SESSION["tipo"]!="professionista") {
            header("Location: ../interface/Utente/login.php");
            exit();
        }
        $cf=$_SESSION["codiceFiscale"];
        if(!isset($_SESSION["codFiscalePaz"])){
            header("Location: ../interface/indexProfessionista.php");
            exit();
        }
        $cfpaz=$_SESSION["codFiscalePaz"];
        $resultp=DatabaseInterface::selectQueryById(array("cf" => $cfpaz), Paziente::$tableName);
        if($resultp->num_rows!=1){
            header("Location: ../interface/indexProfessionista.php");
            exit();
        }
        $resultp=$resultp->fetch_array();
        $paziente= new Paziente($resultp["cf"],$resultp["nome"],$resultp["cognome"],$resultp["data_nascita"],$resultp["email"],$resultp["telefono"],$resultp["passwor"],$resultp["indirizzo"],$resultp["istruzione"],$resultp["lavoro"],$resultp["difficol_cura"],$resultp["foto_profilo_paz"],$resultp["videochiamata"]);
        $resultp=NULL;
        $_SESSION["paziente"]=$paziente;
        $result=DatabaseInterface::selectQueryById(array("cf_prof"=> $cf),Professionista::$tableName);
        $result=$result->fetch_array();
        $professionista= new Professionista($result[0],$result[1],$result[2],$result[3],$result[4],$result[5],$result[6],$result[7],$result[8],$result[9],$result[10],$result[11],$result[12],$result[13],$result[14],$result[15],$result[16],$result[17]);
        $_SESSION["professionista"]=$professionista;
        header("Location: ../interface/professionista/videoConferenza.php");
    }
        elseif ($_POST["azione"]=="avvia"){
            session_start();
            $paziente=$_SESSION["paziente"];
            $paziente->setVideo(true);
            /*$result=DatabaseInterface::updateQueryById($paziente->getArray(),Paziente::$tableName);
            if($result){
                echo json_encode(array("esito"=>true));
                exit();
            }
            else{
                echo json_encode(array("esito"=>false,"errore"=>"errore update"));
            }*/
            echo json_encode(array("esito"=>true));
        }
?>