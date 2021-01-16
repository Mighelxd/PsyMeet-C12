<?php
class professionistaControl{
  static function recuperaProfessionisti(){
    $allProf = DatabaseInterface::selectAllQuery('professionista');

    while($row = $allProf->fetch_array()){
      $prof = new professionista($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10],$row[11],$row[12],$row[13],$row[14],$row[15],$row[16],$row[17]);
      $arrProf[] = $prof;
    }
    return $arrProf;
  }

  public static function getProf($cfProf){
    $arr = array("cf_prof" => $cfProf,);
    $result = DatabaseInterface::selectQueryById($arr,"professionista");
    $arr = $result -> fetch_array();
    $prof = new Professionista($arr[0],$arr[1],$arr[2],$arr[3],$arr[4],$arr[5],$arr[6],$arr[7],$arr[8],$arr[9],$arr[10],$arr[11],$arr[12],$arr[13],$arr[14],$arr[15],$arr[16],$arr[17]);

    return $prof;
  }

  public static function getProfessionistByPaz($cfPaziente){
    $professionisti = NULL;

    $arr = array("cf" => $cfPaziente);
    $result = DatabaseInterface::selectQueryByAtt($arr,"terapia");

    while ($row = $result->fetch_array()){
      $terapie = new Terapia($row[0],$row[1],$row[2],$row[3],$row[4]);
      $prof = self::getProf($terapie->getCfProf());
      $professionisti[] = $prof;
    }

    return $professionisti;
  }
}



 ?>
