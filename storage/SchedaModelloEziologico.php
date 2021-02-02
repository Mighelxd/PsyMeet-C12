<?php

/*
 * Sedute
 * Questa classe contiene le informazioni relative all'oggetto scheda modello eziologico
 * Autore: Capone Francesco
 * Versione: 1.0
 * 2020 Copyright by PsyMeet - University of Salerno
 */
class SchedaModelloEziologico
{
	public static $tableName='schedamodelloeziologico';
	private $idScheda;
	private $data;
	private $fattoriCausativi;
	private $fattoriPrecipitanti;
	private $fattoriMantenimento;
	private $relazioneFinale;
	private $idTerapia;
	private $tipo;


	public function __construct(
		$idScheda,
		$data,
		$fattoriCausativi,
		$fattoriPrecipitanti,
		$fattoriMantenimento,
		$relazioneFinale,
		$idTerapia,
		$tipo
	) {
		if ($data == null || $idTerapia == null || $tipo == null) {
			throw new Exception('Alcuni valori non validi!');
		} elseif (strlen($fattoriCausativi)==0 || $fattoriCausativi == null) {
			throw new Exception('Il campo Fattori Causativi è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $fattoriCausativi)) {
			throw new Exception('Il campo Fattori Causativi non rispetta il formato');
		} elseif (strlen($fattoriPrecipitanti)==0 || $fattoriPrecipitanti == null) {
			throw new Exception('Il campo Fattori Precipitanti è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $fattoriPrecipitanti)) {
			throw new Exception('Il campo Fattori Precipitanti non rispetta il formato');
		} elseif (strlen($fattoriMantenimento)==0 || $fattoriMantenimento == null) {
			throw new Exception('Il campo Fattori Mantenimento è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $fattoriMantenimento)) {
			throw new Exception('Il campo Fattori Mantenimento non rispetta il formato');
		} elseif (strlen($relazioneFinale)==0 || $relazioneFinale == null) {
			throw new Exception('Il campo Relazione finale è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $relazioneFinale)) {
			throw new Exception('Il campo Relazione finale non rispetta il formato');
		} elseif ($idTerapia<1) {
			throw new Exception('Id terapia non valido!');
		} elseif ($tipo != 'Scheda Modello Eziologico') {
			throw new Exception('Tipo scheda non compatibile!');
		}
		$this->idScheda = $idScheda;
		$this->data = $data;
		$this->fattoriCausativi= $fattoriCausativi;
		$this->fattoriPrecipitanti = $fattoriPrecipitanti;
		$this->fattoriMantenimento = $fattoriMantenimento;
		$this->relazioneFinale =$relazioneFinale;
		$this->idTerapia = $idTerapia;
		$this->tipo = $tipo;
	}


	public function getIdScheda()
	{
		return $this->idScheda;
	}


	public function getData()
	{
		return $this->data;
	}


	public function getFattoriCausativi()
	{
		return $this->fattoriCausativi;
	}


	public function getFattoriPrecipitanti()
	{
		return $this->fattoriPrecipitanti;
	}


	public function getFattoriMantenimento()
	{
		return $this->fattoriMantenimento;
	}


	public function getRelazioneFinale()
	{
		return $this->relazioneFinale;
	}


	public function getIdTerapia()
	{
		return $this->idTerapia;
	}


	public function getTipo()
	{
		return $this->tipo;
	}


	public function getArray()
	{
		return ['id_scheda' => $this->idScheda, 'data' => $this->data, 'fattori_causativi' => $this->fattoriCausativi, 'fattori_precipitanti' => $this->fattoriPrecipitanti, 'fattori_mantenimento' => $this->fattoriMantenimento, 'relazione_finale' => $this->relazioneFinale, 'id_terapia' => $this->idTerapia, 'tipo' =>$this->tipo];
	}


	public function setIdScheda($idScheda)
	{
		$this->idScheda= $idScheda;
	}


	public function setData($data)
	{
		date_default_timezone_set('Europe/Rome');
		$currDate = date('Y-m-d');
		if ($data == null) {
			throw new Exception('Nuova data non disponibile!');
		}
		$this->data = $data;
	}


	public function setFattoriCausativi($fattoriCausativi)
	{
		if (strlen($fattoriCausativi)==0 || $fattoriCausativi == null) {
			throw new Exception('Il campo Fattori Causativi è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $fattoriCausativi)) {
			throw new Exception('Il campo Fattori Causativi non rispetta il formato');
		}
		$this->fattoriCausativi = $fattoriCausativi;
	}


	public function setFattoriPrecipitanti($fattoriPrecipitanti)
	{
		if (strlen($fattoriPrecipitanti)==0 || $fattoriPrecipitanti == null) {
			throw new Exception('Il campo Fattori Precipitanti è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $fattoriPrecipitanti)) {
			throw new Exception('Il campo Fattori Precipitanti non rispetta il formato');
		}
		$this->fattoriPrecipitanti = $fattoriPrecipitanti;
	}


	public function setFattoriMantenimento($fattoriMantenimento)
	{
		if (strlen($fattoriMantenimento)==0 || $fattoriMantenimento == null) {
			throw new Exception('Il campo Fattori Mantenimento è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $fattoriMantenimento)) {
			throw new Exception('Il campo Fattori Mantenimento non rispetta il formato');
		}
		$this->fattoriMantenimento = $fattoriMantenimento;
	}


	public function setRelazioneFinale($relazioneFinale)
	{
		if (strlen($relazioneFinale)==0 || $relazioneFinale == null) {
			throw new Exception('Il campo Relazione finale è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $relazioneFinale)) {
			throw new Exception('Il campo Relazione finale non rispetta il formato');
		}
		$this->relazioneFinale = $relazioneFinale;
	}


	public function setIdTerapia($idTerapia)
	{
		if ($idTerapia == null || $idTerapia<1) {
			throw new Exception('Nuovo id terapia non valido!');
		}
		$this->idTerapia = $idTerapia;
	}


	public function setTipo($tipo)
	{
		if ($tipo == null || $tipo != 'Scheda Modello Eziologico') {
			throw new Exception('Nuovo tipo non valido!');
		}
		$this->tipo =$tipo;
	}
}
