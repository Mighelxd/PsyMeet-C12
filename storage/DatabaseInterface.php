<?php
    /*
    * DatabaseInterface 
    * Questa classe fornisce tutti i metodi per effettuare query sul DB
    * Autore: Michele D'Avino
    * Versione: 0.1
    * 2020 Copyright by PsyMeet - University of Salerno 
*/
    include("DatabaseConnector.php");
    include '..\plugins\libArray\FunArray.php';
    class DatabaseInterface{
        public static function insertQuery(array $obj, $tablename){
            $connection = DatabaseConnector::connect();
            $insert = "INSERT INTO $tablename (";
            foreach($obj as $value){
                if(gettype($value) == "string")
                $update .= "\"" .$value . "\"". ",";
                else
                    $insert.= $value . ",";
            }
            $insert = substr($insert,0,-1);
            $result = $connection->query($insert);
            DatabaseConnector::close($connection);
            return $result;
        }
        public static function updateQueryById(array $obj, $tablename){
            $connection = DatabaseConnector::connect();
            $update = "UPDATE $tablename SET ";
            $where = "WHERE " . FunArray::array_key_first($obj) . " = " . $obj[FunArray::array_key_first($obj)];
            foreach($obj as $key => $value){
                if(gettype($value) == "string")
                    $update .= $key . " = " . "\"" .$value . "\"". " , ";
                else
                    $update .= $key . " = " .$value . " , ";

        }
            $update = substr($update,0,-2);
            $result = $connection->query($update . $where);
            var_dump($update . $where);
            DatabaseConnector::close($connection);
            return $result;

        }
        public static function selectQueryById(array $array, $tablename){
            $connection = DatabaseConnector::connect();
            $select = "SELECT * FROM $tablename ";
            $where = "WHERE " . FunArray::array_key_first($array) . " = " . $array[FunArray::array_key_first($array)];
            $result = $connection->query($select . $where);
            DatabaseConnector::close($connection);
            return $result;
        }
    }
?>