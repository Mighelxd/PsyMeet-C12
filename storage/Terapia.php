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
    private $idTerapia;
    private $data;
    private $descrizione;
    private $cfProf;
    private $cf;
    public static $tableName="terapia";

    public function __construct($idTer, $date,$descriz, $cfProfessionista, $cfPa)
    {
        date_default_timezone_set("Europe/Rome");
        $currDate = date("Y-m-d");
        if($date == null || $descriz == null || $cfProfessionista == null || $cfPa == null){
            throw new Exception("Alcuni valori non validi!");
        }
        else if($date > $currDate){
            throw new Exception("Data non disponibile!");
        }
        else if(strlen($cfProfessionista)!=16){
            throw new Exception("Codice fiscale professionista non valido!");
        }
        else if(strlen($cfPa)!=16){
            throw new Exception("Codice fiscale paziente non valido!");
        }
        $this->idTerapia = $idTer;
        $this->data = $date;
        $this->descrizione= $descriz;
        $this->cfProf = $cfProfessionista;
        $this->cf = $cfPa;

    }
   /* public function __constructD(){
        $this->id_terapia = -1;
        $this->data ="" ;
        $this->descrizione = "";
        $this->cf_prof = "";
        $this->cf = "";
     }*/
    public function getIdTerapia()
    {
        return $this -> idTerapia;
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
        return $this -> cfProf;
    }
    public function getCf()
    {
        return $this -> cf;
    }
    public function getArray(){
        return array("id_terapia" => $this->idTerapia, "data" => $this->data, "descrizione" => $this->descrizione, "cf_prof" => $this->cfProf, "cf" => $this->cf);
    }
    public function setData($data)
    {
        date_default_timezone_set("Europe/Rome");
        $currDate = date("Y-m-d");
        if($data == null || $data > $currDate){
            throw new Exception("Nuova data non valida!");
        }
         $this -> data = $data;
    }
    public function setDescrizione($descrizione)
    {
        if($descrizione == null){
            throw new Exception("Nuovo campo descrizione non valido!");
        }
         $this -> descrizione = $descrizione;
    }
    public function setCf_Prof($cfProf)
    {
        if($cfProf == null || strlen($cfProf)!=16){
            throw new Exception("Nuovo codice fiscale professionista non valido!");
        }
         $this -> cf_prof = $cfProf;
    }
    public function setCf($cf)
    {
        if($cf == null || strlen($cf)!=16){
            throw new Exception("Nuovo codice fiscale paziente non valido!");
        }
        $this -> cf = $cf;
    }
}
