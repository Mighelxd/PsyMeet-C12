<?php



   /*
	 * CartellaClinica
	 * Questa classe contiene le informazioni relative all'oggetto cartella clinica
	 * Autore: D'Avino Michele
	 * Versione: 1.0
	 * 2020 Copyright by PsyMeet - University of Salerno
	 */
class CartellaClinica
{
	public static $tableName='cartellaclinica';
	private $id;
	private $farmaci;
	private $qualitaUmore;
	private $patologiePregresse;
	private $qualitaRelazioni;
	private $cfPaz;
	private $cfProf;
	private $dataCreazione;


	public function setFarmaci($fa)
	{
		if ($fa == null) {
			throw new Exception('Nuovo campo farmaci non valido!');
		} elseif (strlen($fa)<1 || strlen($fa)>500) {
			throw new Exception('Il campo Farmaci/Psicofarmaci non rispetta la lunghezza');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/ ', $fa)) {
			throw new Exception('Il campo Farmaci/Psicofarmaci non rispetta il formato');
		}
		$this->farmaci = $fa;
	}


	public function setQualitaUmore($qum)
	{
		if ($qum == null) {
			throw new Exception("Il campo qualita umore e' vuoto!");
		} elseif ($qum>9) {
			throw new Exception('Il campo Qualità Umore non rispetta la lunghezza');
		} elseif ($qum<1 || $qum>5) {
			throw new Exception('Il campo Qualità Umore non rispetta il formato');
		}
		$this->qualitaUmore = $qum;
	}


	public function setPatologiePregresse($pat)
	{
		if ($pat == null) {
			throw new Exception('Nuovo campo patologie pregresse non valido!');
		} elseif (strlen($pat)<1 || strlen($pat)>500) {
			throw new Exception('Il campo non rispetta la lunghezza');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/ ', $pat)) {
			throw new Exception('Il campo Patologie pregresse non rispetta il formato');
		}
		$this->patologiePregresse = $pat;
	}


	public function setQualitaRelazioni($qur)
	{
		if ($qur == null) {
			throw new Exception("Il campo qualita relazioni e' vuoto");
		} elseif ($qur>9) {
			throw new Exception('Il campo Qualità relazioni affettive non rispetta la lunghezza');
		} elseif ($qur<1 || $qur>5) {
			throw new Exception('Il campo Qualità relazioni affettive non rispetta il formato');
		}
		$this->qualitaRelazioni = $qur;
	}


	public function setCfProf($cfPro)
	{
		if ($cfPro==null || strlen($cfPro)!=16) {
			throw new Exception('Nuovo CF Professionista in cartella clinica non valido!');
		}
		$this->cfProf = $cfPro;
	}


	public function setCfPaz($cfPa)
	{
		if ($cfPa==null || strlen($cfPa)!=16) {
			throw new Exception('Nuovo CF Paziente in cartella clinica non valido!');
		}
		$this->cfPaz = $cfPa;
	}


	public function setData($d)
	{
		if ($d == null) {
			throw new Exception("Il campo data e' vuoto!");
		}
		$this->dataCreazione = $d;
	}


	public function getData()
	{
		return $this->dataCreazione;
	}


	public function getId()
	{
		return $this->id;
	}


	public function getFarmaci()
	{
		return $this->farmaci;
	}


	public function getCfProf()
	{
		return $this->cfProf;
	}


	public function getCfPaz()
	{
		return $this->cfPaz;
	}


	public function getQualitaUmore()
	{
		return $this->qualitaUmore;
	}


	public function getPatologiePregresse()
	{
		return $this->patologiePregresse;
	}


	public function getQualitaRealazioni()
	{
		return $this->qualitaRelazioni;
	}


	public function __constructD()
	{
		$this->id = -1;
		$this->farmaci = '';
		$this->qualitaUmore = '';
		$this->patologiePregresse = '';
		$this->qualitaRelazioni = '';
		$this->cfPaz = '';
		$this->cfProf = '';
	}


	public function __construct($i, $d, $qum, $qur, $pat, $fa, $cfPro, $cfPa)
	{
		if (
			$d == null
			|| $qum == null
			|| $qur == null
			|| $pat == null
			|| $fa == null
			|| $cfPro == null
			|| $cfPa == null
		) {
			throw new Exception('Alcuni valori sono vuoti!');
		} elseif (strlen($cfPro)!=16) {
			throw new Exception('Codice fiscale professionista non valido!');
		} elseif (strlen($cfPa)!=16) {
			throw new Exception('Codice fiscale paziente non valido!');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/ ', $fa)) {
			throw new Exception('Il campo Farmaci/Psicofarmaci non rispetta il formato');
		} elseif (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/ ', $pat)) {
			throw new Exception('Il campo Patologie pregresse non rispetta il formato');
		} elseif (strlen($fa)<=1 || strlen($fa)>500) {
			throw new Exception('Il campo farmaci non rispetta la lunghezza');
		} elseif (strlen($pat)<=1 || strlen($pat)>500) {
			throw new Exception('Il campo patologie non rispetta la lunghezza');
		} elseif ($qum>9) {
			throw new Exception('Il campo Qualità Umore non rispetta la lunghezza');
		} elseif ($qur>9) {
			throw new Exception('Il campo Qualità relazioni affettive non rispetta la lunghezza');
		} elseif ($qum<1 || $qum>5) {
			throw new Exception('Il campo Qualità Umore non rispetta il formato');
		} elseif ($qur<1 || $qur>5) {
			throw new Exception('Il campo Qualità relazioni affettive non rispetta il formato');
		}
		$this->id = $i;
		$this->dataCreazione=$d;
		$this->farmaci = $fa;
		$this->qualitaUmore = $qum;
		$this->patologiePregresse = $pat;
		$this->qualitaRelazioni =  $qur;
		$this->cfPaz = $cfPa;
		$this->cfProf = $cfPro;
	}


	public function getArray()
	{
		return ['id_cartella_clinica' => $this->id, 'data_creazione'=>$this->dataCreazione, 'farmaci' => $this->farmaci, 'q_umore' => $this->qualitaUmore, 'q_relazioni' => $this->qualitaRelazioni, 'patologie_pregresse' => $this->patologiePregresse, 'cf_prof' => $this->cfProf, 'cf' => $this->cfPaz];
	}


	public function getArraySenzaId()
	{
		return ['data_creazione'=>$this->dataCreazione, 'farmaci' => $this->farmaci, 'q_umore' => $this->qualitaUmore, 'q_relazioni' => $this->qualitaRelazioni, 'patologie_pregresse' => $this->patologiePregresse, 'cf_prof' => $this->cfProf, 'cf' => $this->cfPaz];
	}
}
