<?php

class CartellaClinicaControl
{
    static function getCartellaClinica($cfPaz,$cfProf){
        $select=DatabaseInterface::selectQueryByAtt(array("cf_prof" => $cfProf, "cf" => $cfPaz),CartellaClinica::$tableName);
        if($select->num_rows==0)
            return null;
        $result=$select->fetch_array();
        $cartellaClinica=new CartellaClinica($result["id_cartella_clinica"],$result["data_creazione"],$result["q_umore"],$result["q_relazioni"],$result["patologie_pregresse"],$result["farmaci"],$cfProf,$cfPaz);
        return $cartellaClinica;
    }
    static function updateCartellaClinica($cartellaClinica){
        $result=DatabaseInterface::updateQueryById($cartellaClinica->getArray(), CartellaClinica::$tableName);
        if($result == false)
            return "errore nella modifica";
        else
            return true;
    }
    static function saveCartellaClinica($cartellaClinica){
        $result=DatabaseInterface::insertQuery($cartellaClinica->getArraySenzaId(), CartellaClinica::$tableName);
        return $result;
    }
}