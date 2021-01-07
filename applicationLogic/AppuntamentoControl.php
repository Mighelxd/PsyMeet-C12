<?php
/*
    * AppuntamentoControl
    * Questo control fornisce tutte le operazioni che si possono fare per Appuntamento'
    * Autore: Marco Campione
    * Versione: 0.1
    * 2020 Copyright by PsyMeet - University of Salerno
*/
session_start();
include '../storage/DatabaseInterface.php';
include '../storage/Appuntamento.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $action = $_POST['action'];
}
else{
    $action = $_GET['action'];
}

define("TABLE_NAME", "appuntamento");
/*Questa action recupera tutti gli appuntamenti di un professionista recuperando per ognuno il nome dei pazienti.*/
if($action == 'recoveryAll'){
  $cfProf = $_POST['key'];
  $arrKey = array("cf_prof"=>$cfProf);
  $allAppProf = DatabaseInterface::selectQueryByAtt($arrKey,TABLE_NAME);
  $allObj= array();

  while($row = $allAppProf->fetch_array()){
    $arrKeyPaz = array("cf"=>$row['cf']);
    $pazienteQuery = DatabaseInterface::selectQueryByAtt($arrKeyPaz,"paziente");
    while($rowP = $pazienteQuery->fetch_array()){
        $paziente = $rowP['nome']." ".$rowP['cognome'];
    }
    $a[] = $row;
    $row['cf'] .= " - $paziente";
    $allObj[]= $row;
  }

  $_SESSION["appuntamenti"] = $a;
  echo json_encode($allObj);
}
/*Questa action aggiunge un nuovo appuntamento*/
else if($action == 'addApp'){
    $data = $_POST['data'];
    $ora = $_POST['ora'];
    $descrizione = $_POST['descrizione'];
    $cf = $_POST['codF'];
    $arrAtt = array("data"=>$data,"ora"=>$ora,"descrizione"=>$descrizione,"cf_prof"=>'RSSMRC80R12H703U',"cf"=>$cf);

    $ok = DatabaseInterface::insertQuery($arrAtt,TABLE_NAME);
    if($ok){
      header('Location: ../interface/Professionista/calendario.php');
    }
}
/*Questa action cancella un appuntamento*/
else if($action == 'delApp'){
    $data = $_POST['data'];
    $ora = $_POST['ora'];
    $descrizione = $_POST['descrizione'];
    $cf = $_POST['codF'];

    $arrAtt = array("data"=>$data,"ora"=>$ora,"descrizione"=>$descrizione,"cf_prof"=>'RSSMRC80R12H703U',"cf"=>$cf);
    $ok = DatabaseInterface::deleteQuery($arrAtt,TABLE_NAME);
    if($ok){
        header('Location: ../interface/Professionista/calendario.php');
    }
}
/*Questa action modifica un appuntamento*/
else if($action == 'modApp'){
    $oldData = $_POST['oldData'];
    $oldOra = $_POST['oldOra'];
    $oldDescrizione = $_POST['oldDesc'];
    $oldCf = $_POST['oldCodF'];

    $arrOldAtt = array("data"=>$oldData,"ora"=>$oldOra,"descrizione"=>$oldDescrizione,"cf_prof"=>'RSSMRC80R12H703U',"cf"=>$oldCf);

    $data = $_POST['data'];
    $ora = $_POST['ora'];
    $descrizione = $_POST['descrizione'];
    $cf = $_POST['codF'];

    $colOld = array('*');
    $selOldApp = DatabaseInterface::selectDinamicQuery($colOld,$arrOldAtt,TABLE_NAME);
    while($row = $selOldApp->fetch_array()){
        $oldApp = new Appuntamento($row['id_appuntamento'],$row['data'],$row['ora'],$row['descrizione'],$row['cf_prof'],$row['cf']);
    }

    $oldApp->setData($data);
    $oldApp->setOra($ora);
    $oldApp->setDesc($descrizione);
    $oldApp->setCfPaz($cf);

    $isUpdate = DatabaseInterface::updateQueryById($oldApp->getArray(),TABLE_NAME);

    if($isUpdate){
        header('Location: ../interface/Professionista/calendario.php');
    }
    else{
        echo "no aggiornato";
    }
}
/*Questa action cerca il codice fiscale del paziente di cui si sa nome e cognome*/
else if($action == 'searchCf'){
    $keyN = $_POST['keyN'];
    $keyC = $_POST['keyC'];
    $arrCol = array('nome','cognome','cf');
    $arrAtt = array('nome'=>$keyN,'cognome'=>$keyC);
    $pazient = array();
    $pazienteQuery = DatabaseInterface::selectDinamicQuery($arrCol,$arrAtt,"paziente");

    while($rowP = $pazienteQuery->fetch_array()){
        $pazient[] = $rowP;
    }

    if(count($pazient) > 0){
        echo json_encode($pazient);
    }
    else{
        $arrS = array("cf" => "",);
        echo json_encode($arrS);
    }
}
/*Questa action controlla se esiste un appuntamento con un determinato orario*/
else if($action == 'recoveryAppToHour'){
  $cfProf = $_POST['cf_prof'];
  $oraApp = $_POST['oraApp'];
  $dataApp = $_POST['dataApp'];
  $arrKey = array("cf_prof"=>$cfProf,"data"=>$dataApp,"ora"=>$oraApp);
  $arrCol = array('*');
  $allAppProf = DatabaseInterface::selectDinamicQuery($arrCol,$arrKey,TABLE_NAME);
  if($allAppProf->num_rows == 0){
    echo true;
  }
  else{
    echo false;
  }
}
?>
