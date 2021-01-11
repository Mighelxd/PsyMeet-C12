<?php
session_start();
include '..\plugins\libArray\FunArray.php';
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
  $key = array("id_scheda"=>$idScheda);

  $recScheda = DatabaseInterface::selectQueryById($key,'schedaassessmentfocalizzato');
  while($row = $recScheda->fetch_array()){
    $scheda = new SchedaAssessmentFocalizzato($row[0],$row[1],$row[2],$row[3],$row[4]);
  }
  echo json_encode($scheda->getArray());
}
if($action == "addEpisodio"){
  $numEp = $_POST['numero'];
  $analisi = $_POST['analisi'];
  $mA = $_POST['a'];
  $mB = $_POST['b'];
  $mC = $_POST['c'];
  $appunti = $_POST['appunti'];
  if($_POST['hIdS'] != null){
    $idScheda = $_POST['hIdS'];
  }
  else{
    $idScheda = $_SESSION['idSCorr'];
  }

  $attEp = array("numero"=>$numEp,"analisi_fun"=>$analisi,"m_a"=>$mA,"m_b"=>$mB,"m_c"=>$mC,"appunti"=>$appunti,"id_scheda"=>$idScheda);
  $insOk = DatabaseInterface::insertQuery($attEp,'episodio');
  if($insOk){
    $key = array("id_scheda"=>$idScheda);
    $recScheda = DatabaseInterface::selectQueryById($key,'schedaassessmentfocalizzato');
    while($row = $recScheda->fetch_array()){
      $scheda = new SchedaAssessmentFocalizzato($row[0],$row[1],$row[2],$row[3],$row[4]);
    }
    $newNumEp = $scheda->getNEpisodi() + 1;
    $scheda->setNEpisodi($newNumEp);
    $updateScheda = DatabaseInterface::updateQueryById($scheda->getArray(),'schedaassessmentfocalizzato');
    $_SESSION['idSCorr'] = $idScheda;
    header("Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php");
  }
}

 ?>
