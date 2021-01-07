<?php
/*
 * Gestione Sedute
 * Questa classe contiene le informazioni relative all'oggetto scheda follow up
 * Autore: Francesco Capone
 * Versione: 0.1
 * 2020 Copyright by PsyMeet - University of Salerno
 */
class SchedaFollowUp
{
    private $id_scheda;
    private $data;
    private $ricadute;
    private $esiti_positivi;
    private $id_terapia;
    private $tipo;
    
    public function __construct($id_scheda, $data,$ricadute, $esiti_positivi, $id_terapia,$tipo)
    {
        $this->id_scheda = $id_scheda;
        $this->data = $data;
        $this->ricadute= $ricadute;
        $this->esiti_positivi = $esiti_positivi;
        $this->id_terapia = $id_terapia;
        $this->tipo = $tipo;
    }
    public function getIdScheda()
    {
        return $this -> id_scheda;
    }
    public function getData()
    {
        return $this -> data;
    }
    public function getRicadute()
    {
        return $this -> ricadute;
    }
    public function getEsitiPositivi()
    {
        return $this -> esiti_positivi;
    }
    public function getIdTerapia()
    {
        return $this -> id_terapia;
    }
    public function getTipo()
    {
        return $this -> tipo;
    }
    public function getArray(){
        return array("id_scheda" => $this->id_scheda, "data" => $this->data, "ric" => $this->ricadute, "esi_pos" => $this->esiti_positivi, "id_terapia" => $this->id_terapia,"tipo" => $this->tipo);
    }
    public function setIdScheda($id_scheda)
    {
        return $this -> id_scheda= $id_scheda;
    }
    public function setData($data)
    {
        return $this -> data = $data;
    }
    public function setRicadute($ricadute)
    {
        return $this -> ricadute = $ricadute;
    }
    public function setEsitiPositivi($esiti_positivi)
    {
        return $this -> esiti_positivi = $esiti_positivi;
    }
    public function setIdTerapia($id_terapia)
    {
        return $this -> id_terapia = $id_terapia;
    }
    public function setTipo($tipo)
    {
        return $this -> tipo =$tipo;
    }
}

