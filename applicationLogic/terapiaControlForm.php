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

if($action == 'addTer'){
   $cfPaz = $_SESSION["cfPazTer"];
   $cfProf = $_SESSION["codiceFiscale"];
   $data = date("Y-m-d");

   $desc = $_POST['descTer'];

   $att = array("data" => $data, "descrizione" => $desc, "cf_prof" => $cfProf, "cf" => $cfPaz);
   $ok = DatabaseInterface::insertQuery($att,Terapia::$tableName);

   if($ok){
     header("Location: ../interface/Professionista/gestioneTerapia.php");
   }
}
else if($action == 'modTer'){
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
  }
}
else if($action == 'delTer'){
  $idTer = $_SESSION['idTerCorr'];
  $key = array("id_terapia"=>$idTer);

  $ok=DatabaseInterface::deleteQuery($key,Terapia::$tableName);
  if($ok){
    header("Location: ../interface/Professionista/gestioneTerapia.php");
  }
}

 ?>
