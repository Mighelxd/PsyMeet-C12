<?php
class Episodio{
  private $idEpisodio;
  private $numero;
  private $analisiFun;
  private $mA;
  private $mB;
  private $mC;
  private $appunti;
  private $idScheda;
  public static $tableName="episodio";

  public function __construct($idEpisodio, $numero, $analisiFun, $mA, $mB,$mC, $appunti, $idScheda){
    if($numero == null || $analisiFun == null || $mA == null || $mB == null || $mC == null || $appunti == null || $idScheda == null){
      throw new Exception("Alcuni valori non definiti!");
    }
    else if($numero<=0){
      throw new Exception("Numero episodio non valido!");
    }
    else if($idScheda <=0){
      throw new Exception("Id scheda non valido!");
    }

    else if(strlen($analisiFun)==0){
      throw new Exception("Il campo analisi funzionale è vuoto");
    }

    else if (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $analisiFun)){
      throw new Exception("Il campo analisi funzionale non rispetta il formato");
    }

    else if (strlen($mA)==0){
      throw new Exception("Il campo A è vuoto");
    }

    else if (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $mA)){
      throw new Exception("Il campo A non rispetta il formato");
    }

    else if (strlen($mB)==0){
      throw new Exception("Il campo B è vuoto");
    }

    else if (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $mB)){
      throw new Exception("Il campo B non rispetta il formato");
    }

    else if (strlen($mC)==0){
      throw new Exception("Il campo C è vuoto");
    }

    else if (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $mC)){
      throw new Exception("Il campo C non rispetta il formato");
    }

    else if (strlen($appunti)==0){
      throw new Exception("Il campo appunti terapeuta è vuoto");
    }

    else if (!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $appunti)){
      throw new Exception("Il campo appunti terapeuta non rispetta il formato");
    }

    $this->idEpisodio = $idEpisodio;
    $this->numero = $numero;
    $this->analisiFun= $analisiFun;
    $this->mA = $mA;
    $this->mB = $mB;
    $this->mC =$mC;
    $this->appunti =$appunti;
    $this->idScheda = $idScheda;
  }

  public function getId(){
    return $this->idEpisodio;
  }
  public function getNum(){
    return $this->numero;
  }
  public function getAnalisiFun()
  {
      return $this->analisiFun;
  }
  public function getMA()
  {
      return $this->mA;
  }
  public function getMB()
  {
      return $this->mB;
  } public function getMC()
  {
      return $this->mC;
  }
  public function getAppunti()
  {
      return $this->appunti;
  }
  public function getIdScheda(){
    return $this->idScheda;
  }
  public function setNum($newNum){
    if($newNum==null || $newNum<=0){
      throw new Exception("Nuovo numero episodio non valido!");
    }
    $this->numero = $newNum;
  }
  public function setAnalisiFun($analisiFun)
  {
    if($analisiFun == null)
    {
      throw new Exception("Nuovo campo analisi funzionale non definito!");
    }
    else if(strlen($analisiFun)==0)
    {
      throw new Exception("Il campo analisi funzionale è vuoto");
    }
    else if(!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $analisiFun))
    {
      throw new Exception("Il campo analisi funzionale non rispetta il formato");
    }
      $this->analisiFun = $analisiFun;
  }
  public function setMA($mA)
  {
    if($mA == null)
    {
      throw new Exception("Nuovo campo A modello ABC non definito!");
    }
    else if(strlen($mA)==0)
    {
      throw new Exception("Il campo A è vuoto");
    }
    else if(!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $mA))
    {
      throw new Exception("Il campo A non rispetta il formato");
    }
      $this->mA = $mA;
  }
  public function setMB($mB)
  {
    if($mB == null)
    {
      throw new Exception("Nuovo campo B modello ABC non definito!");
    }
    else if(strlen($mB)==0)
    {
      throw new Exception("Il campo B è vuoto");
    }
    else if(!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $mB))
    {
      throw new Exception("Il campo B non rispetta il formato");
    }
      $this->mB = $mB;
  }
  public function setMC($mC)
  {
    if($mC == null)
    {
      throw new Exception("Nuovo campo C modello ABC non definito!");
    }
    else if(strlen($mC)==0)
    {
      throw new Exception("Il campo C è vuoto");
    }
    else if(!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $mC))
    {
      throw new Exception("Il campo C non rispetta il formato");
    }
      $this->mC = $mC;
  }
  public function setAppunti($appunti)
  {
    if($appunti == null)
    {
      throw new Exception("Nuovo campo appunti non definito!");
    }
    else if(strlen($appunti)==0)
    {
      throw new Exception("Il campo appunti terapeuta è vuoto");
    }
    else if(!preg_match('/^[A-Za-z0-9\s.,èòàù]+$/', $appunti))
    {
      throw new Exception("Il campo appunti terapeuta non rispetta il formato");
    }
      $this->appunti = $appunti;
  }
  public function setIdScheda($newIdSc){
    if($newIdSc == null || $newIdSc<=0){
      throw new Exception("Nuovo id scheda non valido!");
    }
    $this->idScheda = $newIdSc;
  }
  public function getArray(){
    return array("id_episodio"=>$this->idEpisodio, "numero"=>$this->numero, "analisi_fun"=>$this->analisiFun, "m_a"=>$this->mA, "m_b"=>$this->mB, "m_c"=>$this->mC, "appunti"=>$this->appunti, "id_scheda"=>$this->idScheda);
  }
}

 ?>
