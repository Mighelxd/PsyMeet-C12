<?php


/*
	* Pacchetto
	* Questa classe fornisce tutti i metodi per l'entita Pacchetto
	* Autore: Giuseppe D'avino
	* Versione: 0.1
	* 2020 Copyright by PsyMeet - University of Salerno
*/
class Pacchetto
{
	public static $tableName='pacchetto';
	private $id_pacchetto;
	private $n_sedute;
	private $prezzo;
	private $tipologia;


	public function __construct($id_pack, $n_sed, $price, $type)
	{
		if ($n_sed == null || $price == null || $type == null) {
			throw new Exception('Alcuni valori non definiti!');
		} elseif ($n_sed != 1 && $n_sed!=6 && $n_sed!=10 && $n_sed!=20 && $n_sed!=0) {
			throw new Exception('Numero sedute errate!');
		} elseif ($price != 50 && $price != 60 && $price!= 320 && $price!=500 && $price!=800) {
			throw new Exception('Prezzo errato!');
		}
		$this->id_pacchetto = $id_pack;
		$this->n_sedute = $n_sed;
		$this->prezzo= $price;
		$this->tipologia = $type;
	}


	public function getIdPacchetto()
	{
		return $this->id_pacchetto;
	}


	public function getNSedute()
	{
		return $this->n_sedute;
	}


	public function getPrezzo()
	{
		return $this->prezzo;
	}


	public function getTipologia()
	{
		return $this->tipologia;
	}


	public function getArray()
	{
		return ['id_pacchetto' => $this->id_pacchetto, 'n_sedute' => $this->n_sedute, 'prezzo' => $this->prezzo, 'tipologia' => $this->tipologia];
	}


	public function setNSedute($n_sedute)
	{
		if ($n_sedute == null || ($n_sedute != 1 && $n_sedute!=6 && $n_sedute!=10 && $n_sedute!=20 && $n_sedute!=0)) {
			throw new Exception('Nuovo numero sedute errato!');
		}
		$this->n_sedute = $n_sedute;
	}


	public function setPrezzo($price)
	{
		if ($price==null || ($price != 50 && $price != 60 && $price!= 320 && $price!=500 && $price!=800)) {
			throw new Exception('Nuovo prezzo non valido!');
		}
		$this->prezzo = $price;
	}


	public function setTipologia($tipologia)
	{
		if ($tipologia == null) {
			throw new Exception('Nuovo campo tipologia non valido!');
		}
		$this->tipologia = $tipologia;
	}
}
