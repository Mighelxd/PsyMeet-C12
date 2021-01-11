<?php
  include "../storage/DatabaseInterface.php";
  include "../storage/cartellaClinica.php";
    if(!isset($_POST["azione"])){
        header("Location: ../interface/Professionista/pazienti.php");
        exit();
    }
session_start();
$cfProf=$_SESSION["codiceFiscale"];
if($_POST["azione"]=="visualizza"){
    $cfPaz=$_POST["codFiscalePaz"];
    
    $result=DatabaseInterface::selectQueryByAtt(array("cf_prof" => $cfProf, "cf" => $cfPaz),CartellaClinica::$tableName);
    if($result==null || $result==false){
        header("Location: ../interface/Professionista/pazienti.php");    
        exit();
    }
    $result=mysqli_fetch_array($result);
    $cartellaClinica=new CartellaClinica($result["id_cartella_clinica"],$result["q_umore"],$result["q_relazioni"],$result["patologie_pregresse"],$result["farmaci"],$cfProf,$cfPaz);
    $_SESSION["cartellaClinica"]=$cartellaClinica;
    header("Location: ../interface/Professionista/CartellaClinica.php");
    exit();
}


?>