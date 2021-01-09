<?php

/*
    * CompitoControl
    * Questo control fornisce tutte le operazioni che si possono fare per il compito'
    * Autore: Mary Cerullo
    * Versione: 0.1
    * 2020 Copyright by PsyMeet - University of Salerno
*/
//include '../../storage/DatabaseInterface.php';
// include ('../plugins/libArray/FunArray.php');
//include '../../storage/Compito.php';
define("TABLE_NAME", "compito");

/*if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $action = $_POST['action'];
}*/

class CompitoControl {


static function selectAllCompitiProf () {
  /*Questa action recupera tutti i compiti di un professionista */
  //   if($action == 'recoveryAll'){
    $arrKey = array("cf_prof"=>'RSSMRC80R12H703U');
    $allCompProf = DatabaseInterface::selectQueryByAtt($arrKey,TABLE_NAME);
    while($row=$allCompProf->fetch_array()){
      $comp= new Compito($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
      $arr[]=$comp;
    }

    return $arr;
//  }
}

// metodo aggiunto per selezionare tutti i compiti relativi al paziente
static function selectAllCompitiPaz ($cfPaz) {
    $arrKey = array("cf"=>$cfPaz);
    $allCompPaz = DatabaseInterface::selectQueryByAtt($arrKey,TABLE_NAME);
    while($row=$allCompPaz->fetch_array()){
      $comp= new Compito($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
      $arr[]=$comp;
    }

    return $arr;
}



 function correggiCompito(){
  //($action == 'correComp')
echo "sono qui";
      $oldId = $_POST['id'];
      $oldData = $_POST['data'];
      $oldTitolo = $_POST['titolo'];
      $oldDescrizione = $_POST['descrizione'];
      $oldCorrezione = $_POST['correzione'];
      $oldEffettuato = $_POST['effettuato'];


      $arrOldComp = array("id"=>$oldId,"data"=>$oldData,"titolo"=>$oldTitolo,"descrizione"=>$oldDescrizione,"correzione"=>$oldCorrezione,"effettuato"=>$oldEffettuato);

      $correzione = $_POST["correzione"];

      $array=array('*');
      $selOldComp = DatabaseInterface::selectDinamicQuery($array,$arrOldComp,TABLE_NAME);
      while($row = $selOldComp->fetch_array()){
          $oldComp = new Compito($row['id_compito'],$row['data'],$row['effettuato'],$row['titolo'],$row['descrizione'],$row['svolgimento'],$row['correzione'],$row['cf_prof'],$row['cf']);

    }
      $oldComp->setCorrezione($correzione);
      
      $isUpdate = DatabaseInterface::updateQueryById($oldComp->getArray(),TABLE_NAME);

      if($isUpdate){
          header('Location: ../interface/Professionista/gestioneCompiti.html');
      }
      else{
          echo "non corretto correttamente";
      }

}





}




/*Questa action aggiunge un nuovo compito*/


/*
 if($action == 'addComp'){
    $data = $_POST['data'];
    $titolo = $_POST['titolo'];
    $descrizione = $_POST['descrizione'];
    $svolgimento = $_POST['svolgimento'];
    $correzione = $_POST['correzione'];
    $effettuato = $_POST['effettuato'];
    $arrAtt = array("data"=>$data,"titolo"=>$titolo,"descrizione"=>$descrizione,"svolgimento"=>$svolgimento,"correzione"=>$correzione, "effettuato"=>$effettuato);
    $aggiunto = DatabaseInterface::insertQuery($arrAtt,TABLE_NAME);
    if($aggiunto){
        header('Location: ../interface/Professionista/gestioneCompiti.html');
    }

    else {
      echo "non inserito correttamente";
    }
}


*/

/*Questa action corregge un compito*/



/*
else if($action == 'correComp'){
    $oldData = $_POST['oldData'];
    $oldTitolo = $_POST['oldTitolo'];
    $oldDescrizione = $_POST['oldDesc'];
    $oldCorrezione = $_POST['oldCorrezione'];
    $oldEffettuato = $_POST['oldEffettuato'];
    $arrOldComp = array("data"=>$oldData,"titolo"=>$oldTitolo,"descrizione"=>$oldDescrizione,"correzione"=>$oldCorrezione,"oldEffettuato"=>$oldEffettuato);

    $correzione = $_POST["correzione"];

    $selOldComp = DatabaseInterface::selectQueryByAtt($arrOldComp,TABLE_NAME);
    while($row = $selOldComp->fetch_array()){
        $oldComp = new Compito($row['id_compito'],$row['data'],$row['effettuato'],$row['titolo'],$row['descrizione'],$row['svolgimento'],$row['correzione'],$row['cf_prof'],$row['cf']);
    }

    $oldComp->setCorrezione($correzione);

    $isUpdate = DatabaseInterface::updateQueryById($oldComp->getArray(),TABLE_NAME);

    if($isUpdate){
        header('Location: ../interface/Professionista/gestioneCompiti.html');
    }
    else{
        echo "non corretto correttamente";
    }
}


*/

/*Questa action svolge un compito*/



/*
else if($action == 'doComp'){
    $oldData = $_POST['oldData'];
    $oldTitolo = $_POST['oldTitolo'];
    $oldDescrizione = $_POST['oldDesc'];
    $oldCorrezione = $_POST['oldCorrezione'];
    $oldEffettuato = $_POST['oldEffettuato'];
    $arrOldComp = array("data"=>$oldData,"titolo"=>$oldTitolo,"descrizione"=>$oldDescrizione,"correzione"=>$oldCorrezione,"oldEffettuato"=>$oldEffettuato);

    $svolgimento = $_POST["svolgimento"];

    $selOldComp = DatabaseInterface::selectQueryByAtt($arrOldComp,TABLE_NAME);
    while($row = $selOldComp->fetch_array()){
        $oldComp = new Compito($row['id_compito'],$row['data'],$row['effettuato'],$row['titolo'],$row['descrizione'],$row['svolgimento'],$row['correzione'],$row['cf_prof'],$row['cf']);
    }

    $oldComp->setSvolgimento($svolgimento);

    $isUpdate = DatabaseInterface::updateQueryById($oldComp->getArray(),TABLE_NAME);

    if($isUpdate){
        header('Location: ../interface/Professionista/gestioneCompiti.html');
    }
    else{
        echo "non corretto correttamente";
    }
}

*/
