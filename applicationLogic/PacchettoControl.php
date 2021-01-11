<?php

define("TABLE_NAME","pacchetto");


class PacchettoControl{

  static function selectAllPacchetto(){
    //Questa action cerca di recuperare tutti i pacchetti che vi sono nel DB
    $id = 1;
    $arrKey = array("id_pacchetto"=>$id);
    $allPac = DatabaseInterface::selectQueryByAtt($arrKey,TABLE_NAME);
    while ($row=$allPac->fetch_array()) {
      $pac=new Pacchetto($row[0],$row[1],$row[2],$row[3]);
      $arr[]=$pac;
    }
    return $arr;
  }

  //metodo che recupera tutti i pacchetti per un dato Professionista bisogna
  // avere un reference verso la relazione Pacchetto del DB magari tramite il Cf del
  //professionista cosi da poter associare ad ogni professionista i pacchetti che sono
  //registrati nel DB
  // oppure aggiungere una vista

  static function selectAllPacchettoProf($cfProfessionista){
    $arrpac= array("")
  }
}
 ?>
