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

        else if(strlen($problema)==0){
            throw new Exception("Il campo problema è vuoto");
        }
        else if(!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $problema)){
            throw new Exception("Il campo problema non rispetta il formato");
        }
        else if(strlen($aspettative)==0){
            throw new Exception("Il campo aspettative è vuoto" );
        }
        else if(!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $aspettative)){
            throw new Exception("Il campo aspettative non rispetta il formato");
        }
        else if(strlen($motivazione)==0){
            throw new Exception("Il campo motivazione è vuoto" );
        }
        else if(!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $motivazione)){
            throw new Exception("Il campo motivazione non rispetta il formato");
        }
        else if(strlen($obiettivi)==0){
            throw new Exception("Il campo obiettivi è vuoto");
        }
        else if(!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $obiettivi)){
            throw new Exception("Il campo obiettivi non rispetta il formato");
        }
        else if(strlen($cambiamento)==0){
            throw new Exception("Il campo cambiamento è vuoto");
        }
        else if(!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $cambiamento)){
            throw new Exception("Il campo cambiamento non rispetta il formato");
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
        else if(strlen($problema)==0){
            throw new Exception("Il campo problema è vuoto");
        }
        else if(!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $problema)){
            throw new Exception("Il campo problema non rispetta il formato");
        }
         $this -> problema= $problema;
    }
    public function setAspettative($aspettative)
    {
        if($aspettative == null){
            throw new Exception("Nuovo campo aspettative non valido!");
        }
        else if(strlen($aspettative)==0){
            throw new Exception("Il campo aspettative è vuoto" );
        }
        else if(!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $aspettative)){
            throw new Exception("Il campo aspettative non rispetta il formato");
        }
         $this -> aspettative = $aspettative;
    }
    public function setMotivazione($motivazione)
    {
        if($motivazione == null){
            throw new Exception("Nuovo campo motivazione non valido!");
        }
        else if(strlen($motivazione)==0){
            throw new Exception("Il campo motivazione è vuoto" );
        }
        else if(!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $motivazione)){
            throw new Exception("Il campo motivazione non rispetta il formato");
        }
         $this -> motivazione= $motivazione;
    }
    public function setObiettivi($obiettivi)
    {
        if($obiettivi == null){
            throw new Exception("Nuovo campo obiettivi non valido!");
        }
        else if(strlen($obiettivi)==0){
            throw new Exception("Il campo obiettivi è vuoto");
        }
        else if(!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $obiettivi)){
            throw new Exception("Il campo obiettivi non rispetta il formato");
        }
         $this -> obiettivi = $obiettivi;
    }
    public function setCambiamento($cambiamento)
    {
        if($cambiamento == null){
            throw new Exception("Nuovo campo cambiamento non valido!");
        }
        else if(strlen($cambiamento)==0){
            throw new Exception("Il campo cambiamento è vuoto");
        }
        else if(!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $cambiamento)){
            throw new Exception("Il campo cambiamento non rispetta il formato");
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
