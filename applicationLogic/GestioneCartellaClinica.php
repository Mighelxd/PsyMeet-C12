<?php
  include "../storage/DatabaseInterface.php";
  include "../storage/cartellaClinica.php";
  include "../storage/Paziente.php";
  include "../storage/Professionista.php";
  include "CartellaClinicaControl.php";
  include "../plugins/libArray/FunArray.php";
session_start();
$cfProf=$_SESSION["codiceFiscale"];
$_SESSION['eccezione']="";
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
            echo var_dump($paziente);
        }catch(Exception $e){
            echo $e->getMessage();
            $_SESSION['eccezione']= $e->getMessage();
        }
    }
    else if($_POST["azione"]=="modifica"){
        try{
            $cfPaz=$_POST["codFiscalePaz"];
            $cartellaClinicOld=CartellaClinicaControl::getCartellaClinica($cfPaz,$cfProf);
            $date=date("Y-m-d");
            $cartellaClinica=new CartellaClinica($cartellaClinicOld->getId(),$date,$_POST["umo"],$_POST["relaz"],$_POST["patol"],$_POST["farma"],$cfProf,$cfPaz);
            $result=CartellaClinicaControl::updateCartellaClinica($cartellaClinica);
            if(gettype($result) == "string"){
                echo json_encode(array("esito"=>false, "errore" => $result));
                exit();
            }
            echo json_encode(array("esito"=>true));
        }catch(Exception $e){
            echo $e->getMessage();
            $_SESSION['eccezione']= $e->getMessage();
        }
    }
    else{
        try{
            $cfPaz=$_POST["codFiscalePaz"];
            $date=date("Y-m-d");
            $cartellaClinica=new CartellaClinica(-1,$date,$_POST["umo"],$_POST["relaz"],$_POST["patol"],$_POST["farma"],$cfProf,$cfPaz);
            if(!isset($_POST["umo"])){
                echo json_encode(array("esito"=>true, "errore"=>"Inserire qualita' umore"));
                exit();
            }
            if(!isset($_POST["relaz"])){
                echo json_encode(array("esito"=>true, "errore"=>"Inserire qualita' relazioni"));
                exit();
            }
            if(!isset($_POST["patol"])){
                echo json_encode(array("esito"=>true, "errore"=>"Inserire patologie pregresse"));
                exit();
            }
            if(!isset($_POST["farma"])){
                echo json_encode(array("esito"=>true, "errore"=>"Inserire farmaci"));
                exit();
            }
            $result=CartellaClinicaControl::saveCartellaClinica($cartellaClinica);
            if($result){
                echo json_encode(array("esito"=>true));
                exit();
            }
            else{
                echo json_encode(array("esito"=>false,"errore"=>"errore inserimento sql"));
                exit();
            }
        }catch(Exception $e){
            $_SESSION['eccezione']= $e->getMessage();
            header("Location: ../interface/Professionista/CartellaClinica.php");
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