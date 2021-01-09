<?php
/*
 * Gestione Pacchetto
 * Questa classe contiene le informazioni relative all'oggetto Pacchetto
 * Autore: Martino D'Auria
 * Versione: 0.1
 * 2020 Copyright by PsyMeet - University of Salerno
 */
class Pacchetto
{
    private $id_pacchetto;
    private $n_sedute;
    private $prezzo;
    private $tipologia;
    public static $nome_tabella="pacchetto";
    
    public function __construct($id_pack, $n_sed,$price, $type)
    {
        $this->id_pacchetto = $id_pack;
        $this->n_sedute = $n_sed;
        $this->prezzo= $price;
        $this->tipologia = $type;
        
        
    }
  
    public function getIdPacchetto()
    {
        return $this -> id_pacchetto;
    }
    public function geNSedute()
    {
        return $this -> n_sedute;
    }
    public function getPrezzo()
    {
        return $this -> prezzo;
    }
    public function getTipologia()
    {
        return $this -> tipologia;
    }
    public function getArray(){
        return array("id_pacchetto" => $this->id_pacchetto, "n_sedute" => $this->n_sedute, "prezzo" => $this->prezzo, "tipologia" => $this->tipologia);
    }
    public function setNSedute($n_sedute)
    {
        return $this -> n_sedute = $n_sedute;
    }
    public function setPrezzo($prezzo)
    {
        return $this -> prezzo = $prezzo;
    }
    public function setTipologia($tipologia)
    {
        return $this -> tipologia = $tipologia;
    }
}
