<?php
class professionistaControl{
  static function recuperaProfessionisti(){
    $allProf = DatabaseInterface::selectAllQuery('professionista');

    while($row = $allProf->fetch_array()){
      $prof = new professionista($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10],$row[11],$row[12],$row[13],$row[14],$row[15],$row[16],$row[17],$row[18]);
      $arrProf[] = $prof;
    }
    return $arrProf;
  }
}



 ?>
