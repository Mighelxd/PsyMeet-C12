<?php
/*
* SchedaPrimoColloquioControl
* Questa Control fornisce tutti i metodi relativi alla scheda relativa al primo colloquio
* Autore: Francesco Capone
* Versione: 0.1
* 2020 Copyright by PsyMeet - University of Salerno
*/
session_start();
class terapiaControl{


    static function recuperaSchede($idTerapia){
        try{
            $_SESSION['eccezione']="";
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
            $_SESSION['eccezione'] =$e->getMessage();
            return array();
        }
    }

    public static function getTerapie($cfPaz, $cfProf){
        try{
            $_SESSION['eccezione']="";
            $arrKey= array('cf' => $cfPaz, 'cf_prof' => $cfProf);
            $arrayTerapie = array();
            $listTerapie = DatabaseInterface::selectQueryByAtt($arrKey, "terapia");

            while ($row = $listTerapie->fetch_array()) {
                $terapia = new Terapia($row[0],$row[1],$row[2],$row[3],$row[4]);
                $arrayTerapie[] = $terapia;
            }
            return $arrayTerapie;
        }catch(Exception $e){
            $_SESSION['eccezione'] =$e->getMessage();
            return array();
        }
    }

}

































?>
