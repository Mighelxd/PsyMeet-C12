<?php



/*
 * Gestione Sedute
 * Questa classe contiene le informazioni relative all'oggetto scheda assessment focalizzato
 * Autore: Simone D'Ambrosio
 * Versione: 1.0
 * 2020 Copyright by PsyMeet - University of Salerno
 */
class SchedaAssessmentFocalizzato
{
	public static $tableName='schedaassessmentfocalizzato';
	private $idScheda;
	private $data;
	private $nEpisodi;
	private $idTerapia;
	private $tipo;


	public function __construct($idScheda, $data, $nEpisodi, $idTerapia, $tipo)
	{
		date_default_timezone_set('Europe/Rome');
		$currDate = date('Y-m-d');
		if ($data == null || $nEpisodi == null || $idTerapia == null || $tipo == null) {
			throw new Exception('Alcuni valori non validi!');
		} elseif ($nEpisodi<0) {
			throw new Exception('Numero episodi non valido!');
		} elseif ($idTerapia<1) {
			throw new Exception('Id terapia non valida!');
		} elseif ($tipo!='Scheda Assessment Focalizzato') {
			throw new Exception('Tipo non compatibile!');
		}
		$this->idScheda = $idScheda;
		$this->data = $data;
		$this->nEpisodi =$nEpisodi;
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


	public function getNEpisodi()
	{
		return $this->nEpisodi;
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
		return ['id_scheda' => $this->idScheda, 'data' => $this->data, 'n_episodi' => $this->nEpisodi, 'id_terapia' => $this->idTerapia, 'tipo' =>$this->tipo];
	}


	public function setIdScheda($idScheda)
	{
		$this->idScheda= $idScheda;
	}


	public function setData($data)
	{
		if ($data == null) {
			throw new Exception('Nuova data non valida!');
		}
		$this->data = $data;
	}


	public function setNEpisodi($nEpisodi)
	{
		if ($nEpisodi<0) {
			echo '<br>sto qui è minore';
			throw new Exception('Nuovo numero episodi non valido!');
		}
		$this->nEpisodi = $nEpisodi;
	}


	public function setIdTerapia($idTerapia)
	{
		if ($idTerapia == null ||$idTerapia<1) {
			throw new Exception('Nuovo id terapia non valido!');
		}
		$this->idTerapia = $idTerapia;
	}


	public function setTipo($tipo)
	{
		if ($tipo == null || $tipo != 'Scheda Assessment Focalizzato') {
			throw new Exception('Nuovo tipo non compatibile!');
		}
		$this->tipo =$tipo;
	}
}
