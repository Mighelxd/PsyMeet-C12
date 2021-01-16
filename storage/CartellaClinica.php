<?php 
   /*
     * CartellaClinica
     * Questa classe contiene le informazioni relative all'oggetto cartella clinica
     * Autore: D'Avino Michele
     * Versione: 0.1
     * 2020 Copyright by PsyMeet - University of Salerno
     */
class CartellaClinica {
    private $id;
    private $farmaci;
    private $qualitaUmore;
    private $patologiePregresse;
    private $qualitaRelazioni;
    private $cfPaz;
    private $cfProf;
    private $dataCreazione;
    public static $tableName="cartellaclinica";

    public function setFarmaci($fa){
        if($fa == null){
            throw new Exception("Nuovo campo farmaci non valido!");
        }
        $this->farmaci = $fa;
    }

    public function setQualitaUmore($qum){
        if($qum<1 || $qum>5 || $qum == null){
            throw new Exception("Nuovo valore qualit. umore non valido!");
        }
        $this->QualitaUmore = $qum;
    } 

    public function setPatologiePregresse($pat){
        if($pat == null){
            throw new Exception("Nuovo campo patologie pregresse non valido!");
        }
        $this->patologiePregresse = $pat;
    }

    public function setQualitaRelazioni($qur){
        if($qur<1 || $qur>5 || $qur == null){
            throw new Exception("Nuovo valore qualit. relazioni non valido!");
        }
        $this->qualitaRelazioni = $qur;
    }

    public function setCfProf($cfPro){
        if($cfPro==null || strlen($cfPro)!=16){
            throw new Exception('Nuovo CF Professionista in cartella clinica non valido!');
        }
        $this->cfProf = $cfPro;
    }

    public function setCfPaz($cfPa){
        if($cfPa==null || strlen($cfPa)!=16){
            throw new Exception('Nuovo CF Paziente in cartella clinica non valido!');
        }
        $this->cfPaz = $cfPa;
    }
    public function setData($d){
        date_default_timezone_set("Europe/Rome");
        $currDate = date("Y-m-d");
        if($d == null || $d < $currDate){
            throw new Exception("Nuova data non valida!");
        }
        $this->dataCreazione = $d;
    }

    public function getData(){
        return $this->dataCreazione;
    }


    public function getId(){
        return $this->id;
    }

    public function getFarmaci(){
        return $this->farmaci;
    }

    public function getCfProf(){
        return $this->cfProf;
    }
    
    public function getCfPaz(){
        return $this->cfPaz;
    }

    public function getQualitaUmore(){
        return $this->qualitaUmore;
    }

    public function getPatologiePregresse(){
        return $this->patologiePregresse;
    }

    public function getQualitaRealazioni(){
        return $this->qualitaRelazioni;
    }
     public function __constructD(){
        $this->id = -1;
        $this->farmaci = "";
        $this->qualitaUmore = "";
        $this->patologiePregresse = "";
        $this->qualitaRelazioni = "";
        $this->cfPaz = "";
        $this->cfProf = "";
     }

    public function __construct($i, $d, $qum, $qur, $pat, $fa, $cfPro, $cfPa){
        date_default_timezone_set("Europe/Rome");
        $currDate = date("Y-m-d");
        if($d == null || $qum == null || $qur == null || $pat == null || $fa == null || $cfPro == null || $cfPa == null){
            throw new Exception("Alcuni valori non definiti!");
        }
        else if($qum<1 || $qum>5){
            throw new Exception("Valore qualit. umore non corretto!");
        }
        else if($qur<1 || $qur>5){
            throw new Exception("Valore qualit. relazione non corretto!");
        }
        else if($d < $currDate){
            throw new Exception("Data non disponibile!");
        }
        else if(strlen($cfPro)!=16){
            throw new Exception("Codice fiscale professionista non valido!");
        }
        else if(strlen($cfPa)!=16){
            throw new Exception("Codice fiscale paziente non valido!");
        }
        $this->id = $i;
        $this->dataCreazione=$d;
        $this->farmaci = $fa;
        $this->qualitaUmore = $qum;
        $this->patologiePregresse = $pat;
        $this->qualitaRelazioni =  $qur;
        $this->cfPaz = $cfPa;
        $this->cfProf = $cfPro;
    }

    public function getArray(){
         return array("id_cartella_clinica" => $this->id,"data_creazione"=>$this->dataCreazione, "farmaci" => $this->farmaci, "q_umore" => $this->qualitaUmore, "q_relazioni" => $this->qualitaRelazioni, "patologie_pregresse" => $this->patologiePregresse, "cf_prof" => $this->cfProf, "cf" => $this->cfPaz);
     }
     public function getArraySenzaId(){
        return array("data_creazione"=>$this->dataCreazione, "farmaci" => $this->farmaci, "q_umore" => $this->qualitaUmore, "q_relazioni" => $this->qualitaRelazioni, "patologie_pregresse" => $this->patologiePregresse, "cf_prof" => $this->cfProf, "cf" => $this->cfPaz);
    }
}
?>