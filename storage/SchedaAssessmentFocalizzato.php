<?php
/*
 * Gestione Sedute
 * Questa classe contiene le informazioni relative all'oggetto scheda assessment focalizzato
 * Autore: Simone D'Ambrosio
 * Versione: 0.1
 * 2020 Copyright by PsyMeet - University of Salerno
 */
class SchedaAssessmentFocalizzato
{
    private $id_scheda;
    private $data;
    private $analisi_fun;
    private $m_a;
    private $m_b;
    private $m_c;
    private $appunti;
    private $n_episodi;
    private $id_terapia;
    private $tipo;
    private static $table_name="SchedaAssessmentFocalizzato";
    
    public function __construct($id_scheda, $data, $analisi_fun, $m_a, $m_b,$m_c, $appunti, $n_episodi, $id_terapia, $tipo)
    {
        $this->id_scheda = $id_scheda;
        $this->data = $data;
        $this->analisi_fun= $analisi_fun;
        $this->m_a = $m_a;
        $this->m_b = $m_b;
        $this->m_c =$m_c;
        $this->appunti =$appunti;
        $this->n_episodi =$n_episodi;
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
    public function getAnalisiFun()
    {
        return $this -> analisi_fun;
    }
    public function getMA()
    {
        return $this -> m_a;
    }
    public function getMB()
    {
        return $this -> m_b;
    } public function getMC()
    {
        return $this -> m_c;
    }
    public function getAppunti()
    {
        return $this -> appunti;
    }
    public function getNEpisodi()
    {
        return $this -> n_episodi;
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
        return array("id_scheda" => $this->id_scheda, "data" => $this->data, "an_fun" => $this->analisi_fun, "m_a" => $this->m_a, "m_b" => $this->m_b, "m_c" => $this->m_c, "appunti" => $this->appunti, "n_ep" => $this->n_episodi, "id_terapia" => $this->id_terapia, "tipo" =>$this->tipo);
    }
    public function setIdScheda($id_scheda)
    {
        return $this -> id_scheda= $id_scheda;
    }
    public function setData($data)
    {
        return $this -> data = $data;
    }
    public function setAnalisiFun($analisi_fun)
    {
        return $this -> analisi_fun = $analisi_fun;
    }
    public function setMA($m_a)
    {
        return $this -> m_a = $m_a;
    }
    public function setMB($m_b)
    {
        return $this -> m_b = $m_b;
    }
    public function setMC($m_c)
    {
        return $this -> m_c = $m_c;
    }
    public function setAppunti($appunti)
    {
        return $this -> appunti = $appunti;
    }
    public function setNEpisodi($n_episodi)
    {
        return $this -> n_episodi = $n_episodi;
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

