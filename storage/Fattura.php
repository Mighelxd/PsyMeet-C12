<?php
declare(strict_types=1);
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
	private $nSeduteRim;


	public function __construct($idFattura, $data, $cfPaz, $idScelta, $nSeduteRim)
	{
		date_default_timezone_set('Europe/Rome');
		$currDate = date('Y-m-d');
		if ($data == null || $cfPaz == null || $idScelta == null || $nSeduteRim == null) {
			throw new Exception('Alcuni valori non definiti!');
		}
		/* else if($data>$currDate){
		  throw new Exception("Data non disponibile!");
		 }*/
		elseif ($idScelta<1) {
			throw new Exception('Id scelta pacchetto non valido!');
		} elseif ($nSeduteRim<0) {
			throw new Exception('Numero di visite non valido!');
		}
		$this->idFattura= $idFattura;
		$this->data = $data;
		$this->cfPaz= $cfPaz;
		$this->idScelta= $idScelta;
		$this->nSeduteRim = $nSeduteRim;
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


	public function getNSeduteRim()
	{
		return $this->nSeduteRim;
	}


	public function setNSeduteRim($sedute)
	{
		if ($sedute == null || $sedute<0 || $sedute>20) {
			throw new Exception('Nuovo numero sedute non corretto!');
		}
		$this->nSeduteRim=$sedute;
	}


	public function setData($data)
	{
		if ($data == null) {
			throw new Exception('Nuova data non disponibile!');
		}
		$this->data = $data;
	}


	public function getArray()
	{
		return ['id_fattura'=>$this->idFattura, 'data'=>$this->data, 'cf'=>$this->cfPaz, 'id_scelta'=>$this->idScelta, 'n_sedute_rim'=> $this->nSeduteRim];
	}
}
