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
    $paziente= new Paziente($resultp["cf"],$resultp["nome"],$resultp["cognome"],$resultp["data_nascita"],$resultp["email"],$resultp["telefono"],$resultp["passwor"],$resultp["indirizzo"],$resultp["istruzione"],$resultp["lavoro"],$resultp["difficol_cura"],$resultp["foto_profilo_paz"]);
    $_SESSION["datiPaziente"]=$paziente;
    $result=DatabaseInterface::selectQueryByAtt(array("cf_prof" => $cfProf, "cf" => $cfPaz),CartellaClinica::$tableName);
    if(mysqli_num_rows($result)==0){
        $_SESSION["cartellaClinica"]=NULL;
        header("Location: ../interface/Professionista/pazienti.php");    
        exit();
    }
    $result=mysqli_fetch_array($result);
    $cartellaClinica=new CartellaClinica($result["id_cartella_clinica"],$result["data_creazione"],$result["q_umore"],$result["q_relazioni"],$result["patologie_pregresse"],$result["farmaci"],$cfProf,$cfPaz);
    $_SESSION["cartellaClinica"]=$cartellaClinica;
    header("Location: ../interface/Professionista/CartellaClinica.php");
    exit();
}
else
    if($_POST["azione"]=="modifica"){
        $cfPaz=$_POST["codFiscalePaz"];
        $result=DatabaseInterface::selectQueryByAtt(array("cf_prof" => $cfProf, "cf" => $cfPaz),CartellaClinica::$tableName);
        $result=mysqli_fetch_array($result);
        $idCartella=$result["id_cartella_clinica"];
        $date=date("Y-m-d");
        $cartellaClinica=new CartellaClinica($result["id_cartella_clinica"],$date,$_POST["umo"],$_POST["relaz"],$_POST["patol"],$_POST["farma"],$cfProf,$cfPaz);
        $result=DatabaseInterface::updateQueryById($cartellaClinica->getArray(), CartellaClinica::$tableName);
        if($result){
            echo json_encode(array("esito"=>true, "errore"=>$date));
            exit();
        }
        else{
            echo json_encode(array("esito"=>false,"errore"=>"errore modifica"));
            exit();
        }
    }
else{

}
?>