<?php

class AppuntamentoControlF{
    static function addApp($data,$ora,$desc,$cfProf,$cf){
        try{
            $ora = $ora.":00";
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
    static function modApp($id,$data,$ora,$desc,$cfProf,$cf,$oldD,$oldO,$oldDe,$oldCfPaz){
        try{
            $ora = $ora.":00";
            $oldO = $oldO.":00";
            $oldApp = new Appuntamento($id,$oldD,$oldO,$oldDe,$cfProf,$oldCfPaz);
            $oldApp->setData($data);
            $oldApp->setOra($ora);
            $oldApp->setDesc($desc);
            $oldApp->setCfPaz($cf);

            $isUpdate = DatabaseInterface::updateQueryById($oldApp->getArray(),Appuntamento::$tableName);
            if($isUpdate){
                return true;
            }
            else{
                throw new Exception("Errore: Appuntamento non modificato!");
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
