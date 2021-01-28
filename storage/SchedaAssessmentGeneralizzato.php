<?php
declare(strict_types=1);
/*
 * Gestione Sedute
 * Questa classe contiene le informazioni relative all'oggetto scheda assessment generalizzato
 * Autore: Simone D'Ambrosio
 * Versione: 0.1
 * 2020 Copyright by PsyMeet - University of Salerno
 */
class SchedaAssessmentGeneralizzato
{
	public static $tableName='schedaassessmentgeneralizzato';
	private $idScheda;
	private $data;
	private $autoregPositivi;
	private $autoregNegativi;
	private $cognitivePositivi;
	private $cognitiveNegativi;
	private $selfManagementNegativi;
	private $socialiPositivi;
	private $socialiNegativi;
	private $selfManagementPositivi;
	private $idTerapia;
	private $tipo;


	public function __construct(
		$idScheda,
		$data,
		$autoregPositivi,
		$autoregNegativi,
		$cognitivePositivi,
		$cognitiveNegativi,
		$selfManagementPositivi,
		$selfManagementNegativi,
		$socialiPositivi,
		$socialiNegativi,
		$idTerapia,
		$tipo
	) {
		if ($data == null /*|| $autoregNegativi == null || $autoregPositivi == null || $cognitivePositivi == null
		|| $cognitiveNegativi == null || $selfManagementNegativi == null || $selfManagementPositivi == null
		|| $socialiNegativi == null || $socialiPositivi == null */ || $idTerapia == null || $tipo == null) {
			throw new Exception('Alcuni valori non definiti!');
		} elseif (strlen($autoregPositivi) == 0) {
			throw new Exception('Il campo Autoregolazione-Aspetti Positivi è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $autoregPositivi)) {
			throw new Exception('Il campo Autoregolazione-Aspetti Positivi non rispetta il formato');
		} elseif (strlen($autoregNegativi) == 0) {
			throw new Exception('Il campo Autoregolazione-Aspetti Negativi è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $autoregNegativi)) {
			throw new Exception('Il campo Autoregolazione-Aspetti Negativi non rispetta il formato');
		} elseif (strlen($cognitivePositivi) == 0) {
			throw new Exception('Il campo Cognitive-Aspetti Positivi è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $cognitivePositivi)) {
			throw new Exception('Il campo Cognitive-Aspetti Positivi non rispetta il formato');
		} elseif (strlen($cognitiveNegativi) == 0) {
			throw new Exception('Il campo Cognitive-Aspetti Negativi è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $cognitiveNegativi)) {
			throw new Exception('Il campo Cognitive-Aspetti Negativi non rispetta il formato');
		} elseif (strlen($selfManagementPositivi) == 0) {
			throw new Exception('Il campo Self Management-Aspetti Positivi è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $selfManagementPositivi)) {
			throw new Exception('Il campo Self Management-Aspetti Positivi non rispetta il formato');
		} elseif (strlen($selfManagementNegativi) == 0) {
			throw new Exception('Il campo Self Management-Aspetti Negativi è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $selfManagementNegativi)) {
			throw new Exception('Il campo Self Management-Aspetti Negativi non rispetta il formato');
		} elseif (strlen($socialiPositivi) == 0) {
			throw new Exception('Il campo Sociali-Aspetti Positivi è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $socialiPositivi)) {
			throw new Exception('Il campo Sociali-Aspetti Positivi non rispetta il formato');
		} elseif (strlen($socialiNegativi) == 0) {
			throw new Exception('Il campo Sociali-Aspetti Negativi è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $socialiNegativi)) {
			throw new Exception('Il campo Sociali-Aspetti Negativi non rispetta il formato');
		} elseif ($idTerapia<1) {
			throw new Exception('Id terapia non valida!');
		} elseif ($tipo != 'Scheda Assessment Generalizzato') {
			throw new Exception('Tipo scheda non compatibile!');
		}
		$this->idScheda = $idScheda;
		$this->data = $data;
		$this->autoregPositivi= $autoregPositivi;
		$this->autoregNegativi = $autoregNegativi;
		$this->cognitivePositivi = $cognitivePositivi;
		$this->cognitiveNegativi =$cognitiveNegativi;
		$this->selfManagementNegativi =$selfManagementNegativi;
		$this->socialiPositivi =$socialiPositivi;
		$this->socialiNegativi =$socialiNegativi;
		$this->selfManagementPositivi =$selfManagementPositivi;
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


	public function getAutoregPositivi()
	{
		return $this->autoregPositivi;
	}


	public function getAutoregNegativi()
	{
		return $this->autoregNegativi;
	}


	public function getCognitivePositivi()
	{
		return $this->cognitivePositivi;
	}


	public function getCognitiveNegativi()
	{
		return $this->cognitiveNegativi;
	}


	public function getSelfManagementNegativi()
	{
		return $this->selfManagementNegativi;
	}


	public function getSocialiPositivi()
	{
		return $this->socialiPositivi;
	}


	public function getSocialiNegativi()
	{
		return $this->socialiNegativi;
	}


	public function getSelfManagementPositivi()
	{
		return $this->selfManagementPositivi;
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
		return ['id_scheda' => $this->idScheda, 'data' => $this->data, 'autoreg_positivi' => $this->autoregPositivi, 'autoreg_negativi' => $this->autoregNegativi, 'cognitive_positivi' => $this->cognitivePositivi, 'cognitive_negativi' => $this->cognitiveNegativi, 'self_management_positivi' => $this->selfManagementPositivi, 'self_management_negativi' => $this->selfManagementNegativi, 'sociali_positivi' => $this->socialiPositivi, 'sociali_negativi' => $this->socialiNegativi, 'id_terapia' => $this->idTerapia, 'tipo' =>$this->tipo];
	}


	public function setIdScheda($idScheda)
	{
		$this->idScheda= $idScheda;
	}


	public function setData($data)
	{
		if ($data==null) {
			throw new Exception('Nuova data non disponibile!');
		}
		$this->data = $data;
	}


	public function setAutoregPositivi($autoregPositivi)
	{
		if (strlen($autoregPositivi) == 0 || $autoregPositivi == null) {
			throw new Exception('Il campo Autoregolazione-Aspetti Positivi è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $autoregPositivi)) {
			throw new Exception('Il campo Autoregolazione-Aspetti Positivi non rispetta il formato');
		}
		$this->autoregPositivi = $autoregPositivi;
	}


	public function setAutoregNegativi($autoregNegativi)
	{
		if (strlen($autoregNegativi) == 0 || $autoregNegativi == null) {
			throw new Exception('Il campo Autoregolazione-Aspetti Negativi è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $autoregNegativi)) {
			throw new Exception('Il campo Autoregolazione-Aspetti Negativi non rispetta il formato');
		}
		$this->autoregNegativi = $autoregNegativi;
	}


	public function setCognitivePositivi($cognitivePositivi)
	{
		if (strlen($cognitivePositivi) == 0 || $cognitivePositivi == null) {
			throw new Exception('Il campo Cognitive-Aspetti Positivi è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $cognitivePositivi)) {
			throw new Exception('Il campo Cognitive-Aspetti Positivi non rispetta il formato');
		}
		$this->cognitivePositivi = $cognitivePositivi;
	}


	public function setCognitiveNegativi($cognitiveNegativi)
	{
		if (strlen($cognitiveNegativi) == 0 || $cognitiveNegativi == null) {
			throw new Exception('Il campo Cognitive-Aspetti Negativi è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $cognitiveNegativi)) {
			throw new Exception('Il campo Cognitive-Aspetti Negativi non rispetta il formato');
		}

		$this->cognitiveNegativi = $cognitiveNegativi;
	}


	public function setSelfManagementNegativi($selfManagementNegativi)
	{
		if (strlen($selfManagementNegativi) == 0 || $selfManagementNegativi == null) {
			throw new Exception('Il campo Self Management-Aspetti Negativi è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $selfManagementNegativi)) {
			throw new Exception('Il campo Self Management-Aspetti Negativi non rispetta il formato');
		}
		$this->selfManagementNegativi = $selfManagementNegativi;
	}


	public function setSocialiPositivi($socialiPositivi)
	{
		if (strlen($socialiPositivi) == 0 || $socialiPositivi == null) {
			throw new Exception('Il campo Sociali-Aspetti Positivi è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $socialiPositivi)) {
			throw new Exception('Il campo Sociali-Aspetti Positivi non rispetta il formato');
		}
		$this->socialiPositivi = $socialiPositivi;
	}


	public function setSocialiNegativi($socialiNegativi)
	{
		if (strlen($socialiNegativi) == 0 || $socialiNegativi == null) {
			throw new Exception('Il campo Sociali-Aspetti Negativi è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $socialiNegativi)) {
			throw new Exception('Il campo Sociali-Aspetti Negativi non rispetta il formato');
		}
		$this->socialiNegativi = $socialiNegativi;
	}


	public function setSelfManagementPositivi($selfManagementPositivi)
	{
		if (strlen($selfManagementPositivi) == 0 || $selfManagementPositivi == null) {
			throw new Exception('Il campo Self Management-Aspetti Positivi è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $selfManagementPositivi)) {
			throw new Exception('Il campo Self Management-Aspetti Positivi non rispetta il formato');
		}
		$this->selfManagementPositivi = $selfManagementPositivi;
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
		if ($tipo == null || $tipo!='Scheda Assessment Generalizzato') {
			throw new Exception('Nuovo tipo scheda non compatibile!');
		}
		$this->tipo =$tipo;
	}
}
