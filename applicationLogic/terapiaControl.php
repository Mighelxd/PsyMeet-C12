<?php
/*
* SchedaPrimoColloquioControl
* Questa Control fornisce tutti i metodi relativi alla scheda relativa al primo colloquio
* Autore: Francesco Capone
* Versione: 0.1
* 2020 Copyright by PsyMeet - University of Salerno
*/
class terapiaControl{


    static function recuperaSchede(){
        $att = array("id_terapia"=>"1");
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
            $scheda = new SchedaAssessmentFocalizzato($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9]);
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
    }
}

































?>