<?php
class SeduteControl{
  static function recuperaScheda($tipo){
    if($tipo == 'SchedaAssessmentFocalizzato'){
      $cfProf = 'RSSMRC80R12H703U';
      $arrAtt = array("id_scheda"=>'1',"id_scheda"=>'2');
      $scheda = array();
      $episodi = array();
      $schedaConEpisodi = array();

      $datiScheda = DatabaseInterface::selectQueryByAtt($arrAtt,SchedaAssessmentFocalizzato::$tableName);
      while($row = $datiScheda->fetch_array()){
        $sc = new SchedaAssessmentFocalizzato($row[0], $row[1], $row[2], $row[3], $row[4]);
        $scheda[] = $sc;
        $attEp = array("id_scheda"=>$sc->getIdScheda());
        $datiEpisodi = DatabaseInterface::selectQueryByAtt($attEp,Episodio::$tableName);
        while($rowEp = $datiEpisodi->fetch_array()){
          $ep = new episodio($rowEp[0], $rowEp[1], $rowEp[2], $rowEp[3], $rowEp[4], $rowEp[5], $rowEp[6], $rowEp[7]);
          $episodi[] = $ep;
        }
      }
      $schedaConEpisodi[] = $scheda;
      $schedaConEpisodi[] = $episodi;
      return $schedaConEpisodi;
    }
  }
}

 ?>
