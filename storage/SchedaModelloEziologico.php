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
    private  $id_scheda;
    private $data;
    private $fattori_causativi;
    private $fattori_precipitanti;
    private $fattori_mantenimento;
    private $relazione_finale;
    private $id_terapia;
    private $tipo;
    private static $tableName="schedaModelloEziologico";
    
    public function __construct($id_scheda, $data, $fattori_causativi, $fattori_precipitanti, $fattori_mantenimento,$relazione_finale, $id_terapia, $tipo)
    {
        $this->id_scheda = $id_scheda;
        $this->data = $data;
        $this->fattori_causativi= $fattori_causativi;
        $this->fattori_precipitanti = $fattori_precipitanti;
        $this->fattori_mantenimento = $fattori_mantenimento;
        $this->relazione_finale =$relazione_finale;
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
    public function getFattoriCausativi()
    {
        return $this -> fattori_causativi;
    }
    public function getFattoriPrecipitanti()
    {
        return $this -> fattori_precipitanti;
    }
    public function getFattoriMantenimento()
    {
        return $this -> fattori_mantenimento;
    }
    public function getRelazioneFinale()
    {
        return $this -> relazione_finale;
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
        return array("id_scheda" => $this->id_scheda, "data" => $this->data, "fa_cau" => $this->fattori_causativi, "fa_pre" => $this->fattori_precipitanti, "fa_man" => $this->fattori_mantenimento, "rel_fin" => $this->relazione_finale, "id_terapia" => $this->id_terapia,"tipo" =>$this->tipo);
    }
    public function setIdScheda($id_scheda)
    {
         $this -> id_scheda= $id_scheda;
    }
    public function setData($data)
    {
         $this -> data = $data;
    }
    public function setFattoriCausativi($fattori_causativi)
    {
         $this -> fattori_causativi = $fattori_causativi;
    }
    public function setFattoriPrecipitanti($fattori_precipitanti)
    {
         $this -> fattori_precipitanti = $fattori_precipitanti;
    }
    public function setFattoriMantenimento($fattori_mantenimento)
    {
         $this -> fattori_mantenimento = $fattori_mantenimento;
    }
    public function setRelazioneFinale($relazione_finale)
    {
         $this -> relazione_finale = $relazione_finale;
    }
    public function setIdTerapia($id_terapia)
    {
         $this -> id_terapia = $id_terapia;
    }
    public function setTipo($tipo)
    {
         $this -> tipo =$tipo;
    }
}

