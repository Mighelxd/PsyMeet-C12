<?php
session_start();
include '..\plugins\libArray\FunArray.php';
include '../storage/DatabaseInterface.php';
include '../storage/Terapia.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $action = $_POST['action'];
}
else{
    $action = $_GET['action'];
}
$_SESSION['eccezione']="";
if($action == 'addTer'){
    try{
        $cfPaz = $_SESSION["cfPazTer"];
        $cfProf = $_SESSION["codiceFiscale"];
        $data = date("Y-m-d");
        $desc = $_POST['descTer'];

        $att = new Terapia(null,$data,$desc,$cfProf,$cfPaz);
        $ok = DatabaseInterface::insertQuery($att->getArray(),Terapia::$tableName);

        if($ok){
            header("Location: ../interface/Professionista/gestioneTerapia.php");
        }
        else{
            throw new Exception("Errore: Terapia non aggiunta!");
        }
    }catch(Exception $e){
        $_SESSION['eccezione']=$e->getMessage();
        header("Location: ../interface/Professionista/gestioneTerapia.php");
    }
}
else if($action == 'modTer'){
    try{
        $idTer = $_SESSION['idTerCorr'];
        $desc = $_POST['descTer'];

        $key = array("id_terapia"=>$idTer);
        $recTer = DatabaseInterface::selectQueryById($key,Terapia::$tableName);
        while($row = $recTer->fetch_array()){
            $terapia = new Terapia($row[0],$row[1],$row[2],$row[3],$row[4]);
        }
        $terapia->setDescrizione($desc);
        $upd=DatabaseInterface::updateQueryById($terapia->getArray(),Terapia::$tableName);
        if($upd){
            header("Location: ../interface/Professionista/gestioneTerapia.php");
        }else{
            throw new Exception("Errore: Terapia non modificata!");
        }
    }catch(Exception $e){
        $_SESSION['eccezione']=$e->getMessage();
        header("Location: ../interface/Professionista/gestioneTerapia.php");
    }
}
else if($action == 'delTer'){
    try{
        $idTer = $_SESSION['idTerCorr'];
        $key = array("id_terapia"=>$idTer);

        $ok=DatabaseInterface::deleteQuery($key,Terapia::$tableName);
        if($ok){
            header("Location: ../interface/Professionista/Pazienti.php");
        }else{
            throw new Exception("Errore: Terapia non eliminata!");
        }
    }catch(Exception $e){
        $_SESSION['eccezione']=$e->getMessage();
        header("Location: ../interface/Professionista/gestioneTerapia.php");
    }
}

 ?>
