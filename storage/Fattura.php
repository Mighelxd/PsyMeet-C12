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
    $this->data = $data;
  }

  public function getArray()
  {
    return array("id_fattura"=>$this->idFattura, "data"=>$this->data, "cf"=>$this->cfPaz, "id_scelta"=>$this->idScelta);
  }
}
