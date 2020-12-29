<?php
/*
* Gestione Sedute
* Questa classe contiene le informazioni relative all'oggetto scheda primo colloquio
 * Autore: Francesco Capone
 * Versione: 0.1
 * 2020 Copyright by PsyMeet - University of Salerno
 */
class SchedaPrimoColloquio
{
    private $id_scheda;
    private $data;
    private $problema;
    private $aspettative;
    private $motivazione;
    private $obiettivi;
    private $cambiamento;
    private $id_terapia;
    private static $table_name="schedaPrimoColloquio";
    
    public function __construct($id_scheda, $data, $problema, $aspettative, $motivazione, $obiettivi, $cambiamento, $id_terapia)
    {
        $this->id_scheda = $id_scheda;
        $this->data = $data; 
        $this->problema = $problema;
        $this->aspettative = $aspettative; 
        $this->motivazione = $motivazione;
        $this->obiettivi = $obiettivi; 
        $this->cambiamento = $cambiamento;
        $this->id_terapia = $id_terapia;
        return this;
    }
    public function getIdScheda()
    {
        return $this -> id_scheda;
    }
    public function getData()
    {
        return $this -> data;
    }
    public function getProblema()
    {
        return $this -> problema;
    }
    public function getAspettative()
    {
        return $this -> aspettative;
    }
    public function getMotivazione()
    {
        return $this -> motivazione;
    }
    public function getObiettivi()
    {
        return $this -> obiettivi;
    }
    public function getCambiamento()
    {
        return $this -> cambiamento;
    }
    public function getIdTerapia()
    {
        return $this -> id_terapia;
    }
    public function getArray(){
        return array("id_scheda" => $this->id_scheda, "data" => $this->data, "pro" => $this->problema, "aspe" => $this->aspettative, "moti" => $this->motivazione, "obiet" => $this->obiettivi,"camb" => $this->cambiamento, "id_terapia" => $this->id_terapia);
    }
    public function setIdScheda($id_scheda)
    {
        return $this -> id_scheda= $id_scheda;
    }
    public function setData($data)
    {
        return $this -> data = $data;
    }
    public function setProblema($problema)
    {
        return $this -> problema= $problema;
    }
    public function setAspettative($aspettative)
    {
        return $this -> aspettative = $aspettative;
    }
    public function setMotivazione($motivazione)
    {
        return $this -> motivazione= $motivazione;
    }
    public function setObiettivi($obiettivi)
    {
        return $this -> obiettivi = $obiettivi;
    }
    public function setCambiamento($cambiamento)
    {
        return $this -> cambiamento= $cambiamento;
    }
    public function setIdTerapia($id_terapia)
    {
        return $this -> id_terapia = $id_terapia;
    }
}

