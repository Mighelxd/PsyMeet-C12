<?php
/*
    * Appuntamento 
    * Questa classe fornisce tutti i metodi per l'entit� Appuntamento
    * Autore: Marco Campione
    * Versione: 0.1
    * 2020 Copyright by PsyMeet - University of Salerno 
*/
class Appuntamento{
private $idAppuntamento;
private $data;
private $ora;
private $desc;
private $cfProf;
private $cfPaz;
public static $tableName="appuntamento";

  function __construct($id,$date,$hour,$des,$cfPr,$cfPa){
    if($date == null || $hour == null || $des == null || $cfPr == null || $cfPa == null){
      throw new Exception("Alcuni valori non definiti!");
    }
    else if(strlen($cfPr)!=16)
    {
      throw new Exception("Codice fiscale professionista non valido!");
    }
    else if(strlen($cfPa)!=16)
    {
      throw new Exception("Il campo Codice fiscale paziente non rispetta la lunghezza");
    }
    else if(!preg_match('/^[A-Za-z0-9]+$/', $cfPa)){
      throw new Exception("Il campo Codice fiscale paziente non rispetta il formato");
    }
    else if($hour[2] != ':' || $hour[5] != ':'){
      throw new Exception("Il campo Orario non rispetta il formato");
    }
    else if(!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $des))
    {
      throw new Exception("Il campo Descrizione non rispetta il formato");
    }
    $this->idAppuntamento = $id;
    $this->data = $date;
    $this->ora = $hour;
    $this->desc = $des;
    $this->cfProf = $cfPr;
    $this->cfPaz = $cfPa;
  }
  function getId(){
    if($this->idAppuntamento <=0 || $this->idAppuntamento == null){
      throw new Exception("Id appuntamento non valido!");
    }
    return $this->idAppuntamento;
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
    if($newId<=0 || $newId==null){
      throw new Exception('Nuovo id appuntamento non valido!');
    }
    $this->idAppuntamento = $newId;
  }
  function setData($newDate){
    if($newDate == null){
      throw new Exception('Nuova data appuntamento non valido!');
    }
    $this->data = $newDate;
  }
  function setOra($newOra){
    if($newOra == null){
      throw new Exception('Nuova ora appuntamento non valido!');
    }
    else if($newOra[2] != ':' || $newOra[5] != ':'){
      throw new Exception("Il campo Orario non rispetta il formato");
    }
    $this->ora = $newOra;
  }
  function setDesc($newDesc){
    if($newDesc == null){
      throw new Exception('Nuova descrizione appuntamento non valido!');
    }
    else if(!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $newDesc))
    {
      throw new Exception("Il campo Descrizione non rispetta il formato");
    }
    $this->desc = $newDesc;
  }
  function setCfProf($newCfProf){
    if($newCfProf==null || strlen($newCfProf)!=16){
      throw new Exception('Nuovo CF Professionista in appuntamento non valido!');
    }
    $this->cfProf = $newCfProf;
  }
  function setCfPaz($newCfPaz){
    if($newCfPaz==null || strlen($newCfPaz)!=16){
      throw new Exception('Il campo Codice fiscale paziente non rispetta la lunghezza');
    }
    else if(!preg_match('/^[A-Za-z0-9]+$/', $newCfPaz)){
      throw new Exception("Il campo Codice fiscale paziente non rispetta il formato");
    }
    $this->cfPaz = $newCfPaz;
  }

  function getArray(){
       return array("id_appuntamento" => $this->idAppuntamento,"data" => $this->data, "ora" => $this->ora, "descrizione" => $this->desc, "cf_prof" => $this->cfProf, "cf" => $this->cfPaz);
   }
}

?>
