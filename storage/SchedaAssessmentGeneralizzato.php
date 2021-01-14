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
    private $id_scheda;
    private $data;
    private $autoreg_positivi;
    private $autoreg_negativi;
    private $cognitive_positivi;
    private $cognitive_negativi;
    private $self_management_negativi;
    private $sociali_positivi;
    private $sociali_negativi;
    private $self_management_positivi;
    private $id_terapia;
    private $tipo;
    public static $tableName="schedaassessmentgeneralizzato";

    public function __construct($id_scheda, $data, $autoreg_positivi, $autoreg_negativi, $cognitive_positivi, $cognitive_negativi, $self_management_positivi, $self_management_negativi, $sociali_positivi, $sociali_negativi, $id_terapia, $tipo)
    {
        $this->id_scheda = $id_scheda;
        $this->data = $data;
        $this->autoreg_positivi= $autoreg_positivi;
        $this->autoreg_negativi = $autoreg_negativi;
        $this->cognitive_positivi = $cognitive_positivi;
        $this->cognitive_negativi =$cognitive_negativi;
        $this->self_management_negativi =$self_management_negativi;
        $this->sociali_positivi =$sociali_positivi;
        $this->sociali_negativi =$sociali_negativi;
        $this->self_management_positivi =$self_management_positivi;
        $this->id_terapia = $id_terapia;
        $this->tipo = $tipo;
    }
    public function getIdScheda()
    {
        return $this -> id_scheda;
    }
    public function getData()
    {
        return $this -> data;
    }
    public function getAutoregPositivi()
    {
        return $this -> autoreg_positivi;
    }
    public function getAutoregNegativi()
    {
        return $this -> autoreg_negativi;
    }
    public function getCognitivePositivi()
    {
        return $this -> cognitive_positivi;
    }
    public function getCognitiveNegativi()
    {
        return $this -> cognitive_negativi;
    }
    public function getSelfManagementNegativi()
    {
        return $this -> self_management_negativi;
    }
    public function getSocialiPositivi()
    {
        return $this -> sociali_positivi;
    }
    public function getSocialiNegativi()
    {
        return $this -> sociali_negativi;
    }
    public function getSelfManagementPositivi()
    {
        return $this -> self_management_positivi;
    }
    public function getIdTerapia()
    {
        return $this -> id_terapia;
    }
    public function getTipo()
    {
        return $this -> tipo;
    }
    public function getArray(){
        return array("id_scheda" => $this->id_scheda, "data" => $this->data, "autoreg_positivi" => $this->autoreg_positivi, "autoreg_negativi" => $this->autoreg_negativi, "cognitive_positivi" => $this->cognitive_positivi, "cognitive_negativi" => $this->cognitive_negativi, "self_management_positivi" => $this->self_management_positivi,"self_management_negativi" => $this->self_management_negativi, "sociali_positivi" => $this->sociali_positivi, "sociali_negativi" => $this->sociali_negativi, "id_terapia" => $this->id_terapia, "tipo" =>$this->tipo);
    }
    public function setIdScheda($id_scheda)
    {
         $this -> id_scheda= $id_scheda;
    }
    public function setData($data)
    {
         $this -> data = $data;
    }
    public function setAutoregPositivi($autoreg_positivi)
    {
         $this -> autoreg_positivi = $autoreg_positivi;
    }
    public function setAutoregNegativi($autoreg_negativi)
    {
         $this -> autoreg_negativi = $autoreg_negativi;
    }
    public function setCognitivePositivi($cognitive_positivi)
    {
         $this -> cognitive_positivi = $cognitive_positivi;
    }
    public function setCognitiveNegativi($cognitive_negativi)
    {
         $this -> cognitive_negativi = $cognitive_negativi;
    }
    public function setSelfManagementNegativi($self_management_negativi)
    {
        $this -> self_management_negativi = $self_management_negativi;
    }
    public function setSocialiPositivi($sociali_positivi)
    {
         $this -> sociali_positivi = $sociali_positivi;
    }
    public function setSocialiNegativi($sociali_negativi)
    {
         $this -> sociali_negativi = $sociali_negativi;
    }
    public function setSelfManagementPositivi($self_management_positivi)
    {
         $this -> self_management_positivi = $self_management_positivi;
    }
    public function setIdTerapia($id_terapia)
    {
         $this -> id_terapia = $id_terapia;
    }
    public function setTipo($tipo)
    {
         $this -> tipo =$tipo;
    }
}
