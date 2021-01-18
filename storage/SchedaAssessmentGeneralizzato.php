<?php
/*
 * Gestione Sedute
 * Questa classe contiene le informazioni relative all'oggetto scheda assessment generalizzato
 * Autore: Simone D'Ambrosio
 * Versione: 0.1
 * 2020 Copyright by PsyMeet - University of Salerno
 */
class SchedaAssessmentGeneralizzato
{
    private $idScheda;
    private $data;
    private $autoregPositivi;
    private $autoregNegativi;
    private $cognitivePositivi;
    private $cognitiveNegativi;
    private $self_managementNegativi;
    private $socialiPositivi;
    private $socialiNegativi;
    private $self_managementPositivi;
    private $idTerapia;
    private $tipo;
    public static $tableName="schedaassessmentgeneralizzato";

    public function __construct($idScheda, $data, $autoregPositivi, $autoregNegativi, $cognitivePositivi, $cognitiveNegativi, $selfManagementPositivi, $selfManagementNegativi, $socialiPositivi, $socialiNegativi, $idTerapia, $tipo)
    {
        date_default_timezone_set("Europe/Rome");
        $currDate = date("Y-m-d");
        if($data == null || $autoregNegativi == null || $autoregPositivi == null || $cognitivePositivi == null
        || $cognitiveNegativi == null || $selfManagementNegativi == null || $selfManagementPositivi == null
        || $socialiNegativi == null || $socialiPositivi == null || $idTerapia == null || $tipo == null){
            throw new Exception("Alcuni valori non validi!");
        }
        else if($data > $currDate){
            throw new Exception("Data non isponibile!");
        }
        else if($idTerapia<1){
            throw new Exception("Id terapia non valida!");
        }
        else if($tipo != "Scheda Assessment Generalizzato"){
            throw new Exception("Tipo scheda non compatibile!");
        }
        $this->idScheda = $idScheda;
        $this->data = $data;
        $this->autoregPositivi= $autoregPositivi;
        $this->autoregNegativi = $autoregNegativi;
        $this->cognitivePositivi = $cognitivePositivi;
        $this->cognitiveNegativi =$cognitiveNegativi;
        $this->selfManagementNegativi =$selfManagementNegativi;
        $this->socialiPositivi =$socialiPositivi;
        $this->socialiNegativi =$socialiNegativi;
        $this->selfManagementPositivi =$selfManagementPositivi;
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
    public function getAutoregPositivi()
    {
        return $this -> autoregPositivi;
    }
    public function getAutoregNegativi()
    {
        return $this -> autoregNegativi;
    }
    public function getCognitivePositivi()
    {
        return $this -> cognitivePositivi;
    }
    public function getCognitiveNegativi()
    {
        return $this -> cognitiveNegativi;
    }
    public function getSelfManagementNegativi()
    {
        return $this -> selfManagementNegativi;
    }
    public function getSocialiPositivi()
    {
        return $this -> socialiPositivi;
    }
    public function getSocialiNegativi()
    {
        return $this -> socialiNegativi;
    }
    public function getSelfManagementPositivi()
    {
        return $this -> selfManagementPositivi;
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
        return array("id_scheda" => $this->idScheda, "data" => $this->data, "autoreg_positivi" => $this->autoregPositivi, "autoreg_negativi" => $this->autoregNegativi, "cognitive_positivi" => $this->cognitivePositivi, "cognitive_negativi" => $this->cognitiveNegativi, "self_management_positivi" => $this->selfManagementPositivi,"self_management_negativi" => $this->selfManagementNegativi, "sociali_positivi" => $this->socialiPositivi, "sociali_negativi" => $this->socialiNegativi, "id_terapia" => $this->idTerapia, "tipo" =>$this->tipo);
    }
    public function setIdScheda($idScheda)
    {
         $this -> idScheda= $idScheda;
    }
    public function setData($data)
    {
        date_default_timezone_set("Europe/Rome");
        $currDate = date("Y-m-d");
        if($data==null || $data>$currDate){
            throw new Exception("Nuova data non disponibile!");
        }
         $this -> data = $data;
    }
    public function setAutoregPositivi($autoregPositivi)
    {
        if($autoregPositivi == null){
            throw new Exception("Nuovo campo autoregolazioni positive non valido!");
        }
         $this -> autoregPositivi = $autoregPositivi;
    }
    public function setAutoregNegativi($autoregNegativi)
    {
        if($autoregNegativi == null){
            throw new Exception("Nuovo campo autoregolazioni negative non valido!");
        }
         $this -> autoregNegativi = $autoregNegativi;
    }
    public function setCognitivePositivi($cognitivePositivi)
    {
        if($cognitivePositivi == null){
            throw new Exception("Nuovo campo cognitive positive non valido!");
        }
         $this -> cognitivePositivi = $cognitivePositivi;
    }
    public function setCognitiveNegativi($cognitiveNegativi)
    {
        if($cognitiveNegativi == null){
            throw new Exception("Nuovo campo cognitive negative non valido!");
        }
         $this -> cognitiveNegativi = $cognitiveNegativi;
    }
    public function setSelfManagementNegativi($selfManagementNegativi)
    {
        if($selfManagementNegativi == null){
            throw new Exception("Nuovo campo self management negativo non valido!");
        }
        $this -> self_managementNegativi = $selfManagementNegativi;
    }
    public function setSocialiPositivi($socialiPositivi)
    {
        if($socialiPositivi == null){
            throw new Exception("Nuovo campo sociali positivi non valido!");
        }
         $this -> socialiPositivi = $socialiPositivi;
    }
    public function setSocialiNegativi($socialiNegativi)
    {
        if($socialiNegativi == null){
            throw new Exception("Nuovo campo sociali negativo non valido!");
        }
         $this -> socialiNegativi = $socialiNegativi;
    }
    public function setSelfManagementPositivi($selfManagementPositivi)
    {
        if($selfManagementPositivi == null){
            throw new Exception("Nuovo campo self management positivo non valido!");
        }
         $this -> selfManagementPositivi = $selfManagementPositivi;
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
        if($tipo == null || $tipo!="Scheda Assessment Generalizzato"){
            throw new Exception("Nuovo tipo scheda non compatibile!");
        }
         $this -> tipo =$tipo;
    }
}
