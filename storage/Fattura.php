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
  private $idPacchetto;

  public function __construct($idFattura, $data, $cfPaz, $idPacchetto)
  {
    $this->idFattura= $idFattura;
    $this->data = $data;
    $this->cfPaz= $cfPaz;
    $this->id_pacchetto= $idPacchetto;
  }

  public function getIdFattura()
	{
		return $this->idFattura;
	}

  public function getCfPaz()
  {
    return $this->cfPaz;
  }

  public function getIdPacchetto()
  {
    return $this->id_pacchetto;
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
    return ['id_fattura'->$idFattura, 'data'->$data, 'cf'->$cfPaz, 'id_pacchetto'->$idPacchetto];
  }

}
