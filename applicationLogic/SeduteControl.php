<?php

//include '../../storage/Terapia.php';
//session_start();

class SeduteControl
{
    static function addSchedaFoc($data,$idTerapia){
        try{
            $numEp = '0';
            $data = str_replace('/','-',$data);
            $data=date_create($data);
            $data = date_format($data,"Y-m-d");
            $tipo = "Scheda Assessment Focalizzato";
            $scheda = new SchedaAssessmentFocalizzato(null,$data,$numEp,$idTerapia,$tipo);
            $scheda = $scheda->getArray();
            $ok = DatabaseInterface::insertQuery($scheda,"schedaassessmentfocalizzato");
            if($ok){
                $scheda = array_diff($scheda,['']);
                $recIdScheda = DatabaseInterface::selectQueryByAtt($scheda,"schedaassessmentfocalizzato");
                if($recIdScheda->num_rows == 1){
                    $row = $recIdScheda->fetch_array();
                    $idSchedaCorr = $row[0];
                    $_SESSION['idSCorr'] = $idSchedaCorr;
                    return true;
                }else{
                    throw new Exception("Scheda non trovata!");
                }
            }else{
                throw new Exception("Errore: scheda non aggiunta!");
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    static function recuperaEpisodi($allSchede)
    {
        try{
            $_SESSION['eccezioni']="";
            $schedaConEpisodi = array();

            for ($i = 0; $i < count($allSchede); $i++) {
                $scheda = array();
                $episodi = array();
                $scheda[] = $allSchede[$i];
                $attEp = array("id_scheda" => $allSchede[$i]->getIdScheda());
                $datiEpisodi = DatabaseInterface::selectQueryByAtt($attEp, Episodio::$tableName);
                while ($rowEp = $datiEpisodi->fetch_array()) {
                    $ep = new episodio($rowEp[0], $rowEp[1], $rowEp[2], $rowEp[3], $rowEp[4], $rowEp[5], $rowEp[6], $rowEp[7]);
                    $episodi[] = $ep;
                }
                $scheda[] = $episodi;
                $schedaConEpisodi[] = $scheda;
            }
            return $schedaConEpisodi;
        }catch(Exception $e){
            $_SESSION['eccezioni']=$e->getMessage();
            return array();
        }
    }
    static function recAllModEzPaz($cfPaz)
    {
        try{
            $_SESSION['eccezioni']="";
            $arr=null;
            $arrKey = ['cf' => $cfPaz];
            $terPz = DatabaseInterface::selectQueryByAtt($arrKey, Terapia::$tableName);
            while($row = $terPz->fetch_array()) {
                $ter[] = new Terapia($row[0], $row[1], $row[2], $row[3], $row[4]);
            }
            for($i=0;$i<count($ter); $i++){
                $idTp = $ter[$i]->getIdTerapia();
                $idTpPz = array('id_terapia' => $idTp);
                $modEzPz = DatabaseInterface::selectQueryByAtt($idTpPz, SchedaModelloEziologico::$tableName);
                while ($row = $modEzPz->fetch_array()) {
                    $mdEzPaziente = new SchedaModelloEziologico($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]);
                    $arr[] = $mdEzPaziente;
                }
            }


            return $arr;
        }catch(Exception $e){
            $_SESSION['eccezioni']=$e->getMessage();
            return null;
        }
    }
}

 ?>
