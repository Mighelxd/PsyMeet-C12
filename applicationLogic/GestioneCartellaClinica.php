<?php
  include "../storage/DatabaseInterface.php";
  include "../storage/cartellaClinica.php";
  include "../storage/Paziente.php";
  include "../storage/Professionista.php";
  include "CartellaClinicaControl.php";
  include "../plugins/libArray/FunArray.php";
session_start();
$cfProf=$_SESSION["codiceFiscale"];
$_SESSION['eccCaClPr']="";
if(isset($_POST["azione"])){
    if($_POST["azione"]=="visualizza"){
        try{
            $cfPaz=$_POST["codFiscalePaz"];
            $resultp=DatabaseInterface::selectQueryById(array("cf"=>$cfPaz),Paziente::$tableName);
            $resultp=mysqli_fetch_array($resultp);
            $paziente= new Paziente($resultp["cf"],$resultp["nome"],$resultp["cognome"],$resultp["data_nascita"],$resultp["email"],$resultp["telefono"],$resultp["passwor"],$resultp["indirizzo"],$resultp["istruzione"],$resultp["lavoro"],$resultp["difficol_cura"],$resultp["foto_profilo_paz"],$resultp["videochiamata"]);
            $_SESSION["datiPaziente"]=$paziente;
            $_SESSION["cartellaClinica"]=CartellaClinicaControl::getCartellaClinica($cfPaz,$cfProf);
            header("Location: ../interface/Professionista/CartellaClinica.php");
        }catch(Exception $e){
            echo $e->getMessage();
            $_SESSION['eccCaClPr']= $e->getMessage();
        }
    }
    else if($_POST["azione"]=="modifica"){
        try{
            $cfPaz=$_POST["codFiscalePaz"];
            $cartellaClinicOld=CartellaClinicaControl::getCartellaClinica($cfPaz,$cfProf);
            $date=date("Y-m-d");
            $cartellaClinica=new CartellaClinica ($cartellaClinicOld->getId(),$date,$_POST["umo"],$_POST["relaz"],$_POST["patol"],$_POST["farma"],$cfProf,$cfPaz);
            $result=CartellaClinicaControl::updateCartellaClinica($cartellaClinicOld->getId(),$date,$_POST["umo"],$_POST["relaz"],$_POST["patol"],$_POST["farma"],$cfProf,$cfPaz);
            if($result!=1){
                echo json_encode(array("esito"=>false, "errore" => $result));
            }
            echo json_encode(array("esito"=>true, "messaggio" => "Cartella Clinica modificata con successo."));
        }catch(Exception $e){
            echo json_encode(array("esito"=>false, "errore" => $e->getMessage()));
        }
    }
    else{
        try{
            $cfPaz=$_POST["codFiscalePaz"];
            $date=date("Y-m-d");
            $result=CartellaClinicaControl::saveCartellaClinica(-1,$date,$_POST["umo"],$_POST["relaz"],$_POST["patol"],$_POST["farma"],$cfProf,$cfPaz);
            if($result==1){
                echo json_encode(array("esito"=>true,"messaggio"=>"Cartella Clinica aggiunta con successo."));
            }
            else{
                echo json_encode(array("esito"=>false,"errore"=>$result));
            }
        }catch(Exception $e){
            echo json_encode(array("esito"=>false,"errore"=>$e->getMessage()));
        }
    }
}
elseif (isset($_SESSION["paziente"]) && isset($_SESSION["professionista"])){
    $_SESSION["datiPaziente"]=$_SESSION["paziente"];
    $_SESSION["cartellaClinica"]=CartellaClinicaControl::getCartellaClinica($_SESSION["paziente"]->getCf(),$cfProf);
    header("Location: ../interface/Professionista/CartellaClinica.php");
    exit();
}
else{
    header("Location: ../interface/Professionista/CartellaClinica.php");
}
?>