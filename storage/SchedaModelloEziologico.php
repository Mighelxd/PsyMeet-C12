<?php
/*
 * Gestione Sedute
 * Questa classe contiene le informazioni relative all'oggetto scheda modello eziologico
 * Autore: Francesco Capone
 * Versione: 0.1
 * 2020 Copyright by PsyMeet - University of Salerno
 */
class SchedaModelloEziologico
{
    private  $idScheda;
    private $data;
    private $fattoriCausativi;
    private $fattoriPrecipitanti;
    private $fattoriMantenimento;
    private $relazioneFinale;
    private $idTerapia;
    private $tipo;
    public static $tableName="schedamodelloeziologico";

    public function __construct($idScheda, $data, $fattoriCausativi, $fattoriPrecipitanti, $fattoriMantenimento,$relazioneFinale, $idTerapia, $tipo)
    {
        if($data == null || $fattoriCausativi == null || $fattoriPrecipitanti == null || $fattoriMantenimento == null
        || $relazioneFinale == null || $idTerapia == null || $tipo == null){
            throw new Exception("Alcuni valori non validi!");
        }
        else if($idTerapia<1){
            throw new Exception("Id terapia non valido!");
        }
        else if($tipo != "Scheda Modello Eziologico"){
            throw new Exception("Tipo scheda non compatibile!");
        }
        $this->idScheda = $idScheda;
        $this->data = $data;
        $this->fattoriCausativi= $fattoriCausativi;
        $this->fattoriPrecipitanti = $fattoriPrecipitanti;
        $this->fattoriMantenimento = $fattoriMantenimento;
        $this->relazioneFinale =$relazioneFinale;
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
    public function getFattoriCausativi()
    {
        return $this -> fattoriCausativi;
    }
    public function getFattoriPrecipitanti()
    {
        return $this -> fattoriPrecipitanti;
    }
    public function getFattoriMantenimento()
    {
        return $this -> fattoriMantenimento;
    }
    public function getRelazioneFinale()
    {
        return $this -> relazioneFinale;
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
        return array("id_scheda" => $this->idScheda, "data" => $this->data, "fattori_causativi" => $this->fattoriCausativi, "fattori_precipitanti" => $this->fattoriPrecipitanti, "fattori_mantenimento" => $this->fattoriMantenimento, "relazione_finale" => $this->relazioneFinale, "id_terapia" => $this->idTerapia,"tipo" =>$this->tipo);
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
    public function setFattoriCausativi($fattoriCausativi)
    {
        if($fattoriCausativi == null){
            throw new Exception("Nuovo campo fattori causativi non valido!");
        }
         $this -> fattoriCausativi = $fattoriCausativi;
    }
    public function setFattoriPrecipitanti($fattoriPrecipitanti)
    {
        if($fattoriPrecipitanti == null){
            throw new Exception("Nuovo campo fattori precipitanti non valido!");
        }
         $this -> fattoriPrecipitanti = $fattoriPrecipitanti;
    }
    public function setFattoriMantenimento($fattoriMantenimento)
    {
        if($fattoriMantenimento == null){
            throw new Exception("Nuovo campo fattori di mantenimento non valido!");
        }
         $this -> fattoriMantenimento = $fattoriMantenimento;
    }
    public function setRelazioneFinale($relazioneFinale)
    {
        if($relazioneFinale == null){
            throw new Exception("Nuovo campo relazione finale non valido!");
        }
         $this -> relazioneFinale = $relazioneFinale;
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
        if($tipo == null || $tipo != "Scheda Modello Eziologico"){
            throw new Exception("Nuovo tipo non valido!");
        }
         $this -> tipo =$tipo;
    }
}
