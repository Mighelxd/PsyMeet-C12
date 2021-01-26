<?php
/*
* SchedaPrimoColloquioControl
* Questa Control fornisce tutti i metodi relativi alla scheda relativa al primo colloquio
* Autore: Francesco Capone
* Versione: 0.1
* 2020 Copyright by PsyMeet - University of Salerno
*/
class terapiaControl{

    static function addTer($data,$desc,$cfProf,$cfPaz){
        try{
            $att = new Terapia(null,$data,$desc,$cfProf,$cfPaz);
            $ok = DatabaseInterface::insertQuery($att->getArray(),Terapia::$tableName);

            if($ok){
                return true;
            }
            else{
                throw new Exception("Errore: Terapia non aggiunta!");
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    static function modTerr($idTer,$desc){
        try{
            $key = array("id_terapia"=>$idTer);
            $recTer = DatabaseInterface::selectQueryById($key,Terapia::$tableName);
            while($row = $recTer->fetch_array()){
                $terapia = new Terapia($row[0],$row[1],$row[2],$row[3],$row[4]);
            }
            $terapia->setDescrizione($desc);
            $upd=DatabaseInterface::updateQueryById($terapia->getArray(),Terapia::$tableName);
            if($upd){
                return true;
            }else{
                throw new Exception("Errore: Terapia non modificata!");
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    //@codeCoverageIgnoreStart
    static function recuperaSchede($idTerapia){
        try{
            $att = array("id_terapia"=>$idTerapia);
            $col = array("*");
            $schPrimoColl = DatabaseInterface:: selectDinamicQuery($col, $att, "schedaprimocolloquio");
            $schAssFoc = DatabaseInterface:: selectDinamicQuery($col, $att, "schedaassessmentfocalizzato");
            $schAssGen = DatabaseInterface:: selectDinamicQuery($col, $att, "schedaassessmentgeneralizzato");
            $schFollow = DatabaseInterface:: selectDinamicQuery($col, $att, "schedafollowup");
            $schModEz = DatabaseInterface:: selectDinamicQuery($col, $att, "schedamodelloeziologico");
            $allSchede = array();

            while($row = $schPrimoColl->fetch_array()){
                $scheda = new SchedaPrimoColloquio($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
                $allSchede[] = $scheda;
            }
            while($row = $schAssFoc->fetch_array()){
                $scheda = new SchedaAssessmentFocalizzato($row[0],$row[1],$row[2],$row[3],$row[4]);
                $allSchede[] = $scheda;
            }
            while($row = $schAssGen->fetch_array()){
                $scheda = new SchedaAssessmentGeneralizzato($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10],$row[11]);
                $allSchede[] = $scheda;
            }
            while($row = $schFollow->fetch_array()){
                $scheda = new SchedaFollowUp($row[0],$row[1],$row[2],$row[3],$row[4],$row[5]);
                $allSchede[] = $scheda;
            }
            while($row = $schModEz->fetch_array()){
                $scheda = new SchedaModelloEziologico($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7]);
                $allSchede[] = $scheda;
            }

            return $allSchede;
        }catch(Exception $e){
            $_SESSION['eccTer'] =$e->getMessage();
            return array();
        }
    }

    public static function getTerapie($cfPaz, $cfProf){
        try{
            $arrKey= array('cf' => $cfPaz, 'cf_prof' => $cfProf);
            $arrayTerapie = array();
            $listTerapie = DatabaseInterface::selectQueryByAtt($arrKey, "terapia");

            while ($row = $listTerapie->fetch_array()) {
                $terapia = new Terapia($row[0],$row[1],$row[2],$row[3],$row[4]);
                $arrayTerapie[] = $terapia;
            }
            return $arrayTerapie;
        }catch(Exception $e){
            $_SESSION['eccTer'] =$e->getMessage();
            return array();
        }
    }

    public static function getTerapiePaz($cf){
        try{
            $arrKey= array('cf' => $cf);
            $arrayTerapie = array();
            $listTerapie = DatabaseInterface::selectQueryByAtt($arrKey, "terapia");

            while ($row = $listTerapie->fetch_array()) {
                $terapia = new Terapia($row[0],$row[1],$row[2],$row[3],$row[4]);
                $arrayTerapie[] = $terapia;
            }
            return $arrayTerapie;
        }catch(Exception $e){
            $_SESSION['eccTer'] =$e->getMessage();
            return array();
        }
    }

    public static function getEziologicoForPaz($idT){
        try{
            $arrKey= array('id_terapia' => $idT);
            $mEz = null;
            $recMEz=DatabaseInterface::selectQueryByAtt($arrKey, "schedamodelloeziologico");
            $row = $recMEz->fetch_array();
            $mEz=new SchedaModelloEziologico($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7]);

            return $mEz;
        }catch(Exception $e){
            $_SESSION['eccTer'] =$e->getMessage();
            return null;
        }//@codeCoverageIgnoreEnd

    }
}
?>
