<?php

include '..\plugins\libArray\FunArray.php';
include '../storage/DatabaseInterface.php';
include '../storage/SchedaAssessmentFocalizzato.php';
include '../storage/Episodio.php';
include '../storage/SchedaAssessmentGeneralizzato.php';
include '../storage/SchedaPrimoColloquio.php';
include '../storage/SchedaFollowUp.php';
include '../storage/SchedaModelloEziologico.php';
include "../storage/Professionista.php";
include "../storage/Paziente.php";
include "PazienteControl.php";
session_start();
if(isset($_POST['action'])) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
  } else {
    $action = $_GET['action'];
  }
}

$_SESSION['eccezioni']="";
if($action == "saveScheda"){
  try{
    $data = $_POST['data'];
    $idTerapia = $_POST['idTerapia'];
    $numEp = '0';
    $data = str_replace('/','-',$data);
    $data=date_create($data);
    $data = date_format($data,"Y/m/d");

    $scheda = new SchedaAssessmentFocalizzato(null,$data,$numEp,$idTerapia,"Scheda Assessment Focalizzato");
    $ok = DatabaseInterface::insertQuery($scheda->getArray(),"schedaassessmentfocalizzato");

    $recIdScheda = DatabaseInterface::selectQueryByAtt($scheda->getArray(),"schedaassessmentfocalizzato");
    while($row = $recIdScheda->fetch_array()){
      $idSchedaCorr = $row[0];
    }
    $_SESSION['idSCorr'] = $idSchedaCorr;
    $ris = array("ok"=>$ok,"idScheda"=>$idSchedaCorr);
    echo json_encode($ris);
  }catch(Exception $e){
    $_SESSION['eccezioni']=$e->getMessage();
    header("Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php");
  }
}
else if($action == 'delScheda'){
  try{
    $idScheda = $_SESSION['idSCorr'];
    $key = array("id_scheda"=>$idScheda);
    $ok = DatabaseInterface::deleteQuery($key,'schedaassessmentfocalizzato');
    if($ok){
      $_SESSION['idSCorr'] = "";
      header("Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php");
    }else{
      throw new Exception("Errore: scheda non eliminata!");
    }
  }catch(Exception $e){
    $_SESSION['eccezioni']=$e->getMessage();
    header("Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php");
  }
}
else if($action == "recoveryScheda"){
  try{
    $idScheda = $_POST['idScheda'];
    $key = array("id_scheda"=>$idScheda);

    $recScheda = DatabaseInterface::selectQueryById($key,'schedaassessmentfocalizzato');
    while($row = $recScheda->fetch_array()){
      $scheda = new SchedaAssessmentFocalizzato($row[0],$row[1],$row[2],$row[3],$row[4]);
    }
    echo json_encode($scheda->getArray());
  }catch(Exception $e){
    $_SESSION['eccezioni']=$e->getMessage();
    header("Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php");
  }

}
else if($action == "addEpisodio"){
  try{
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

    $attEp = new Episodio(null,$numEp,$analisi,$mA,$mB,$mC,$appunti,$idScheda);
    $insOk = DatabaseInterface::insertQuery($attEp->getArray(),'episodio');
    if($insOk){
      $key = array("id_scheda"=>$idScheda);
      $recScheda = DatabaseInterface::selectQueryById($key,'schedaassessmentfocalizzato');
      while($row = $recScheda->fetch_array()){
        $scheda = new SchedaAssessmentFocalizzato($row[0],$row[1],$row[2],$row[3],$row[4]);
      }
      $newNumEp = $scheda->getNEpisodi() + 1;
      $scheda->setNEpisodi($newNumEp);
      $updateScheda = DatabaseInterface::updateQueryById($scheda->getArray(),'schedaassessmentfocalizzato');
      if($updateScheda){
        $_SESSION['idSCorr'] = $idScheda;
        header("Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php");
      }else{
        throw new Exception("Errore: numero episodi in scheda non aggiornato!");
      }
    }else{
      throw new Exception("Errore: episodio non inserito!");
    }
  }catch(Exception $e){
    $_SESSION['eccezioni']=$e->getMessage();
    header("Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php");
  }
}
else if($action == 'delEpisodio'){
  try{
    $numEp = $_POST['numero'];
    $analisi = $_POST['analisi'];
    $mA = $_POST['a'];
    $mB = $_POST['b'];
    $mC = $_POST['c'];
    $appunti = $_POST['appunti'];
    if(isset($_SESSION['idSCorr'])){
      $idSchedaCorr = $_SESSION['idSCorr'];
    }

    $attEp = new Episodio(null,$numEp,$analisi,$mA,$mB,$mC,$appunti,$idScheda);
    $ok = DatabaseInterface::deleteQuery($attEp->getArray(),'episodio');
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
      if($updateScheda){
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
          if(!$up){
            throw new Exception("Errore: numero episodio in episodio non aggiornato!");
          }
        }
        header("Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php");
      }else{
        throw new Exception("Errore: numero episodio in scheda non modificato!");
      }
    }else{
      throw new Exception("Errore: episodio non eliminato!");
    }
  }catch(Exception $e){
    $_SESSION['eccezioni']=$e->getMessage();
    header("Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php");
  }
}
else if($action == 'modEpisodio'){
  try{
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
    }else{
      throw new Exception("Errore: episodio non modificato!");
    }
  }catch(Exception $e){
    $_SESSION['eccezioni']=$e->getMessage();
    header("Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php");
  }

}
/////////////////////////////////////////////////////////////Generalizzato
else if($action =='addSchGen'){
  try{
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
    $att = new SchedaAssessmentGeneralizzato(null,$dataCorr,$aspPosAut,$aspNegAut,$aspPosCog,$aspNegCog,$aspPosSM,$aspNegSM,$aspPosSo,$aspNegSo,$idTerCorr,"Scheda Assessment Generalizzato");
    $ok = DatabaseInterface::insertQuery($att->getArray(), SchedaAssessmentGeneralizzato::$tableName);
    if($ok) {
      header("Location: ../interface/Professionista/SchedaAssessmentGeneralizzato.php");
    }else{
      throw new Exception("Errore: scheda non aggiunta!");
    }
  }catch(Exception $e){
    $_SESSION['eccezioni']=$e->getMessage();
    header("Location: ../interface/Professionista/SchedaAssessmentGeneralizzato.php");
  }
}
else if($action =='delSchGen'){
  try{
    $idTerCorr = $_SESSION['idTerCorr'];
    $key = array("id_terapia"=>$idTerCorr);
    $ok=DatabaseInterface::deleteQuery($key,SchedaAssessmentGeneralizzato::$tableName);
    if($ok){
      header("Location: ../interface/Professionista/SchedaAssessmentGeneralizzato.php");
    }else{
      throw new Exception("Errore: scheda non eliminata!");
    }
  }catch(Exception $e){
    $_SESSION['eccezioni']=$e->getMessage();
    header("Location: ../interface/Professionista/SchedaAssessmentGeneralizzato.php");
  }
}
else if($action == 'modSchGen'){
  try{
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
    }else{
      throw new Exception("Errore: scheda non modificata!");
    }
  }catch(Exception $e){
    $_SESSION['eccezioni']=$e->getMessage();
    header("Location: ../interface/Professionista/SchedaAssessmentGeneralizzato.php");
  }
}
/////////////////////////////////////////////////////////////SPQ
else if($action == 'addSPQ'){
  try{
    $data = date("Y/m/d");
    $defP = $_POST['defP'];
    $aspP = $_POST['aspP'];
    $mot = $_POST['mot'];
    $obt = $_POST['obt'];
    $defC = $_POST['defC'];
    $tipo= "Scheda Primo Colloquio";
    $idTerCorr = $_SESSION['idTerCorr'];

    $att = new SchedaPrimoColloquio(null,$data,$defP,$aspP,$mot,$obt,$defC,$idTerCorr,$tipo);
    $ok = DatabaseInterface::insertQuery($att->getArray(),SchedaPrimoColloquio::$tableName);
    if($ok){
      header("Location: ../interface/Professionista/SchedaPrimoColloquio.php");
    }else{
      throw new Exception("Errore: scheda non aggiunta!");
    }
  }catch(Exception $e){
    $_SESSION['eccezioni']=$e->getMessage();
    header("Location: ../interface/Professionista/SchedaPrimoColloquio.php");
  }
}
else if($action == 'modSPQ'){
  try{
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
    }else{
      throw new Exception("Errore: scheda non modificata!");
    }
  }catch(Exception $e){
    $_SESSION['eccezioni']=$e->getMessage();
    header("Location: ../interface/Professionista/SchedaPrimoColloquio.php");
  }
}
else if($action == 'delSPQ'){
  try{
    $idTerCorr = $_SESSION['idTerCorr'];

    $key=array("id_terapia"=>$idTerCorr);
    $ok=DatabaseInterface::deleteQuery($key,SchedaPrimoColloquio::$tableName);
    if($ok){
      header("Location: ../interface/Professionista/SchedaPrimoColloquio.php");
    }else{
      throw new Exception("Errore: scheda non eliminata!");
    }
  }catch(Exception $e){
    $_SESSION['eccezioni']=$e->getMessage();
    header("Location: ../interface/Professionista/SchedaPrimoColloquio.php");
  }
}
/////////////////////////////////////////////Follow up
else if($action == 'addSFU'){
  try{
    $data = date("Y-m-d");
    $ric = $_POST['ric'];
    $esPos = $_POST['esPos'];
    $tipo= "Scheda Follow Up";
    $idTerCorr = $_SESSION['idTerCorr'];

    $att = new SchedaFollowUp(null,$data,$ric,$esPos,$idTerCorr,$tipo);

    $ok = DatabaseInterface::insertQuery($att->getArray(),SchedaFollowUp::$tableName);
    if($ok){
      header("Location: ../interface/Professionista/SchedaFollowUp.php");
    }else{
      throw new Exception("Errore: scheda non aggiunta!");
    }
  }catch(Exception $e){
    $_SESSION['eccezioni']=$e->getMessage();
    header("Location: ../interface/Professionista/SchedaFollowUp.php");
  }
}
else if($action == 'modSFU'){
  try{
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
    }else{
      throw new Exception("Errore: scheda non modificata!");
    }
  }catch(Exception $e){
    $_SESSION['eccezioni']=$e->getMessage();
    header("Location: ../interface/Professionista/SchedaFollowUp.php");
  }
}
else if($action == 'delSFU'){
  try{
    $idTerCorr = $_SESSION['idTerCorr'];

    $key=array("id_terapia"=>$idTerCorr);
    $ok=DatabaseInterface::deleteQuery($key,SchedaFollowUp::$tableName);
    if($ok){
      header("Location: ../interface/Professionista/SchedaFollowUp.php");
    }else{
      throw new Exception("Errore: scheda non eliminata!");
    }
  }catch(Exception $e){
    $_SESSION['eccezioni']=$e->getMessage();
    header("Location: ../interface/Professionista/SchedaFollowUp.php");
  }
}
/////////////////////////////////////////////////////////Scheda modello eziologico
else if($action == 'addSME'){
  try{
    $data = date("Y-m-d");
    $idTerCorr = $_SESSION['idTerCorr'];
    $tipo = "Scheda Modello Eziologico";
    $fc = $_POST['fc'];
    $fm = $_POST['fm'];
    $fp = $_POST['fp'];
    $rf = $_POST['rf'];

    $mEz = new SchedaModelloEziologico(null,$data,$fc,$fp,$fm,$rf,$idTerCorr,$tipo);

    $ok = DatabaseInterface::insertQuery($mEz->getArray(),SchedaModelloEziologico::$tableName);
    if($ok){
      header("Location: ../interface/Professionista/SchedaModelloEziologico.php");
    }else{
      throw new Exception("Errore: scheda non aggiunta!");
    }
  }catch(Exception $e){
    $_SESSION['eccezioni']=$e->getMessage();
    header("Location: ../interface/Professionista/SchedaModelloEziologico.php");
  }
}
else if($action == 'modSME'){
  try{
    $idTerCorr = $_SESSION['idTerCorr'];
    $fc = $_POST['fc'];
    $fm = $_POST['fm'];
    $fp = $_POST['fp'];
    $rf = $_POST['rf'];

    $key= array("id_terapia"=>$idTerCorr);
    $rec = DatabaseInterface::selectQueryById($key,SchedaModelloEziologico::$tableName);
    while($row = $rec->fetch_array()){
      $scME = new SchedaModelloEziologico($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7]);
    }
    $scME->setFattoriCausativi($fc);
    $scME->setFattoriMantenimento($fm);
    $scME->getFattoriPrecipitanti($fp);
    $scME->setRelazioneFinale($rf);

    $upd = DatabaseInterface::updateQueryById($scME->getArray(),SchedaModelloEziologico::$tableName);
    if($upd){
      header("Location: ../interface/Professionista/SchedaModelloEziologico.php");
    }else{
      throw new Exception("Errore: scheda non modificata!");
    }
  }catch(Exception $e){
    $_SESSION['eccezioni']=$e->getMessage();
    header("Location: ../interface/Professionista/SchedaModelloEziologico.php");
  }
}
else if($action == 'delSME'){
  try{
    $idTerCorr = $_SESSION['idTerCorr'];
    $key=array("id_terapia"=>$idTerCorr);
    $ok=DatabaseInterface::deleteQuery($key,SchedaModelloEziologico::$tableName);
    if($ok){
      header("Location: ../interface/Professionista/SchedaModelloEziologico.php");
    }else{
      throw new Exception("Errore: scheda non eliminata!");
    }
  }catch(Exception $e){
    $_SESSION['eccezioni']=$e->getMessage();
    header("Location: ../interface/Professionista/SchedaModelloEziologico.php");
  }
}
//////////////////////////////////////////////////////////////////////Videoconferenza
if($_POST["action"]=="avvia" && isset($_POST["codiceFiscale"])){
  //session_start();
  if(!isset($_SESSION["codiceFiscale"]) || $_SESSION["tipo"]!="professionista") {
    echo json_encode(array("esito"=>false));
    exit();
  }
  $cf=$_SESSION["codiceFiscale"];
  if(!isset($_POST["codiceFiscale"])){
    echo json_encode(array("esito"=>false));
    header("Location: ../interface/indexProfessionista.php");
    exit();
  }
  $cfpaz=$_POST["codiceFiscale"];
  $resultp=DatabaseInterface::selectQueryById(array("cf" => $cfpaz), Paziente::$tableName);
  if($resultp->num_rows!=1){
    echo json_encode(array("esito"=>false));
    exit();
  }
  try{
    $resultp=$resultp->fetch_array();
    $paziente= new Paziente($resultp["cf"],$resultp["nome"],$resultp["cognome"],$resultp["data_nascita"],$resultp["email"],$resultp["telefono"],$resultp["passwor"],$resultp["indirizzo"],$resultp["istruzione"],$resultp["lavoro"],$resultp["difficol_cura"],$resultp["foto_profilo_paz"],$resultp["videochiamata"]);
    $resultp=NULL;
    $_SESSION["paziente"]=$paziente;
    $result=DatabaseInterface::selectQueryById(array("cf_prof"=> $cf),Professionista::$tableName);
    $result=$result->fetch_array();
    $professionista= new Professionista($result[0],$result[1],$result[2],$result[3],$result[4],$result[5],$result[6],$result[7],$result[8],$result[9],$result[10],$result[11],$result[12],$result[13],$result[14],$result[15],$result[16],$result[17]);
    $_SESSION["professionista"]=$professionista;
    echo json_encode(array("esito"=>true));
  }catch(Exception $e){
    $_SESSION['eccezioni']=$e->getMessage();
    echo json_encode(array("esito"=>false,"errore"=>$e->getMessage()));
  }
}
elseif ($_POST["action"]=="avvia"){
  //session_start();
  $paziente=$_SESSION["paziente"];
  $paziente->setVideo(1);
  $result=DatabaseInterface::updateQueryById(array("cf"=>$paziente->getCf(),"videochiamata" => $paziente->getVideo()),Paziente::$tableName);
  if($result){
    echo json_encode(array("esito"=>true));
    exit();
  }
  else{
    echo json_encode(array("esito"=>false,"errore"=>"errore update"));
  }
  echo json_encode(array("esito"=>true));
}
elseif($_POST["action"]=="termina"){
  //session_start();
  $paziente=$_SESSION["paziente"];
  $paziente->setVideo(0);
  $result=DatabaseInterface::updateQueryById(array("cf"=>$paziente->getCf(),"videochiamata" => $paziente->getVideo()),Paziente::$tableName);
  if($result){
    echo json_encode(array("esito"=>true));
    exit();
  }
  else{
    echo json_encode(array("esito"=>false,"errore"=>"errore update"));
  }
  echo json_encode(array("esito"=>true));
}
elseif($_POST["action"]=="checkChiamata"){
  //session_start();
  $paziente=PazienteControl::getPaz($_SESSION["codiceFiscale"]);
  if($paziente->getVideo()){
    echo json_encode(array("esito"=>true));
    exit();
  }
  else{
    echo json_encode(array("esito"=>false));
    exit();
  }
}

?>
