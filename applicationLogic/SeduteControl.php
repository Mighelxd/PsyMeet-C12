<?php
session_start();

class SeduteControl{
  static function recuperaScheda($tipo){
    if($tipo == 'SchedaAssessmentFocalizzato'){
      $cfProf = 'RSSMRC80R12H703U';
      $arrAtt = array("cf_prof"=>$cfProf);

      $datiScheda = DatabaseInterface::selectQueryByAtt($arrAtt,SchedaAssessmentFocalizzato::$table_name);
      while($row = $datiScheda->fetch_array()){
        $scheda[] = $row;
      }
      return $scheda;
    }
  }
}

 ?>
