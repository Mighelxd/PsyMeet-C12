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
    public static $tableName="terapia";

    public function __construct($id_ter, $date,$descriz, $cf_professionista, $cf_pa)
    {
        $this->id_terapia = $id_ter;
        $this->data = $date;
        $this->descrizione= $descriz;
        $this->cf_prof = $cf_professionista;
        $this->cf = $cf_pa;

    }
    public function __constructD(){
        $this->id_terapia = -1;
        $this->data ="" ;
        $this->descrizione = "";
        $this->cf_prof = "";
        $this->cf = "";
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
        return array("id_terapia" => $this->id_terapia, "data" => $this->data, "descrizione" => $this->descrizione, "cf_prof" => $this->cf_prof, "cf" => $this->cf);
    }
    public function setData($data)
    {
         $this -> data = $data;
    }
    public function setDescrizione($descrizione)
    {
         $this -> descrizione = $descrizione;
    }
    public function setCf_Prof($cf_prof)
    {
         $this -> cf_prof = $cf_prof;
    }
    public function setCf($cf)
    {
        $this -> cf = $cf;
    }
}
