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
    private $idScheda;
    private $data;
    private $ricadute;
    private $esitiPositivi;
    private $idTerapia;
    private $tipo;
    public static $tableName="schedafollowup";

    public function __construct($idScheda, $data,$ricadute, $esitiPositivi, $idTerapia,$tipo)
    {
        if($data == null || $idTerapia == null || $tipo == null){
            throw new Exception("Alcuni valori non definiti!");
        }
        else if($idTerapia<1){
            throw new Exception("Id terapia non valida!");
        }
        else if($tipo != "Scheda Follow Up"){
            throw new Exception("Tipo scheda non compatibile!");
        }

        else if(strlen($ricadute)==0 || $ricadute == NULL){
            throw new Exception("Il campo Ricadute è vuoto.");
        }

        else if(!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $ricadute)){
            throw new Exception("Il campo Ricadute non rispetta il formato");
        }
        else if(strlen($esitiPositivi)==0 || $esitiPositivi == NULL){
            throw new Exception("Il campo Esiti positivi è vuoto");
        }

        else if(!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $esitiPositivi)){
            throw new Exception("Il campo Esiti positivi non rispetta il formato");
        }


        $this->idScheda = $idScheda;
        $this->data = $data;
        $this->ricadute= $ricadute;
        $this->esitiPositivi = $esitiPositivi;
        $this->idTerapia = $idTerapia;
        $this->tipo = $tipo;
    }
    public function getIdScheda()
    {
        return $this -> idScheda;
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
        return $this -> esitiPositivi;
    }
    public function getIdTerapia()
    {
        return $this -> idTerapia;
    }
    public function getTipo()
    {
        return $this -> tipo;
    }
    public function getArray(){
        return array("id_scheda" => $this->idScheda, "data" => $this->data, "ricadute" => $this->ricadute, "esiti_positivi" => $this->esitiPositivi, "id_terapia" => $this->idTerapia,"tipo" => $this->tipo);
    }
    public function setIdScheda($idScheda)
    {
         $this -> idScheda= $idScheda;
    }
    public function setData($data)
    {
        date_default_timezone_set("Europe/Rome");
        $currDate = date("Y-m-d");
        if($data == null){
            throw new Exception("Nuova data non disponibile!");
        }
         $this -> data = $data;
    }
    public function setRicadute($ricadute)
    {
        if($ricadute == null)
        {
            throw new Exception("Il campo Ricadute è vuoto");
        }
        else if(strlen($ricadute)==0)
        {
            throw new Exception("Il campo Ricadute è vuoto");
        }

        else if(!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $ricadute))
        {
            throw new Exception("Il campo Ricadute non rispetta il formato");
        }
         $this -> ricadute = $ricadute;
    }
    public function setEsitiPositivi($esitiPositivi)
    {
        if($esitiPositivi == null)
        {
            throw new Exception("Il campo Esiti positivi è vuoto");
        }
        else if(strlen($esitiPositivi)==0)
        {
            throw new Exception("Il campo Esiti positivi è vuoto");
        }

        else if(!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $esitiPositivi))
        {
            throw new Exception("Il campo Esiti positivi non rispetta il formato");
        }
         $this -> esitiPositivi = $esitiPositivi;
    }
    public function setIdTerapia($idTerapia)
    {
        if($idTerapia == null || $idTerapia<1){
            throw new Exception("Nuovo id terapia non valido!");
        }
         $this -> idTerapia = $idTerapia;
    }
    public function setTipo($tipo)
    {
        if($tipo == null || $tipo!="Scheda Follow Up"){
            throw new Exception("Nuovo tipo non compatibile!");
        }
         $this -> tipo =$tipo;
    }
}
