<?php
class CartellaClinicaControl
{
    static function getCartellaClinica($cfPaz, $cfProf)
    {
        try {
            $select = DatabaseInterface::selectQueryByAtt(array("cf_prof" => $cfProf, "cf" => $cfPaz), CartellaClinica::$tableName);
            if ($select->num_rows == 0)
                return null;
            $result = $select->fetch_array();
            $cartellaClinica = new CartellaClinica($result["id_cartella_clinica"], $result["data_creazione"], $result["q_umore"], $result["q_relazioni"], $result["patologie_pregresse"], $result["farmaci"], $cfProf, $cfPaz);
            return $cartellaClinica;
        } catch (Exception $e) {
            $_SESSION['eccCaClPr'] = $e->getMessage();
            return $e->getMessage();
        }

    }

    static function updateCartellaClinica($cartellaClinicOld, $id, $date, $umo, $relaz, $patol, $farma, $cfProf, $cfPaz)
    {
        try {
            $cartellaClinica = new CartellaClinica($id, $date, $umo, $relaz, $patol, $farma, $cfProf, $cfPaz);
            $result = DatabaseInterface::updateQueryById($cartellaClinica->getArray(), CartellaClinica::$tableName);
            if ($result == false)
                throw new Exception("errore update");
            return true;
        } catch (Exception $e) {

            return $e->getMessage();;
        }
    }

    static function saveCartellaClinica($id, $date, $umo, $relaz, $patol, $farma, $cfProf, $cfPaz)
    {
        try {
            $cartellaClinica = new CartellaClinica($id, $date, $umo, $relaz, $patol, $farma, $cfProf, $cfPaz);
            $result=self::getCartellaClinica($cfPaz,$cfProf);
            if(isset($result))
                throw new Exception("Cartella clinica gia` esistente.");
            $result = DatabaseInterface::insertQuery($cartellaClinica->getArraySenzaId(), CartellaClinica::$tableName);
            if (!$result) {
                throw new Exception("errore inserimento");
            }
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}