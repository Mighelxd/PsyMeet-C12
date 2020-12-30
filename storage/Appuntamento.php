<?php
/*
    * Appuntamento 
    * Questa classe fornisce tutti i metodi per l'entità Appuntamento
    * Autore: Marco Campione
    * Versione: 0.1
    * 2020 Copyright by PsyMeet - University of Salerno 
*/
class Appuntamento{
private $id_app;
private $data;
private $ora;
private $desc
private $cfProf;
private $cfPaz;

  function __construct(){
    $this->id_app = 0;
    $this->data = '';
    $this->ora = '';
    $this->desc = '';
    $this->cfProf = '';
    $this->cfPaz = '';
  }

  function __construct($id,$date,$hour,$des,$cfPr,$cfPa){
    $this->id_app = $id;
    $this->data = $date;
    $this->ora = $hour;
    $this->desc = $des;
    $this->cfProf = $cfPr;
    $this->cfPaz = $cfPa;
  }
  function getId(){
    return $this->id_app;
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
    $this->id_app = $newId;
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
       return array("id_appuntamento" => $this->id_app, "data" => $this->data, "ora" => $this->ora, "descrizione" => $this->desc, "cf_prof" => $this->cfProf, "cf" => $this->cfPaz);
   }
}

?>
