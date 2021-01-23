<?php
class AreaInformativaControl
{
    static function checkProf($professionista){
        $select = DatabaseInterface::selectQueryById($professionista->getArray(),Professionista::$tableName);
        if(mysqli_num_rows($select)!=0) return "Codice fiscale gia' presente.";
        $select = DatabaseInterface::selectQueryByAtt(array("email" => $professionista->getEmail()),Professionista::$tableName);
        if(mysqli_num_rows($select)!=0) return "Email gia' presente.";
        return null;
    }
    static function saveProf($professionista){
        $result = DatabaseInterface::insertQuery($professionista->getArray(),Professionista::$tableName);
        return $result;
    }
    static function checkPaz($paziente){
        $select = DatabaseInterface::selectQueryById($paziente->getArray(),Paziente::$tableName);
        if($select->num_rows!=0) return "Codice fiscale gia' presente.";
        $select = DatabaseInterface::selectQueryByAtt(array("email" => $paziente->getEmail()),Paziente::$tableName);
        if($select->num_rows!=0) return "Email gia' presente.";

    }
    static function savePaz($paziente){
        $result = DatabaseInterface::insertQuery($paziente->getArray(),Paziente::$tableName);
        return $result;
    }
    static function recuperaProfessionisti(){
        try{
            $allProf = DatabaseInterface::selectAllQuery('professionista');
            $arrProf = null;

            while($row = $allProf->fetch_array()){
                $prof = new professionista($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10],$row[11],$row[12],$row[13],$row[14],$row[15],$row[16],$row[17]);
                $arrProf[] = $prof;
            }
            return $arrProf;
        }catch(Exception $e){
            $_SESSION['eccareaprof'] = $e->getMessage();
            return null;
        }
    }
    public static function getProf($cfProf){
        try{
            $arr = array("cf_prof" => $cfProf,);
            $result = DatabaseInterface::selectQueryById($arr,"professionista");
            $arr = $result -> fetch_array();
            $prof = new Professionista($arr[0],$arr[1],$arr[2],$arr[3],$arr[4],$arr[5],$arr[6],$arr[7],$arr[8],$arr[9],$arr[10],$arr[11],$arr[12],$arr[13],$arr[14],$arr[15],$arr[16],$arr[17]);

            return $prof;
        }catch(Exception $e){
            $_SESSION['eccareaprof'] = $e->getMessage();
            return null;
        }

    }
    public static function getProfessionistByPaz($cfPaziente){
        try{
            $professionisti = NULL;

            $arr = array("cf" => $cfPaziente);
            $result = DatabaseInterface::selectQueryByAtt($arr,"terapia");

            while ($row = $result->fetch_array()){
                $terapie = new Terapia($row[0],$row[1],$row[2],$row[3],$row[4]);
                $prof = self::getProf($terapie->getCfProf());
                $professionisti[] = $prof;
            }

            return $professionisti;
        }catch(Exception $e){
            $_SESSION['eccareaprof'] = $e->getMessage();
            return null;
        }
    }


    public static  function updateSchedaProfessionista($cf, $telefono, $cellulare, $email, $pass, $titoloDiStudio, $pubblicazioni, $esperienze, $indirizzoStudio){
        try {
            $professionista = AreaInformativaControl::getProf($cf);

            if ($telefono != "") {
                $professionista->setTelefono($telefono);
            }

            if ($cellulare != "") {
                $professionista->setCellulare($cellulare);
            }

            if ($email != "") {
                $professionista->setEmail($email);
            }

            if ($pass != "") {
                $professionista->setPassword($pass);
            }

            if ($titoloDiStudio != "") {
                $professionista->setTitoloStudio($titoloDiStudio);
            }

            if ($pubblicazioni != "") {
                $professionista->setPubblicazione($pubblicazioni);
            }

            if ($esperienze != "") {
                $professionista->setEsperienze($esperienze);
            }

            if ($indirizzoStudio != "") {
                $professionista->setIndirizzoStudio($indirizzoStudio);
            }

            $result = DatabaseInterface::updateQueryById($professionista->getArrayNoVideo(), Professionista::$tableName);

            if($result == false){
                throw new Exception("errore update");
            }

            return true;
        }catch (Exception $e){
            return $e->getMessage();
        }
    }

    public static function updateFotoProfessionista($cf, $img){
        try {
            if ($img != NULL) {
                $arr = array("cf_prof" => $cf,);
                $result = DatabaseInterface::selectQueryById($arr, "professionista");
                $arr = $result->fetch_array();
                $professionista = new Professionista($arr[0], $arr[1], $arr[2], $arr[3], $arr[4], $arr[5], $arr[6], $arr[7], $arr[8], $arr[9], $arr[10], $arr[11], $arr[12], $arr[13], $arr[14], $arr[15], $arr[16], $img);

                $result = DatabaseInterface::updateQueryById($professionista->getArray(), Professionista::$tableName);

                if ($result == false) {
                    throw new Exception("errore foto non aggiornata");
                }
                return true;
            }
        }catch (Exception $e){
            return $e->getMessage();
        }
    }
}