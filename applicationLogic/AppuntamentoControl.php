<?php
/*
    * AppuntamentoControl
    * Questo control fornisce tutte le operazioni che si possono fare per Appuntamento'
    * Autore: Marco Campione
    * Versione: 0.1
    * 2020 Copyright by PsyMeet - University of Salerno
*/
session_start();
include '../plugins/libArray/FunArray.php';
include '../storage/DatabaseInterface.php';
include '../storage/Appuntamento.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $action = $_POST['action'];
}
else{
    $action = $_GET['action'];
}

$cfProf = $_SESSION["codiceFiscale"];
$_SESSION['erroreApp']="";

/*Questa action recupera tutti gli appuntamenti di un professionista recuperando per ognuno il nome dei pazienti.*/
if($action == 'recoveryAll'){
    try {
        $arrKey = array("cf_prof" => $cfProf);
        $allAppProf = DatabaseInterface::selectQueryByAtt($arrKey, Appuntamento::$tableName);
        if($allAppProf === false){
            throw new Exception('recupero appuntamenti professionista fallita!');
        }
        $allObj = array();

        while ($row = $allAppProf->fetch_array()) {
            $arrKeyPaz = array("cf" => $row['cf']);
            $pazienteQuery = DatabaseInterface::selectQueryByAtt($arrKeyPaz, "paziente");
            if($pazienteQuery === false){
                throw new Exception('recupero dei pazienti associati agli appuntamenti fallita!');
            }
            while ($rowP = $pazienteQuery->fetch_array()) {
                $paziente = $rowP['nome'] . " " . $rowP['cognome'];
            }
            $a[] = $row;
            $row['cf'] .= " - $paziente";
            $allObj[] = $row;
        }

        $_SESSION["appuntamenti"] = $a;
        echo json_encode($allObj);
    }catch(Exception $e){
        $_SESSION['erroreApp'] = $e->getMessage();
        header('Location: ../interface/Professionista/calendario.php');
    }
}
/*Questa action aggiunge un nuovo appuntamento*/
else if($action == 'addApp'){
    try{
        $data = $_POST['data'];
        $ora = $_POST['ora'];
        $descrizione = $_POST['descrizione'];
        $cf = $_POST['codF'];
        $newApp = new Appuntamento(null,$data,$ora,$descrizione,$cfProf,$cf);
        $ok = DatabaseInterface::insertQuery($newApp->getArray(),Appuntamento::$tableName);
        if($ok){
            header('Location: ../interface/Professionista/calendario.php');
        }
        else{
            throw new Exception("Errore: Appuntamento non aggiunto!");
        }
    }catch(Exception $e){
        $_SESSION['erroreApp'] = $e->getMessage();
        header('Location: ../interface/Professionista/calendario.php');
    }
}
/*Questa action cancella un appuntamento*/
else if($action == 'delApp'){
    $data = $_POST['data'];
    $ora = $_POST['ora'];
    $descrizione = $_POST['descrizione'];
    $cf = $_POST['codF'];
    $id = $_POST['id'];
    try{
        $delApp = new Appuntamento($id,$data,$ora,$descrizione,$cfProf,$cf);
        $ok = DatabaseInterface::deleteQuery($delApp->getArray(),Appuntamento::$tableName);
        if($ok){
            header('Location: ../interface/Professionista/calendario.php');
        }
        else{
            throw new Exception("Errore: Appuntamento non eliminato!");
        }
    }catch(Exception $e){
        $_SESSION['erroreApp'] = $e->getMessage();
        header('Location: ../interface/Professionista/calendario.php');
    }
}
/*Questa action modifica un appuntamento*/
else if($action == 'modApp'){
    $id = $_POST['oldId'];

    $oldData = $_POST['oldData'];
    $oldOra = $_POST['oldOra'];
    $oldDescrizione = $_POST['oldDesc'];
    $oldCf = $_POST['oldCodF'];

    $data = $_POST['data'];
    $ora = $_POST['ora'];
    $descrizione = $_POST['descrizione'];
    $cf = $_POST['codF'];
    try{
        $oldApp = new Appuntamento($id,$oldData,$oldOra,$oldDescrizione,$cfProf,$oldCf);
        $oldApp->setData($data);
        $oldApp->setOra($ora);
        $oldApp->setDesc($descrizione);
        $oldApp->setCfPaz($cf);

        $isUpdate = DatabaseInterface::updateQueryById($oldApp->getArray(),Appuntamento::$tableName);
        if($isUpdate){
            header('Location: ../interface/Professionista/calendario.php');
        }
        else{
            throw new Exception("Errore: Appuntamento non modificato!");
        }
    }catch(Exception $e){
        $_SESSION['erroreApp'] = $e->getMessage();
        header('Location: ../interface/Professionista/calendario.php');
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
