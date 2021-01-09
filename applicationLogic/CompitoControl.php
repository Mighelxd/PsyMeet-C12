<?php

/*
    * CompitoControl
    * Questo control fornisce tutte le operazioni che si possono fare per il compito'
    * Autore: Mary Cerullo
    * Versione: 0.1
    * 2020 Copyright by PsyMeet - University of Salerno
*/


define("TABLE_NAME", "compito");



class CompitoControl {


static function selectAllCompitiProf ($cfProf) {

    $arrKey = array("cf_prof"=>$cfProf);
    $allCompProf = DatabaseInterface::selectQueryByAtt($arrKey,TABLE_NAME);
    while($row=$allCompProf->fetch_array()){
      $comp= new Compito($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
      $arr[]=$comp;
    }

    return $arr;

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








}
