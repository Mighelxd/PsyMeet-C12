<?php
declare(strict_types=1);
/*
 * Gestione compiti
 * Questa classe contiene le informazioni relative all'oggetto compito
 * Autore: Mary Cerullo
 * Versione: 0.1
 * 2020 Copyright by PsyMeet - University of Salerno
*/

/**
 * Class Compito
 */

class Compito
{
    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $data;
    /**
     * @var
     */
    private $titolo;
    /**
     * @var
     */
    private $descrizione;
    /**
     * @var
     */
    private $svolgimento;
    /**
     * @var
     */
    private $correzione;
    /**
     * @var
     */
    private $effettuato;
    /**
     * @var
     */
    private $cfPaz;
    /**
     * @var
     */
    private $cfProf;
    /**
     * @var string
     */
    public static $tableName='compito';


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
        date_default_timezone_set("Europe/Rome");
        $currDate = date("Y-m-d");
        if($data == null || $effettuato == null || $titolo == null || $descrizione == null
            || $cfProf == null || $cfPaz == null){
            throw new Exception("Alcuni valori non validi!");
        }
        else if($data<$currDate){
            throw new Exception("Data non valida!");
        }
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


    /**
     * @param $data
     */
    public function setData($data)
	{
        date_default_timezone_set("Europe/Rome");
        $currDate = date("Y-m-d");
	    if($data == null || $data<$currDate){
	        throw new Exception("Nuova Data non valida!");
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


    /**
     * @param $titolo
     */
    public function setTitolo($titolo)
	{
	    if($titolo == null){
	        throw new Exception("Nuovo titolo non valido!");
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


    /**
     * @param $descrizione
     */
    public function setDescrizione($descrizione)
	{
        if($descrizione == null){
            throw new Exception("Nuova descrizione non valida!");
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


    /**
     * @param $svolgimento
     */
    public function setSvolgimento($svolgimento)
	{
        if($svolgimento == null){
            throw new Exception("Nuovo svolgimento non valido!");
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


    /**
     * @param $correzione
     */
    public function setCorrezione($correzione)
	{
        if($correzione == null){
            throw new Exception("Nuova correzione non valida!");
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


    /**
     * @param $effettuato
     */
    public function setEffettuato($effettuato)
	{
        if($effettuato == null){
            throw new Exception("Nuovo effettuato non valido!");
        }
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
