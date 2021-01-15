<?php

/**
 * Class Pacchetto
 */
class Pacchetto
{
    /**
     * @var
     */
    private $id_pacchetto;
    /**
     * @var
     */
    private $n_sedute;
    /**
     * @var
     */
    private $prezzo;
    /**
     * @var
     */
    private $tipologia;
    /**
     * @var string
     */
    public static $tableName="pacchetto";

    /**
     * Pacchetto constructor.
     * @param $id_pack
     * @param $n_sed
     * @param $price
     * @param $type
     */
    public function __construct($id_pack, $n_sed, $price, $type)
    {
        $this->id_pacchetto = $id_pack;
        $this->n_sedute = $n_sed;
        $this->prezzo= $price;
        $this->tipologia = $type;


    }

    /**
     * @property-read string $id_pacchetto
     * @method string getIdPacchetto()
     * @return mixed
     */
    public function getIdPacchetto()
    {
        return $this -> id_pacchetto;
    }

    /**
     * @return mixed
     */
    public function geNSedute()
    {
        return $this -> n_sedute;
    }

    /**
     * @return mixed
     */
    public function getPrezzo()
    {
        return $this -> prezzo;
    }

    /**
     * @return mixed
     */
    public function getTipologia()
    {
        return $this -> tipologia;
    }

    /**
     * @return array
     */
    public function getArray(){
        return array("id_pacchetto" => $this->id_pacchetto, "n_sedute" => $this->n_sedute, "prezzo" => $this->prezzo, "tipologia" => $this->tipologia);
    }

    /**
     * @param $n_sedute
     */
    public function setNSedute($n_sedute)
    {
         $this -> n_sedute = $n_sedute;
    }

    /**
     * @param $prezzo
     */
    public function setPrezzo($prezzo)
    {
         $this -> prezzo = $prezzo;
    }

    /**
     * @param $tipologia
     */
    public function setTipologia($tipologia)
    {
         $this -> tipologia = $tipologia;
    }
}
?>
