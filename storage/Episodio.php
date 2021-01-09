<?php
class episodio{
  private $idEpisodio;
  private $numero;
  private $analisiFun;
  private $mA;
  private $mB;
  private $mC;
  private $appunti;
  private $idScheda;
  private static $tableName="episodio";

  public function __construct($idEpisodio, $numero, $analisiFun, $mA, $mB,$mC, $appunti, $idScheda){
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
  public function setId($newId){
    $this->idEpisodio = $newId;
  }
  public function setNum($newNum){
    $this->numero = $newNum;
  }
  public function setAnalisiFun($analisiFun)
  {
      $this->analisiFun = $analisiFun;
  }
  public function setMA($mA)
  {
      $this->mA = $mA;
  }
  public function setMB($mB)
  {
      $this->mB = $mB;
  }
  public function setMC($mC)
  {
      $this->mC = $mC;
  }
  public function setAppunti($appunti)
  {
      $this->appunti = $appunti;
  }
  public function setIdScheda($newIdSc){
    $this->idScheda = $newIdSc;
  }
  public function getArray(){
    return array("id_episodio"=>$this->idEpisodio, "numero"=>$this->numero, "analisi_fun"=>$this->analisiFun, "m_a"=>$this->mA, "m_b"=>$this->mB, "m_c"=>$this->mC, "appunti"=>$this->appunti, "id_scheda"=>$this->idScheda);
  }
}

 ?>
