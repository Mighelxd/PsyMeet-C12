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


	public function __construct($id, $data, $titolo, $descrizione, $svolgimento, $correzione, $effettuato, $cfPaz, $cfProf)
	{
		$this->id= $id;
		$this->data = $data;
		$this->titolo = $titolo;
		$this->descrizione = $descrizione;
		$this->svolgimento = $svolgimento;
		$this->correzione = $correzione;
		$this->effettuato= $effettuato;
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
	
	
	public function getSvoglimento()
	{
		return $this->svolgimento;
	}
	
	
	public function setSvoglimento($svolgimento)
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
		return ['id_compito'->$id, 'data'->$data, 'effettuato'->$effettuato, 'titolo'->$titolo, 'descrizione'->$descrizione, 'svolgimento'->$svolgimento, 'correzione'->$correzione, 'cf_prof'->$cfProf, 'cf'->$cfPaz];
	}
}
