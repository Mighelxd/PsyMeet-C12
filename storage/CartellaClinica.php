<?php 
class CartellaClinica {
    private $id;
    private $farmaci;
    private $qualitaUmore;
    private $patologiePregresse;
    private $qualitaRelazioni;
    private $cfPaz;
    private $cfProf;
    public static $table_name="cartellaclinica";

    public function setFarmaci($fa){
        $this->farmaci = $fa;
    }

    public function setQualitaUmore($qum){
        $this->QualitaUmore = $qum;
    } 

    public function setPatologiePregresse($pat){
        $this->patologiePregresse = $pat;
    }

    public function setQualitaRelazioni($qur){
        $this->qualitaRelazioni = $qur;
    }

    public function setCfProf($cfPro){
        $this->cfProf = $cfPro;
    }

    public function setCfPaz($cfPa){
        $this->cfPaz = $cfPa;
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

    public function __construct($i, $qum, $qur, $pat, $fa, $cfPro, $cfPa){
        $this->id = $i;
        $this->farmaci = $fa;
        $this->qualitaUmore = $qum;
        $this->patologiePregresse = $pat;
        $this->qualitaRelazioni =  $qur;
        $this->cfPaz = $cfPa;
        $this->cfProf = $cfPro;
        return $this;
    }

    public function getArray(){
         return array("id_cartella_clinica" => $this->id, "farmaci" => $this->farmaci, "q_umore" => $this->qualitaUmore, "q_relazioni" => $this->qualitaRelazioni, "patologie_pregresse" => $this->patologiePregresse, "cf_prof" => $this->cfProf, "cf" => $this->cfPaz);
     }
}
?>