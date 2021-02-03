<?php



/*
 * Sedute
 * Questa classe contiene le informazioni relative all'oggetto scheda primo colloquio
 * Autore: Capone Francesco
 * Versione: 1.0
 * 2020 Copyright by PsyMeet - University of Salerno
 */
class SchedaPrimoColloquio
{
	public static $tableName='schedaprimocolloquio';
	private $idScheda;
	private $data;
	private $problema;
	private $aspettative;
	private $motivazione;
	private $obiettivi;
	private $cambiamento;
	private $idTerapia;
	private $tipo;


	public function __construct(
		$idScheda,
		$data,
		$problema,
		$aspettative,
		$motivazione,
		$obiettivi,
		$cambiamento,
		$idTerapia,
		$tipo
	) {
		if ($data == null || $idTerapia == null || $tipo ==null) {
			throw new Exception('Alcuni valori non validi!');
		} elseif ($idTerapia<1) {
			throw new Exception('Id terapia non valido!');
		} elseif ($tipo != 'Scheda Primo Colloquio') {
			throw new Exception('Tipo scheda non compatibile!');
		} elseif (strlen($problema)==0 || $problema == null) {
			throw new Exception('Il campo Definizione Problema è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $problema)) {
			throw new Exception('Il campo Definizione Problema non rispetta il formato');
		} elseif (strlen($aspettative)==0 || $aspettative == null) {
			throw new Exception('Il campo Aspettative Paziente è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $aspettative)) {
			throw new Exception('Il campo Aspettative Paziente non rispetta il formato');
		} elseif (strlen($motivazione)==0 || $motivazione == null) {
			throw new Exception('Il campo Motivazione è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $motivazione)) {
			throw new Exception('Il campo Motivazione non rispetta il formato');
		} elseif (strlen($obiettivi)==0 || $obiettivi == null) {
			throw new Exception('Il campo Obiettivi è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $obiettivi)) {
			throw new Exception('Il campo Obiettivi non rispetta il formato');
		} elseif (strlen($cambiamento)==0 || $cambiamento == null) {
			throw new Exception('Il campo Definizione Cambiamento è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $cambiamento)) {
			throw new Exception('Il campo Definizione Cambiamento non rispetta il formato');
		}




		$this->idScheda = $idScheda;
		$this->data = $data;
		$this->problema = $problema;
		$this->aspettative = $aspettative;
		$this->motivazione = $motivazione;
		$this->obiettivi = $obiettivi;
		$this->cambiamento = $cambiamento;
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


	public function getProblema()
	{
		return $this->problema;
	}


	public function getAspettative()
	{
		return $this->aspettative;
	}


	public function getMotivazione()
	{
		return $this->motivazione;
	}


	public function getObiettivi()
	{
		return $this->obiettivi;
	}


	public function getCambiamento()
	{
		return $this->cambiamento;
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
		return ['id_scheda' => $this->idScheda, 'data' => $this->data, 'problema' => $this->problema, 'aspettative' => $this->aspettative, 'motivazione' => $this->motivazione, 'obiettivi' => $this->obiettivi, 'cambiamento' => $this->cambiamento, 'id_terapia' => $this->idTerapia, 'tipo' =>$this->tipo];
	}


	public function setIdScheda($idScheda)
	{
		$this->idScheda= $idScheda;
	}


	public function setData($data)
	{
		if ($data == null) {
			throw new Exception('Nuova data non disponibile');
		}
		$this->data = $data;
	}


	public function setProblema($problema)
	{
		if (strlen($problema)==0 || $problema == null) {
			throw new Exception('Il campo Definizione Problema è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $problema)) {
			throw new Exception('Il campo Definizione Problema non rispetta il formato');
		}
		$this->problema= $problema;
	}


	public function setAspettative($aspettative)
	{
		if (strlen($aspettative)==0 || $aspettative == null) {
			throw new Exception('Il campo Aspettative Paziente è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $aspettative)) {
			throw new Exception('Il campo Aspettative Paziente non rispetta il formato');
		}
		$this->aspettative = $aspettative;
	}


	public function setMotivazione($motivazione)
	{
		if (strlen($motivazione)==0 || $motivazione == null) {
			throw new Exception('Il campo Motivazione è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $motivazione)) {
			throw new Exception('Il campo Motivazione non rispetta il formato');
		}
		$this->motivazione= $motivazione;
	}


	public function setObiettivi($obiettivi)
	{
		if (strlen($obiettivi)==0 || $obiettivi == null) {
			throw new Exception('Il campo Obiettivi è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $obiettivi)) {
			throw new Exception('Il campo Obiettivi non rispetta il formato');
		}
		$this->obiettivi = $obiettivi;
	}


	public function setCambiamento($cambiamento)
	{
		if (strlen($cambiamento)==0 || $cambiamento == null) {
			throw new Exception('Il campo Definizione Cambiamento è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $cambiamento)) {
			throw new Exception('Il campo Definizione Cambiamento non rispetta il formato');
		}
		$this->cambiamento= $cambiamento;
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
		if ($tipo == null || $tipo != 'Scheda Primo Colloquio') {
			throw new Exception('Nuovo campo tipo non compatibile!');
		}
		$this->tipo =$tipo;
	}
}
