<?php
  include "../storage/DatabaseInterface.php";
  include "../storage/cartellaClinica.php";
  include "../storage/Paziente.php";
  include "../plugins/libArray/FunArray.php";
    if(!isset($_POST["azione"])){
        header("Location: ../interface/Professionista/pazienti.php");
        exit();
    }
    
session_start();
$cfProf=$_SESSION["codiceFiscale"];
if($_POST["azione"]=="visualizza"){
    $cfPaz=$_POST["codFiscalePaz"];
    $resultp=DatabaseInterface::selectQueryById(array("cf"=>$cfPaz),Paziente::$tableName);
    $resultp=mysqli_fetch_array($resultp);
    $paziente= new Paziente($resultp["cf"],$resultp["nome"],$resultp["cognome"],$resultp["data_nascita"],$resultp["email"],$resultp["telefono"],$resultp["passwor"],$resultp["indirizzo"],$resultp["istruzione"],$resultp["lavoro"],$resultp["difficol_cura"],$resultp["foto_profilo_paz"],$resultp["videochiamata"]);
    $_SESSION["datiPaziente"]=$paziente;
    $_SESSION["cartellaClinica"]=CartellaClinicaControl::getCartellaClinica($cfPaz,$cfProf);
    header("Location: ../interface/Professionista/CartellaClinica.php");
    exit();
}
else
    if($_POST["azione"]=="modifica"){
        $cfPaz=$_POST["codFiscalePaz"];
        $result=CartellaClinicaControl::getCartellaClinica($cfPaz,$cfProf);
        $idCartella=$result["id_cartella_clinica"];
        $date=date("Y-m-d");
        $cartellaClinica=new CartellaClinica($result["id_cartella_clinica"],$date,$_POST["umo"],$_POST["relaz"],$_POST["patol"],$_POST["farma"],$cfProf,$cfPaz);
        $result=CartellaClinicaControl::updateCartellaClinica($cartellaClinica);
        if(gettype($result) == "string"){
            echo json_encode(array("esito"=>false, "errore" => $result));
            exit();
        }
        echo json_encode(array("esito"=>true));
    }
else{
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
}
?>