<?php


/*
	* Episodio
	* Questa classe fornisce tutti i metodi per episodio
	* Autore: Marco Campione
	* Versione: 1.0
	* 2020 Copyright by PsyMeet - University of Salerno
*/
class Episodio
{
	public static $tableName='episodio';
	private $idEpisodio;
	private $numero;
	private $analisiFun;
	private $mA;
	private $mB;
	private $mC;
	private $appunti;
	private $idScheda;


	public function __construct($idEpisodio, $numero, $analisiFun, $mA, $mB, $mC, $appunti, $idScheda)
	{
		if ($numero == null || $numero<=0) {
			throw new Exception('Numero episodio non valido!');
		} elseif ($idScheda == null || $idScheda <=0) {
			throw new Exception('Id scheda non valido!');
		} elseif ($analisiFun == null || strlen($analisiFun)==0) {
			throw new Exception('Il campo analisi funzionale è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $analisiFun)) {
			throw new Exception('Il campo analisi funzionale non rispetta il formato');
		} elseif ($mA==null || strlen($mA)==0) {
			throw new Exception('Il campo A è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $mA)) {
			throw new Exception('Il campo A non rispetta il formato');
		} elseif ($mB==null || strlen($mB)==0) {
			throw new Exception('Il campo B è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $mB)) {
			throw new Exception('Il campo B non rispetta il formato');
		} elseif ($mC==null || strlen($mC)==0) {
			throw new Exception('Il campo C è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $mC)) {
			throw new Exception('Il campo C non rispetta il formato');
		} elseif ($appunti==null || strlen($appunti)==0) {
			throw new Exception('Il campo appunti terapeuta è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $appunti)) {
			throw new Exception('Il campo appunti terapeuta non rispetta il formato');
		}

		$this->idEpisodio = $idEpisodio;
		$this->numero = $numero;
		$this->analisiFun= $analisiFun;
		$this->mA = $mA;
		$this->mB = $mB;
		$this->mC =$mC;
		$this->appunti =$appunti;
		$this->idScheda = $idScheda;
	}


	public function getId()
	{
		return $this->idEpisodio;
	}


	public function getNum()
	{
		return $this->numero;
	}


	public function getAnalisiFun()
	{
		return $this->analisiFun;
	}


	public function getMA()
	{
		return $this->mA;
	}


	public function getMB()
	{
		return $this->mB;
	}


	public function getMC()
	{
		return $this->mC;
	}


	public function getAppunti()
	{
		return $this->appunti;
	}


	public function getIdScheda()
	{
		return $this->idScheda;
	}


	public function setNum($newNum)
	{
		if ($newNum==null || $newNum<=0) {
			throw new Exception('Nuovo numero episodio non valido!');
		}
		$this->numero = $newNum;
	}


	public function setAnalisiFun($analisiFun)
	{
		if (strlen($analisiFun)==0 || $analisiFun==null) {
			throw new Exception('Il campo analisi funzionale è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $analisiFun)) {
			throw new Exception('Il campo analisi funzionale non rispetta il formato');
		}
		$this->analisiFun = $analisiFun;
	}


	public function setMA($mA)
	{
		if (strlen($mA)==0 || $mA == null) {
			throw new Exception('Il campo A è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $mA)) {
			throw new Exception('Il campo A non rispetta il formato');
		}
		$this->mA = $mA;
	}


	public function setMB($mB)
	{
		if (strlen($mB)==0 || $mB==null) {
			throw new Exception('Il campo B è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $mB)) {
			throw new Exception('Il campo B non rispetta il formato');
		}
		$this->mB = $mB;
	}


	public function setMC($mC)
	{
		if (strlen($mC)==0 || $mC==null) {
			throw new Exception('Il campo C è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $mC)) {
			throw new Exception('Il campo C non rispetta il formato');
		}
		$this->mC = $mC;
	}


	public function setAppunti($appunti)
	{
		if (strlen($appunti)==0 || $appunti==null) {
			throw new Exception('Il campo appunti terapeuta è vuoto');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $appunti)) {
			throw new Exception('Il campo appunti terapeuta non rispetta il formato');
		}
		$this->appunti = $appunti;
	}


	public function setIdScheda($newIdSc)
	{
		if ($newIdSc == null || $newIdSc<=0) {
			throw new Exception('Nuovo id scheda non valido!');
		}
		$this->idScheda = $newIdSc;
	}


	public function getArray()
	{
		return ['id_episodio'=>$this->idEpisodio, 'numero'=>$this->numero, 'analisi_fun'=>$this->analisiFun, 'm_a'=>$this->mA, 'm_b'=>$this->mB, 'm_c'=>$this->mC, 'appunti'=>$this->appunti, 'id_scheda'=>$this->idScheda];
	}
}
