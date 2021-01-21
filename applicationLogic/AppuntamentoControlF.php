<?php

class AppuntamentoControlF{
    static function addApp($data,$ora,$desc,$cfProf,$cf){
        try{
            $newApp = new Appuntamento(null,$data,$ora,$desc,$cfProf,$cf);
            $ok = DatabaseInterface::insertQuery($newApp->getArray(),Appuntamento::$tableName);
            if($ok){
                return true;
            }
            else{
                throw new Exception("Errore: Appuntamento non aggiunto!");
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
