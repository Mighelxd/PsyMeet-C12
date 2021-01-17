<?php
/*
 * Gestione pacchetto
 * Questa classe contiene le informazioni relative all'oggetto fattura
 * Autore: Mary Cerullo
 * Versione: 0.1
 * 2020 Copyright by PsyMeet - University of Salerno
*/

class Fattura
{
  public static $tableName = 'fattura';
  private $idFattura;
  private $data;
  private $cfPaz;
  private $idScelta;

  public function __construct($idFattura, $data, $cfPaz,$idScelta)
  {
      date_default_timezone_set("Europe/Rome");
      $currDate = date("Y-m-d");
      if($data == null || $cfPaz == null || $idScelta == null){
          throw new Exception("Alcuni valori non definiti!");
      }
      else if($data<$currDate){
          throw new Exception("Data non disponibile!");
      }
      else if($idScelta<1){
          throw new Exception("Id scelta pacchetto non valido!");
      }
    $this->idFattura= $idFattura;
    $this->data = $data;
    $this->cfPaz= $cfPaz;
    $this->idScelta= $idScelta;
  }

  public function getIdFattura()
	{
		return $this->idFattura;
	}

  public function getCfPaz()
  {
    return $this->cfPaz;
  }

  public function getIdScelta()
  {
    return $this->idScelta;
  }

  public function getData()
  {
    return $this->data;
  }

  public function setData($data)
  {
      date_default_timezone_set("Europe/Rome");
      $currDate = date("Y-m-d");
      if($data == null || $data<$currDate){
          throw new Exception("Nuova data non disponibile!");
      }
    $this->data = $data;
  }

  public function getArray()
  {
    return array("id_fattura"=>$this->idFattura, "data"=>$this->data, "cf"=>$this->cfPaz, "id_scelta"=>$this->idScelta);
  }
}
