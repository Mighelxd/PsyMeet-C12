<?php
/*
 * Gestione Terapia
 * Questa classe contiene le informazioni relative all'oggetto terapia
 * Autore: Martino D'Auria
 * Versione: 0.1
 * 2020 Copyright by PsyMeet - University of Salerno
 */
class Terapia
{
    private $id_terapia;
    private $data;
    private $descrizione;
    private $cf_prof;
    private $cf;
    private static $nome_tabella="terapia";
    
    public function __construct($id_terapia, $data,$descrizione, $cf_prof, $cf)
    {
        $this->id_terapia = $id_terapia;
        $this->data = $data;
        $this->descrizione= $descrizione;
        $this->cf_prof = $cf_prof;
        $this->cf = $cf;
        
    }
    public function getIdTerapia()
    {
        return $this -> id_terapia;
    }
    public function getData()
    {
        return $this -> data;
    }
    public function getDescrizione()
    {
        return $this -> descrizione;
    }
    public function getCfProf()
    {
        return $this -> cf_prof;
    }
    public function getCf()
    {
        return $this -> cf;
    }
    public function getArray(){
        return array("id_terapia" => $this->id_terapia, "data" => $this->data, "descr" => $this->descrizione, "cf_prof" => $this->cf_prof, "cf" => $this->cf);
    }
    public function setData($data)
    {
        return $this -> data = $data;
    }
    public function setDescrizione($descrizione)
    {
        return $this -> descrizione = $descrizione;
    }
    public function setCf_Prof($cf_prof)
    {
        return $this -> cf_prof = $cf_prof;
    }
    public function setCf($cf)
    {
        return $this -> cf = $cf;
    }
}
