<?php

include "../storage/Professionista.php";
include "../storage/Paziente.php";

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
}