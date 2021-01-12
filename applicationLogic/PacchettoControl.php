<?php




define("TABLE_NAME","pacchetto");





class PacchettoControl{

  static function selectAllPacchetto(){
    //Questa action cerca di recuperare tutti i pacchetti che vi sono nel DB

    $allPac = DatabaseInterface::selectAllQuery(Pacchetto::$tableName);
    while ($row=$allPac->fetch_array()) {
      $pac=new Pacchetto($row[0],$row[1],$row[2],$row[3]);
      $arr[]=$pac;
    }
    return $arr;
  }

  //metodo che recupera tutti i pacchetti per un dato Professionista


  static function selectAllPacchettoProf($cfProfessionista){
    $arrscelte= array('cf_prof' =>$cfProfessionista);
    $allScelte= DatabaseInterface::selectQueryByAtt($arrscelte,scelta::$tableName);
    while ($row =$allScelte->fetch_array()) {
        $pacscelta= new Scelta($row[0],$row[1],$row[2]);
        $arrs[]=$pacscelta;

    }
    //var_dump($arrs);
  return $arrs;
 }
 static function recuperaPacchetto($id){
   $arrecupero=array('id_pacchetto' =>$id);
   $paccrecupero=DatabaseInterface::selectQueryByAtt($arrecupero,Pacchetto::$tableName);
   while ($row=$paccrecupero->fetch_array()) {
     $pacrec= new Pacchetto($row[0],$row[1],$row[2],$row[3]);
   }

   return $pacrec;
 }
}
 ?>
