<?php
session_start();
include '..\plugins\libArray\FunArray.php';
include '../storage/DatabaseInterface.php';
include '../storage/SchedaAssessmentFocalizzato.php';
include '../storage/Episodio.php';
include '../storage/SchedaAssessmentGeneralizzato.php';
include '../storage/SchedaPrimoColloquio.php';
include '../storage/SchedaFollowUp.php';

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
  $_SESSION['idSCorr'] = $idSchedaCorr;
  $ris = array("ok"=>$ok,"idScheda"=>$idSchedaCorr);
  echo json_encode($ris);
}
else if($action == 'delScheda'){
    $idScheda = $_SESSION['idSCorr'];
    $key = array("id_scheda"=>$idScheda);
    $ok = DatabaseInterface::deleteQuery($key,'schedaassessmentfocalizzato');
    if($ok){
      $_SESSION['idSCorr'] = "";
      header("Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php");
    }
}
else if($action == "recoveryScheda"){
  $idScheda = $_POST['idScheda'];
  $key = array("id_scheda"=>$idScheda);

  $recScheda = DatabaseInterface::selectQueryById($key,'schedaassessmentfocalizzato');
  while($row = $recScheda->fetch_array()){
    $scheda = new SchedaAssessmentFocalizzato($row[0],$row[1],$row[2],$row[3],$row[4]);
  }
  echo json_encode($scheda->getArray());
}
else if($action == "addEpisodio"){
  $numEp = $_POST['numero'];
  $analisi = $_POST['analisi'];
  $mA = $_POST['a'];
  $mB = $_POST['b'];
  $mC = $_POST['c'];
  $appunti = $_POST['appunti'];
  if(isset($_POST['hIdS'])){
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
else if($action == 'delEpisodio'){
  $numEp = $_POST['numero'];
  $analisi = $_POST['analisi'];
  $mA = $_POST['a'];
  $mB = $_POST['b'];
  $mC = $_POST['c'];
  $appunti = $_POST['appunti'];
  if(isset($_SESSION['idSCorr'])){
    $idSchedaCorr = $_SESSION['idSCorr'];
  }

  $attEp = array("numero"=>$numEp,"analisi_fun"=>$analisi,"m_a"=>$mA,"m_b"=>$mB,"m_c"=>$mC,"appunti"=>$appunti,"id_scheda"=>$idSchedaCorr);
  $ok = DatabaseInterface::deleteQuery($attEp,'episodio');
  if($ok){
    $key = array("id_scheda"=>$idSchedaCorr);
    $recScheda = DatabaseInterface::selectQueryById($key,'schedaassessmentfocalizzato');
    while($row = $recScheda->fetch_array()){
      $scheda = new SchedaAssessmentFocalizzato($row[0],$row[1],$row[2],$row[3],$row[4]);
    }
    $oldNumEpForSch = $scheda->getNEpisodi();
    $newNumEp = $oldNumEpForSch - 1;
    $scheda->setNEpisodi($newNumEp);
    $updateScheda = DatabaseInterface::updateQueryById($scheda->getArray(),'schedaassessmentfocalizzato');

    $att=array("id_scheda"=>$idSchedaCorr);
    $allEpForSch = DatabaseInterface::selectQueryByAtt($att,'episodio');
    while($row = $allEpForSch->fetch_array()){
      $listEp[] = new Episodio($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7]);
    }
    $posDaScalare = $oldNumEpForSch - (int)$numEp;
    $startIndex = $newNumEp - $posDaScalare;
    for($i=$startIndex;$i<count($listEp);$i++){
      $oldNumEp = $listEp[$i]->getNum();
      $listEp[$i]->setNum($oldNumEp - 1);
      $up=DatabaseInterface::updateQueryById($listEp[$i]->getArray(),'episodio');
    }
    header("Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php");
  }
}
else if($action == 'modEpisodio'){
  $numEp = $_POST['numero'];
  $analisi = $_POST['analisi'];
  $mA = $_POST['a'];
  $mB = $_POST['b'];
  $mC = $_POST['c'];
  $appunti = $_POST['appunti'];
  if(isset($_SESSION['idSCorr'])){
    $idSchedaCorr = $_SESSION['idSCorr'];
  }

  $attRec=array("numero"=>$numEp,"id_scheda"=>$idSchedaCorr);
  $recEp=DatabaseInterface::selectQueryByAtt($attRec,'episodio');
  while($row=$recEp->fetch_array()){
    $ep = new Episodio($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7]);
  }
  $ep->setAnalisiFun($analisi);
  $ep->setMA($mA);
  $ep->setMB($mB);
  $ep->setMC($mC);
  $ep->setAppunti($appunti);

  $upd = DatabaseInterface::updateQueryById($ep->getArray(),'episodio');
  if($upd){
    header("Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php");
  }
}
/////////////////////////////////////////////////////////////Generalizzato
else if($action =='addSchGen'){
  $aspPosAut = $_POST['aspPosAut'];
  $aspNegAut = $_POST['aspNegAut'];
  $aspPosCog = $_POST['aspPosCog'];
  $aspNegCog = $_POST['aspNegCog'];
  $aspPosSM = $_POST['aspPosSM'];
  $aspNegSM = $_POST['aspNegSM'];
  $aspPosSo = $_POST['aspPosSo'];
  $aspNegSo = $_POST['aspNegSo'];
  $idTerCorr = $_SESSION['idTerCorr'];
  $dataCorr = date("Y,m,d");
  $dataCorr = str_replace(',','-',$dataCorr);
  $att = array("data" => $dataCorr, "autoreg_positivi" => $aspPosAut, "autoreg_negativi" => $aspNegAut, "cognitive_positivi" => $aspPosCog, "cognitive_negativi" => $aspNegCog, "self_management_positivi" => $aspPosSM,"self_management_negativi" => $aspNegSM, "sociali_positivi" => $aspPosSo, "sociali_negativi" => $aspNegSo,  "id_terapia" => $idTerCorr, "tipo" =>"Scheda Assessment Generalizzato");
  $ok = DatabaseInterface::insertQuery($att, SchedaAssessmentGeneralizzato::$tableName);
  if($ok) {
    header("Location: ../interface/Professionista/SchedaAssessmentGeneralizzato.php");
  }
}
else if($action =='delSchGen'){
  $idTerCorr = $_SESSION['idTerCorr'];
  $key = array("id_terapia"=>$idTerCorr);
  $ok=DatabaseInterface::deleteQuery($key,SchedaAssessmentGeneralizzato::$tableName);
  if($ok){
    header("Location: ../interface/Professionista/SchedaAssessmentGeneralizzato.php");
  }
}
else if($action == 'modSchGen'){
  $aspPosAut = $_POST['aspPosAut'];
  $aspNegAut = $_POST['aspNegAut'];
  $aspPosCog = $_POST['aspPosCog'];
  $aspNegCog = $_POST['aspNegCog'];
  $aspPosSM = $_POST['aspPosSM'];
  $aspNegSM = $_POST['aspNegSM'];
  $aspPosSo = $_POST['aspPosSo'];
  $aspNegSo = $_POST['aspNegSo'];
  $idTerCorr = $_SESSION['idTerCorr'];

  $key = array("id_terapia"=>$idTerCorr);

  $recSchGen = DatabaseInterface::selectQueryById($key,SchedaAssessmentGeneralizzato::$tableName);
  while($row = $recSchGen->fetch_array()){
    $schGen = new SchedaAssessmentGeneralizzato($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10],$row[11]);
  }
  $schGen->setAutoregPositivi($aspPosAut);
  $schGen->setAutoregNegativi($aspNegAut);
  $schGen->setCognitivePositivi($aspPosCog);
  $schGen->setCognitiveNegativi($aspNegCog);
  $schGen->setSelfManagementPositivi($aspPosSM);
  $schGen->setSelfManagementNegativi($aspNegSM);
  $schGen->setSocialiPositivi($aspPosSo);
  $schGen->setSocialiNegativi($aspNegSo);

  $upd=DatabaseInterface::updateQueryById($schGen->getArray(),SchedaAssessmentGeneralizzato::$tableName);

  if($upd){
    header("Location: ../interface/Professionista/SchedaAssessmentGeneralizzato.php");
  }
}
/////////////////////////////////////////////////////////////SPQ
else if($action == 'addSPQ'){
  $data = date("Y/m/d");
  $defP = $_POST['defP'];
  $aspP = $_POST['aspP'];
  $mot = $_POST['mot'];
  $obt = $_POST['obt'];
  $defC = $_POST['defC'];
  $tipo= "Scheda Primo Colloquio";
  $idTerCorr = $_SESSION['idTerCorr'];

  $att = array("data" => $data, "problema" => $defP, "aspettative" => $aspP, "motivazione" => $mot, "obiettivi" => $obt,"cambiamento" => $defC, "id_terapia" => $idTerCorr,"tipo" =>$tipo);

  $ok = DatabaseInterface::insertQuery($att,SchedaPrimoColloquio::$tableName);
  if($ok){
    header("Location: ../interface/Professionista/SchedaPrimoColloquio.php");
  }
}
else if($action == 'modSPQ'){
  $defP = $_POST['defP'];
  $aspP = $_POST['aspP'];
  $mot = $_POST['mot'];
  $obt = $_POST['obt'];
  $defC = $_POST['defC'];
  $tipo= "Scheda Primo Colloquio";
  $idTerCorr = $_SESSION['idTerCorr'];

  $key=array("id_terapia"=>$idTerCorr);
  $rec=DatabaseInterface::selectQueryById($key,SchedaPrimoColloquio::$tableName);
  while($row = $rec->fetch_array()){
    $sPq = new SchedaPrimoColloquio($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
  }
  $sPq->setProblema($defP);
  $sPq->setAspettative($aspP);
  $sPq->setMotivazione($mot);
  $sPq->setObiettivi($obt);
  $sPq->setCambiamento($defC);

  $upd = DatabaseInterface::updateQueryById($sPq->getArray(),SchedaPrimoColloquio::$tableName);
  if($upd){
    header("Location: ../interface/Professionista/SchedaPrimoColloquio.php");
  }
}
else if($action == 'delSPQ'){
  $idTerCorr = $_SESSION['idTerCorr'];

  $key=array("id_terapia"=>$idTerCorr);
  $ok=DatabaseInterface::deleteQuery($key,SchedaPrimoColloquio::$tableName);
  if($ok){
    header("Location: ../interface/Professionista/SchedaPrimoColloquio.php");
  }
}
/////////////////////////////////////////////Follow up
else if($action == 'addSFU'){
  $data = date("Y-m-d");
  $ric = $_POST['ric'];
  $esPos = $_POST['esPos'];
  $tipo= "Scheda Follow Up";
  $idTerCorr = $_SESSION['idTerCorr'];

  $att = array("data" => $data, "ricadute" => $ric, "esiti_positivi" => $esPos, "id_terapia" => $idTerCorr,"tipo" => $tipo);

  $ok = DatabaseInterface::insertQuery($att,SchedaFollowUp::$tableName);
  if($ok){
    header("Location: ../interface/Professionista/SchedaFollowUp.php");
  }
}
else if($action == 'modSFU'){
  $ric = $_POST['ric'];
  $esPos = $_POST['esPos'];
  $idTerCorr = $_SESSION['idTerCorr'];

  $key=array("id_terapia"=>$idTerCorr);
  $rec=DatabaseInterface::selectQueryById($key,SchedaFollowUp::$tableName);
  while($row = $rec->fetch_array()){
    $sFu = new SchedaFollowUp($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
  }
  $sFu->setRicadute($ric);
  $sFu->setEsitiPositivi($esPos);

  $upd = DatabaseInterface::updateQueryById($sFu->getArray(),SchedaFollowUp::$tableName);
  if($upd){
    header("Location: ../interface/Professionista/SchedaFollowUp.php");
  }
}
else if($action == 'delSFU'){
  $idTerCorr = $_SESSION['idTerCorr'];

  $key=array("id_terapia"=>$idTerCorr);
  $ok=DatabaseInterface::deleteQuery($key,SchedaFollowUp::$tableName);
  if($ok){
    header("Location: ../interface/Professionista/SchedaFollowUp.php");
  }
}
 ?>
