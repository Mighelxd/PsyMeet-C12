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
    if($analisiFun == null){
      throw new Exception("Nuovo campo analisi funzionale non valido!");
    }
      $this->analisiFun = $analisiFun;
  }
  public function setMA($mA)
  {
    if($mA == null){
      throw new Exception("Nuovo campo A modello ABC non valido!");
    }
      $this->mA = $mA;
  }
  public function setMB($mB)
  {
    if($mB == null){
      throw new Exception("Nuovo campo B modello ABC non valido!");
    }
      $this->mB = $mB;
  }
  public function setMC($mC)
  {
    if($mC == null){
      throw new Exception("Nuovo campo C modello ABC non valido!");
    }
      $this->mC = $mC;
  }
  public function setAppunti($appunti)
  {
    if($appunti == null){
      throw new Exception("Nuovo campo appunti non valido!");
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
