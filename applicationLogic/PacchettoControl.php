<?php
include('../../storage/Pacchetto.php');
define("TABLE_NAME","pacchetto");


class PacchettoControl{

  static function selectAllPacchetto(){
    //Questa action cerca di recuperare tutti i pacchetti
    $id = 1;
    $arrKey = array("id_pacchetto"=>$id);
    $allPac = DatabaseInterface::selectQueryByAtt($arrKey,TABLE_NAME);
    while ($row=$allPac->fetch_array()) {
      $pac=new Pacchetto($row[0],$row[1],$row[2],$row[3]);
      $arr[]=$pac;
    }
    return $arr;
  }
}
 ?>
