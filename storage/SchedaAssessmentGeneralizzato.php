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
    public static $tableName="SchedaAssessmentGeneralizzato";
    
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
        return array("id_scheda" => $this->id_scheda, "data" => $this->data, "au_pos" => $this->autoreg_positivi, "au_neg" => $this->autoreg_negativi, "co_pos" => $this->cognitive_positivi, "co_neg" => $this->cognitive_negativi, "se_pos" => $this->self_management_positivi,"se_neg" => $this->self_management_negativi, "so_pos" => $this->sociali_positivi, "so_neg" => $this->sociali_negativi,  "id_terapia" => $this->id_terapia, "tipo" =>$this->tipo);
    }
    public function setIdScheda($id_scheda)
    {
        return $this -> id_scheda= $id_scheda;
    }
    public function setData($data)
    {
        return $this -> data = $data;
    }
    public function setAutoregPositivi($autoreg_positivi)
    {
        return $this -> autoreg_positivi = $autoreg_positivi;
    }
    public function setAutoregNegativi($autoreg_negativi)
    {
        return $this -> autoreg_negativi = $autoreg_negativi;
    }
    public function setCognitivePositivi($cognitive_positivi)
    {
        return $this -> cognitive_positivi = $cognitive_positivi;
    }
    public function setCognitiveNegativi($cognitive_negativi)
    {
        return $this -> cognitive_negativi = $cognitive_negativi;
    }
    public function setSelfManagementNegativi($self_management_negativi)
    {
        return $this -> self_management_negativi = $self_management_negativi;
    }
    public function setSocialiPositivi($sociali_positivi)
    {
        return $this -> sociali_positivi = $sociali_positivi;
    }
    public function setSocialiNegativi($sociali_negativi)
    {
        return $this -> sociali_negativi = $sociali_negativi;
    }
    public function setSelfManagementPositivi($self_management_positivi)
    {
        return $this -> self_management_positivi = $self_management_positivi;
    }
    public function setIdTerapia($id_terapia)
    {
        return $this -> id_terapia = $id_terapia;
    }
    public function setTipo($tipo)
    {
        return $this -> tipo =$tipo;
    }
}

