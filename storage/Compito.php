<?php
declare(strict_types=1);
/*
 * Gestione compiti
 * Questa classe contiene le informazioni relative all'oggetto compito
 * Autore: Mary Cerullo
 * Versione: 0.1
 * 2020 Copyright by PsyMeet - University of Salerno
*/

class Compito
{
	public static $nome_tabella='compito';
	private $id;
	private $data;
	private $titolo;
	private $descrizione;
	private $svolgimento;
	private $correzione;
	private $effettuato;
	private $cfPaz;
	private $cfProf;


	public function __construct($id, $data, $effettuato, $titolo, $descrizione, $svolgimento, $correzione, $cfProf, $cfPaz)
	{
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


	public function getId()
	{
		return $this->id;
	}


	public function getCfPaz()
	{
		return $this->cfPaz;
	}


	public function getCfProf()
	{
		return $this->cfProf;
	}


	public function getData()
	{
		return $this->data;
	}


	public function setData($data)
	{
		$this->data = $data;
	}


	public function getTitolo()
	{
		return $this->titolo;
	}


	public function setTitolo($titolo)
	{
		$this->titolo = $titolo;
	}


	public function getDescrizione()
	{
		return $this->descrizione;
	}


	public function setDescrizione($descrizione)
	{
		$this->descrizione = $descrizione;
	}


	public function getSvolgimento()
	{
		return $this->svolgimento;
	}


	public function setSvolgimento($svolgimento)
	{
		$this->svolgimento = $svolgimento;
	}


	public function getCorrezione()
	{
		return $this->correzione;
	}


	public function setCorrezione($correzione)
	{
		$this->correzione = $correzione;
	}


	public function getEffettuato()
	{
		return $this->effettuato;
	}


	public function setEffettuato($effettuato)
	{
		$this->effettuato = $effettuato;
	}


	public function getArray()
	{
		return array("id_compito"=>$this->id, "data"=>$this->data, "effettuato"=>$this->effettuato, "titolo"=>$this->titolo, "descrizione"=>$this->descrizione, "svolgimento"=>$this->svolgimento, "correzione"=>$this->correzione, "cf_prof"=>$this->cfProf, "cf"=>$this->cfPaz);
	}
}
