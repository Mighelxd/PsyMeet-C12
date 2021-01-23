<?php
define("TABLE_NAME","pacchetto");

class PacchettoControl{

  static function selectAllPacchetto(){
    //Questa action cerca di recuperare tutti i pacchetti che vi sono nel DB
      try{
          $allPac = DatabaseInterface::selectAllQuery(Pacchetto::$tableName);
          $arr = null;
          while ($row=$allPac->fetch_array()) {
              $pac=new Pacchetto($row[0],$row[1],$row[2],$row[3]);
              $arr[]=$pac;
          }
          return $arr;
      }catch(Exception $e){
          $_SESSION['eccpac']=$e->getMessage();
          return null;
      }
  }

  //metodo che recupera tutti i pacchetti per un dato Professionista


  static function selectAllPacchettoProf($cfProfessionista){
      try{
          $arrscelte= array('cf_prof' =>$cfProfessionista);
          $arrs=null;
          $allScelte= DatabaseInterface::selectQueryByAtt($arrscelte,scelta::$tableName);
          while ($row =$allScelte->fetch_array()) {
              $pacscelta= new Scelta($row[0],$row[1],$row[2]);
              $arrs[]=$pacscelta;
          }
          //var_dump($arrs);
          return $arrs;
      }catch(Exception $e){
          $_SESSION['eccpac']=$e->getMessage();
          return null;
      }
 }
 static function recuperaPacchetto($id){
      try{
          $arrecupero=array('id_pacchetto' =>$id);
          $pacrec=null;
          $paccrecupero=DatabaseInterface::selectQueryByAtt($arrecupero,Pacchetto::$tableName);
          while ($row=$paccrecupero->fetch_array()) {
              $pacrec= new Pacchetto($row[0],$row[1],$row[2],$row[3]);
          }

          return $pacrec;
      }catch(Exception $e){
          $_SESSION['eccpac']=$e->getMessage();
          return null;
      }
 }

    static function selectAllPacchettoPaz($cfPaziente){
      try{
          $arrs = NULL;
          $arrscelte= array('cf' =>$cfPaziente);
          $allFatture= DatabaseInterface::selectQueryByAtt($arrscelte,"fattura");
          while ($row =$allFatture->fetch_array()) {
              $pacFattura = new Fattura($row[0],$row[1],$row[2], $row[3],$row[4]);
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
      }catch(Exception $e){
          $_SESSION['eccpac']=$e->getMessage();
          return null;
      }
    }
    static function getFatture($cfPaziente){
      try{
          $fatture = null;
          $att= array('cf' =>$cfPaziente);
          $allFatture= DatabaseInterface::selectQueryByAtt($att,"fattura");
          while($row = $allFatture->fetch_array()){
              $fatture[] = new Fattura($row[0],$row[1],$row[2],$row[3],$row[4]);
          }
          return $fatture;
      }catch(Exception $e){
          echo "sono in eccezione ".$e->getMessage();
          $_SESSION['eccezione']=$e->getMessage();
          return null;
      }
    }

    static function getFatturaByPazProf($cfPaz,$cfProf){
        $fattAtt=Null;
        $fatts = NULL;
        $fatts=PacchettoControl::getFatture($cfPaz);
        $scelte=PacchettoControl::selectAllPacchettoProf($cfProf);
        if ($fatts!= NULL) {
            foreach ($fatts as $fatt) {
                foreach ($scelte as $pacchetto) {
                    if ($fatt->getIdScelta() == $pacchetto->getIdPacchetto() && $fatt->getNSeduteRim() > 0)
                        $fattAtt = $fatt;
                }
            }
        }
        return $fattAtt;
    }


    static function getSceltaById($idScelta){
      $scheda = NULL;
      $arr = array("id_scelta" => $idScelta);
      $result = DatabaseInterface::selectQueryById($arr, "scelta");
      $row = $result->fetch_array();
      $scheda = new Scelta($row[0],$row[1],$row[2]);
      return $scheda;
    }

    static function addPacchetto($pacchetto){
        try {
            $id =0;
            $att=array('tipologia'=>$pacchetto);
            $coll=array('*');
            $recuperapacc =DatabaseInterface::selectDinamicQuery($coll,$att,Pacchetto::$tableName);
            $row = $recuperapacc->fetch_array();
            $id=$row[0];

            $arrycheck=array('id_pacchetto'=>$id);
            $check = DatabaseInterface::selectDinamicQuery($coll,$arrycheck,scelta::$tableName);
            if($check->num_rows>0){
               throw new Exception('Pacchetto gia esistente, seleziona un pacchetto che non appartiene al Professionista corrente');
            }else {
                $_SESSION['Errore']='';
                $arryid = new Scelta(null,$_SESSION['codiceFiscale'],$id);
                $ok=DatabaseInterface::insertQuery($arryid->getArray(),scelta::$tableName);
                if(!$ok){
                    throw new Exception("Errore: Pacchetto non inserito!");
                }
                else{
                    return true;
                }
            }
        }catch (Exception $e){
            return $e->getMessage();
        }
    }

    static function delPacchetto($idProf, $pacchetto){
        try {
            $key = new Scelta(null,$idProf,$pacchetto);
            $arrPac = $key->getArray();
            $arrPac = array_diff($arrPac,[""]);
            $del=DatabaseInterface::deleteQuery($arrPac,scelta::$tableName);

            if(!$del){
                throw new Exception("Errore: pacchetto non eliminato!");
            }else{
                return true;
            }
        }catch (Exception $e){
            return $e->getMessage();
        }
    }


    static function buyPacchetto($data,  $cfPaz, $idScelta){
      try{

          $arr = array("id_scelta" =>$idScelta,);
          $rowScelta = DatabaseInterface::selectQueryById($arr, "scelta");
          $row = $rowScelta->fetch_array();
          $scelta = new Scelta($row[0],$row[1],$row[2]);
          $pacchetto = PacchettoControl::recuperaPacchetto($scelta->getIdPacchetto());

          $fattura = new Fattura(null,$data,$cfPaz,$idScelta,$pacchetto->getNSedute());
          $result = DatabaseInterface::insertQuery($fattura->getArray(),"fattura");
          if (!$result){
              throw new Exception("Errore: acquisto fallito!");
          }else{
              return true;
          }
      }catch (Exception $e){
          return $e->getMessage();
      }
    }
}
 ?>
