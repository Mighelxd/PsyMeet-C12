<?php
/*
 * Gestione Sedute
 * Questa classe contiene le informazioni relative all'oggetto scheda assessment focalizzato
 * Autore: Simone D'Ambrosio
 * Versione: 0.1
 * 2020 Copyright by PsyMeet - University of Salerno
 */
class SchedaAssessmentFocalizzato
{
    private $idScheda;
    private $data;
    private $nEpisodi;
    private $idTerapia;
    private $tipo;
    public static $tableName="schedaassessmentfocalizzato";

    public function __construct($idScheda, $data, $nEpisodi, $idTerapia, $tipo)
    {
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
    public function getArray(){
        return array("id_scheda" => $this->idScheda, "data" => $this->data, "n_episodi" => $this->nEpisodi, "id_terapia" => $this->idTerapia, "tipo" =>$this->tipo);
    }
    public function setIdScheda($idScheda)
    {
        $this->idScheda= $idScheda;
    }
    public function setData($data)
    {
        $this->data = $data;
    }
    public function setNEpisodi($nEpisodi)
    {
        $this->nEpisodi = $nEpisodi;
    }
    public function setIdTerapia($idTerapia)
    {
        $this->idTerapia = $idTerapia;
    }
    public function setTipo($tipo)
    {
        $this->tipo =$tipo;
    }
}
