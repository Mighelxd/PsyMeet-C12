<?php
session_start();

include '../storage/DatabaseInterface.php';
include '../storage/SchedaAssessmentFocalizzato.php';
include '../storage/Episodio.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $action = $_POST['action'];
}
else{
    $action = $_GET['action'];
}

if($action == "saveScheda"){
  $data = $_POST['data'];
  $idTerapia = $_POST['idTerapia'];
  $numEp = '0';
  $data = str_replace('/','-',$data);
  $data=date_create($data);
  $data = date_format($data,"Y/m/d");
  $scheda = array("data"=>$data,"n_episodi"=>$numEp,"id_terapia"=>$idTerapia,"tipo"=>"Scheda Assessment Focalizzato");

  $ok = DatabaseInterface::insertQuery($scheda,"schedaassessmentfocalizzato");

  $recIdScheda = DatabaseInterface::selectQueryByAtt($scheda,"schedaassessmentfocalizzato");
  while($row = $recIdScheda->fetch_array()){
    $idSchedaCorr = $row[0];
  }
  $ris = array("ok"=>$ok,"idScheda"=>$idSchedaCorr);
  echo json_encode($ris);
//  echo jeson_encode($res);

  //$exists =
  /*$numEp = $_POST['numero'];
  $analisi = $_POST['analisi'];
  $mA = $_POST['a'];
  $mB = $_POST['b'];
  $mC = $_POST['c'];
  $appunti = $_POST['appunti'];*/
}
if($action == "recoveryScheda"){
  $idScheda = $_POST['idScheda'];
  $key = array("key"=>$idScheda);

  $recScheda = DatabaseInterface::selectQueryById($key,'schedaassessmentfocalizzato');
  while($row = $recScheda->fetch_array()){
    $scheda = new SchedaAssessmentFocalizzato($row[0],$row[1],$row[2],$row[3],$row[4]);
  }
  echo jeson_encode($scheda->getArray());
}

 ?>
