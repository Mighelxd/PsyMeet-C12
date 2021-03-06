<?php



	/*
	 * Compito
	 * Questa classe contiene le informazioni relative all'oggetto Compito
	 * Autore: Cerullo Mary
	 * Versione: 1.0
	 * 2020 Copyright by PsyMeet - University of Salerno
	 */

/**
 * Class Compito
 */

class Compito
{

	/** @var string */
	public static $tableName='compito';

	/** @var */
	private $id;

	/** @var */
	private $data;

	/** @var */
	private $titolo;

	/** @var */
	private $descrizione;

	/** @var */
	private $svolgimento;

	/** @var */
	private $correzione;

	/** @var */
	private $effettuato;

	/** @var */
	private $cfPaz;

	/** @var */
	private $cfProf;


	/**
	 * Compito constructor.
	 * @param $id
	 * @param $data
	 * @param $effettuato
	 * @param $titolo
	 * @param $descrizione
	 * @param $svolgimento
	 * @param $correzione
	 * @param $cfProf
	 * @param $cfPaz
	 */
	public function __construct(
		$id,
		$data,
		$effettuato,
		$titolo,
		$descrizione,
		$svolgimento,
		$correzione,
		$cfProf,
		$cfPaz
	) {
		$currDate = date('Y-m-d');

		if ($data == null || $titolo == null || $descrizione == null
			|| $cfProf == null || $cfPaz == null) {
			throw new Exception('Alcuni valori non validi!');
		} elseif (strlen($titolo) > 25) {
			throw new Exception('Il campo titolo non rispetta la lunghezza');
		} elseif (!preg_match('/[A-Za-z]$/', $titolo)) {
			throw new Exception('Il campo titolo non rispetta il formato');
		} elseif (!preg_match('/[A-Za-z0-9]$/', $descrizione)) {
			throw new Exception('Il campo descrizione non rispetta il formato');
		}

		/*else if(!preg_match('/[A-Za-z0-9]$/', $correzione)){
			throw new Exception("Il campo correzione non rispetta il formato");
		}

		else if(!preg_match('/[A-Za-z0-9]$/', $svolgimento)){
			throw new Exception("Il campo svolgimento non rispetta il formato");
		}*/

		$this->id= $id;
		$this->data = $data;
		$this->effettuato= $effettuato;
		$this->titolo = $titolo;
		$this->descrizione = $descrizione;
		$this->svolgimento = $svolgimento;
		$this->correzione = $correzione;
		$this->cfPaz= $cfPaz;
		$this->cfProf= $cfProf;
	}


	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}


	/**
	 * @return mixed
	 */
	public function getCfPaz()
	{
		return $this->cfPaz;
	}


	/**
	 * @return mixed
	 */
	public function getCfProf()
	{
		return $this->cfProf;
	}


	/**
	 * @return mixed
	 */
	public function getData()
	{
		return $this->data;
	}


	public function setData($data)
	{
		$currDate = date('Y-m-d');


		if ($data == null) {
			throw new Exception('Nuova Data non valida!');
		} elseif ($data != $currDate) {
			throw new Exception('La data inserita non è quella corrente');
		}
		$this->data = $data;
	}


	/**
	 * @return mixed
	 */
	public function getTitolo()
	{
		return $this->titolo;
	}


	public function setTitolo($titolo)
	{
		if ($titolo == null) {
			throw new Exception('Nuovo titolo non valido!');
		} elseif (strlen($titolo) > 25) {
			throw new Exception('La lunghezza del titolo supera i 25 caratteri');
		} elseif (!preg_match('/[A-Za-z]$/', $titolo)) {
			throw new Exception('Il campo titolo non rispetta il formato');
		}

		$this->titolo = $titolo;
	}


	/**
	 * @return mixed
	 */
	public function getDescrizione()
	{
		return $this->descrizione;
	}


	public function setDescrizione($descrizione)
	{
		if ($descrizione == null) {
			throw new Exception('Nuova descrizione non valida!');
		} elseif (!preg_match('/[A-Za-z0-9]$/', $descrizione)) {
			throw new Exception('Il campo descrizione non rispetta il formato');
		}

		$this->descrizione = $descrizione;
	}


	/**
	 * @return mixed
	 */
	public function getSvolgimento()
	{
		return $this->svolgimento;
	}


	public function setSvolgimento($svolgimento)
	{
		if ($svolgimento == null || strlen($svolgimento)==0) {
			throw new Exception('Nuovo svolgimento non valido!');
		} elseif (!preg_match('/[A-Za-z0-9]$/', $svolgimento)) {
			throw new Exception('Il campo svolgimento non rispetta il formato');
		}

		$this->svolgimento = $svolgimento;
	}


	/**
	 * @return mixed
	 */
	public function getCorrezione()
	{
		return $this->correzione;
	}


	public function setCorrezione($correzione)
	{
		if ($correzione == null) {
			throw new Exception('Nuova correzione non valida!');
		} elseif (!preg_match('/[A-Za-z0-9]$/', $correzione)) {
			throw new Exception('Il campo correzione non rispetta il formato');
		}

		$this->correzione = $correzione;
	}


	/**
	 * @return mixed
	 */
	public function getEffettuato()
	{
		return $this->effettuato;
	}


	public function setEffettuato($effettuato)
	{    /*
		if($effettuato == null){
			throw new Exception("Nuovo effettuato non valido!");
		} */
		$this->effettuato = $effettuato;
	}


	/**
	 * @return array
	 */
	public function getArray()
	{
		return ['id_compito'=>$this->id, 'data'=>$this->data, 'effettuato'=>$this->effettuato, 'titolo'=>$this->titolo, 'descrizione'=>$this->descrizione, 'svolgimento'=>$this->svolgimento, 'correzione'=>$this->correzione, 'cf_prof'=>$this->cfProf, 'cf'=>$this->cfPaz];
	}
}
