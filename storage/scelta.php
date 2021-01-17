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
    private $idScelta;
    private $cfProf;
    private $idPacchetto;
    public static $tableName="scelta";

    public function __construct($idChoice, $cfProfess, $idPack)
    {
        if($cfProfess == null || $idPack == null){
            throw new Exception("Alcuni valori non validi!");
        }
        else if(strlen($cfProfess)!=16){
            throw new Exception("Codice Fiscale Professionista non valido!");
        }
        else if($idPack<1){
            throw new Exception("Id pacchetto non valido!");
        }
        $this->idPacchetto = $idPack;
        $this->idScelta = $idChoice;
        $this->cfProf= $cfProfess;
    }
  
    public function getIdPacchetto()
    {
        return $this -> idPacchetto;
    }
    public function getIdScelta()
    {
        return $this -> idScelta;
    }
    public function geCfProf()
    {
        return $this -> cfProf;
    }

    public function getArray(){
        return array("id_scelta" => $this->idScelta, "cf_prof" => $this->cfProf, "id_pacchetto" => $this->idPacchetto);
    }
    public function setCfProf($cfProf)
    {
        if($cfProf == null || strlen($cfProf)!=16){
            throw new Exception("Nuovo codice fiscale professionista non valido!");
        }
         $this -> cfProf = $cfProf;
    }
}
