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
    private $idScheda;
    private $data;
    private $problema;
    private $aspettative;
    private $motivazione;
    private $obiettivi;
    private $cambiamento;
    private $idTerapia;
    private $tipo;
    public static $tableName="schedaprimocolloquio";

    public function __construct($idScheda, $data, $problema, $aspettative, $motivazione, $obiettivi, $cambiamento, $idTerapia,$tipo)
    {
        date_default_timezone_set("Europe/Rome");
        $currDate = date("Y-m-d");
        if($data == null || $problema == null || $aspettative == null || $motivazione == null || $obiettivi == null
        || $cambiamento == null || $idTerapia == null || $tipo ==null){
            throw new Exception("Alcuni valori non validi!");
        }
        else if($idTerapia<1){
            throw new Exception("Id terapia non valido!");
        }
        else if($tipo != "Scheda Primo Colloquio"){
            throw new Exception("Tipo scheda non compatibile!");
        }

        else if(strlen($problema)<2){
            throw new Exception("Lunghezza Definizione Problema minore di quella prevista" );
        }
        else if(strlen($problema)>500){
            throw new Exception("Lunghezza Definizione Problema maggiore di quella prevista" );
        }
        else if(!preg_match('/^[A-Za-z0-9_-]{2,500}$/', $problema)){
            throw new Exception("Definizione Problema non rispetta il formato previsto");
        }
        else if(strlen($aspettative)<2){
            throw new Exception("Lunghezza Aspettative minore di quella prevista" );
        }
        else if(!preg_match('/^[A-Za-z0-9_-]{2,500}$/', $motivazione)){
            throw new Exception("Motivazione non rispetta il formato previsto");
        }
        else if(strlen($obiettivi)>500){
            throw new Exception("Lunghezza Obiettivi maggiore di quella prevista" );
        }
        else if(strlen($obiettivi)<2){
            throw new Exception("Lunghezza Obiettivi minore di quella prevista" );
        }
        else if(strlen($cambiamento)<2){
            throw new Exception("Lunghezza Definizione Cambiamento minore di quella prevista" );
        }
        else if(!preg_match('/^[A-Za-z0-9_-]{2,500}$/', $cambiamento)){
            throw new Exception("Definizione Cambiamento non rispetta il formato previsto");
        }




        $this->idScheda = $idScheda;
        $this->data = $data;
        $this->problema = $problema;
        $this->aspettative = $aspettative;
        $this->motivazione = $motivazione;
        $this->obiettivi = $obiettivi;
        $this->cambiamento = $cambiamento;
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
        return $this -> idTerapia;
    }
    public function getTipo()
    {
        return $this -> tipo;
    }
    public function getArray(){
        return array("id_scheda" => $this->idScheda, "data" => $this->data, "problema" => $this->problema, "aspettative" => $this->aspettative, "motivazione" => $this->motivazione, "obiettivi" => $this->obiettivi,"cambiamento" => $this->cambiamento, "id_terapia" => $this->idTerapia,"tipo" =>$this->tipo);
    }
    public function setIdScheda($idScheda)
    {
         $this -> idScheda= $idScheda;
    }
    public function setData($data)
    {
        if($data == null){
            throw new Exception("Nuova data non disponibile");
        }
         $this -> data = $data;
    }
    public function setProblema($problema)
    {
        if($problema == null){
            throw new Exception("Nuovo campo problema non valido!");
        }
         $this -> problema= $problema;
    }
    public function setAspettative($aspettative)
    {
        if($aspettative == null){
            throw new Exception("Nuovo campo aspettative non valido!");
        }
         $this -> aspettative = $aspettative;
    }
    public function setMotivazione($motivazione)
    {
        if($motivazione == null){
            throw new Exception("Nuovo campo motivazione non valido!");
        }
         $this -> motivazione= $motivazione;
    }
    public function setObiettivi($obiettivi)
    {
        if($obiettivi == null){
            throw new Exception("Nuovo campo obiettivi non valido!");
        }
         $this -> obiettivi = $obiettivi;
    }
    public function setCambiamento($cambiamento)
    {
        if($cambiamento == null){
            throw new Exception("Nuovo campo cambiamento non valido!");
        }
         $this -> cambiamento= $cambiamento;
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
        if($tipo == null || $tipo != "Scheda Primo Colloquio"){
            throw new Exception("Nuovo campo tipo non compatibile!");
        }
         $this -> tipo =$tipo;
    }
}
