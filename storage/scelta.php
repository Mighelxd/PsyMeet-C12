<?php
/*
 * Gestione Scelta
 * Questa classe contiene le informazioni relative all'oggetto scelta
 * Autore: Martino D'Auria
 * Versione: 0.1
 * 2020 Copyright by PsyMeet - University of Salerno
 */
class Scelta
{
    private $id_scelta;
    private $cf_prof;
    private $id_pacchetto;
    public static $tableName="scelta";

    public function __construct($id_choice, $cf_profess, $id_pack)
    {
        $this->id_pacchetto = $id_pack;
        $this->id_scelta = $id_choice;
        $this->cf_prof= $cf_profess;
    }
  
    public function getIdPacchetto()
    {
        return $this -> id_pacchetto;
    }
    public function getIdScelta()
    {
        return $this -> id_scelta;
    }
    public function geCfProf()
    {
        return $this -> cf_prof;
    }

    public function getArray(){
        return array("id_scelta" => $this->id_scelta, "cf_prof" => $this->cf_prof, "id_pacchetto" => $this->id_pacchetto);
    }
    public function setCfProf($cf_prof)
    {
         $this -> cf_prof = $cf_prof;
    }
}
