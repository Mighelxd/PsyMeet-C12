<?php
/*
    * AppuntamentoControl 
    * Questo control fornisce tutte le operazioni che si possono fare per l'entità Appuntamento'
    * Autore: Marco Campione
    * Versione: 0.1
    * 2020 Copyright by PsyMeet - University of Salerno 
*/
include '../Storage/DatabaseInterface.php';

$action = $_GET['action'];
static const TABLE_NAME = 'appuntamento';

if($action == 'recoveryAll'){
  $cfProf = $_GET['key'];
  $allApp = 

  echo $appuntamento;
}
?>
