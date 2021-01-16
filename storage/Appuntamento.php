<?php
/*
    * Appuntamento 
    * Questa classe fornisce tutti i metodi per l'entit� Appuntamento
    * Autore: Marco Campione
    * Versione: 0.1
    * 2020 Copyright by PsyMeet - University of Salerno 
*/
class Appuntamento{
private $id_appuntamento;
private $data;
private $ora;
private $desc;
private $cfProf;
private $cfPaz;
public static $tableName="appuntamento";

  function __construct($id,$date,$hour,$des,$cfPr,$cfPa){
    date_default_timezone_set("Europe/Rome");
    $currDate = date("Y-m-d");
    $currHour = date("H:i:s");
    if($date < $currDate){
      throw new Exception("Data non disponibile!");
    }
    else if($date == $currDate && $hour<=$currHour){
      throw new Exception("Orario non disponibile! Inserisci un ora dopo le $currHour");
    }
    else if(strlen($cfPr)!=16){
      throw new Exception("Codice fiscale professionista non valido!");
    }
    else if(strlen($cfPa)!=16){
      throw new Exception("Codice fiscale paziente non valido!");
    }
    $this->id_appuntamento = $id;
    $this->data = $date;
    $this->ora = $hour;
    $this->desc = $des;
    $this->cfProf = $cfPr;
    $this->cfPaz = $cfPa;
  }
  function getId(){
    return $this->id_appuntamento;
  }
  function getData(){
    return $this->data;
  }
  function getOra(){
    return $this->ora;
  }
  function getDesc(){
    return $this->desc;
  }
  function getCfProf(){
    return $this->cfProf;
  }
  function getCfPaz(){
    return $this->cfPaz;
  }

  function setId($newId){
    $this->id_appuntamento = $newId;
  }
  function setData($newDate){
    $this->data = $newDate;
  }
  function setOra($newOra){
    $this->ora = $newOra;
  }
  function setDesc($newDesc){
    $this->desc = $newDesc;
  }
  function setCfProf($newCfProf){
    $this->cfProf = $newCfProf;
  }
  function setCfPaz($newCfPaz){
    $this->cfPaz = $newCfPaz;
  }

  public function getArray(){
       return array("id_appuntamento" => $this->id_appuntamento,"data" => $this->data, "ora" => $this->ora, "descrizione" => $this->desc, "cf_prof" => $this->cfProf, "cf" => $this->cfPaz);
   }
}

?>
