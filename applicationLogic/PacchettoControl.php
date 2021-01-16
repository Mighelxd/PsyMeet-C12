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

    static function selectAllPacchettoPaz($cfPaziente){
        $arrs = NULL;
        $arrscelte= array('cf' =>$cfPaziente);
        $allFatture= DatabaseInterface::selectQueryByAtt($arrscelte,"fattura");
        while ($row =$allFatture->fetch_array()) {
            $pacFattura = new Fattura($row[0],$row[1],$row[2], $row[3]);
            //$arrayFatture[] = $pacFattura;
            $arr = array("id_scelta" => $pacFattura->getIdScelta());
            $scelta = DatabaseInterface::selectQueryById($arr, "scelta");
            $sc = $scelta->fetch_array();
            $pacscelta= new Scelta($sc[0],$sc[1],$sc[2]);
            $arrayScelta = array("id_pacchetto"=> $pacscelta->getIdPacchetto());
            $selectPacchetto = DatabaseInterface::selectQueryById($arrayScelta,"pacchetto");
            $pac = $selectPacchetto->fetch_array();
            $pacchetto = new Pacchetto($pac[0],$pac[1],$pac[2],$pac[3]);
            $arrs[]=$pacchetto;
        }
        //var_dump($arrs);
        return $arrs;
    }
}
 ?>
