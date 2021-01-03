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
            $values = "VALUES(";

            foreach($obj as $o=>$value){
                if(gettype($value) == "string"){
                    $insert .= "$o,";
                    $values.= "'$value',";
                }
                else{
                    $insert .= "$o,";
                    $values.= $value . ",";
                }
            }

            $insert = substr($insert,0,-1);
            $insert .= ") ";
            $values = substr($values,0,-1);
            $values .= ");";

            $result = $connection->query($insert.$values);
            DatabaseConnector::close($connection);
            return $result;
        }
        public static function updateQueryById(array $obj, $tablename){
            $connection = DatabaseConnector::connect();
            $update = "UPDATE $tablename SET ";
            if(gettype($obj[FunArray::array_key_first($obj)] == "string"))
                $where = "WHERE " .FunArray::array_key_first($obj) . " = " . "\"".  $obj[FunArray::array_key_first($obj)] . "\"";
            else
                $where = "WHERE " .FunArray::array_key_first($obj) . " = " .  $obj[FunArray::array_key_first($obj)];
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
            if(gettype($array[FunArray::array_key_first($array)]) == "string")
                $where = "WHERE " . FunArray::array_key_first($array) . " = " ."\"". $array[FunArray::array_key_first($array)]. "\"";
            else
                $where = "WHERE " . FunArray::array_key_first($array) . " = " . $array[FunArray::array_key_first($array)];
            $result = $connection->query($select . $where);
            DatabaseConnector::close($connection);
            return $result;
        }

        public static function selectQueryByAtt(array $array, $tablename){
            $connection = DatabaseConnector::connect();
            
            $select = "SELECT * FROM $tablename ";
            $where = "WHERE ";
            if(count($array) == 1){
                if(gettype($array[FunArray::array_key_first($array)] == "string"))
                    $where .= FunArray::array_key_first($array) . " = " . "\"" . $array[FunArray::array_key_first($array)] . "\"";
                else
                    $where .= FunArray::array_key_first($array) . " = " . $array[FunArray::array_key_first($array)];
                }
            else{
                foreach($array as $att_name => $att){
                    if(gettype($array[FunArray::array_key_first($array)] == "string"))
                        $where .= FunArray::array_key_first($array) . " = " . "\"" . $array[FunArray::array_key_first($array)] . "\"";
                    else
                        $where .= FunArray::array_key_first($array) . " = " . $array[FunArray::array_key_first($array)];
                    $where .= " OR "; 
                    }
                    $where = substr($where,0,-4);
                } 
                $result = $connection->query($select . $where);
                DatabaseConnector::close($connection);
                return $result;
            }
			
		public static function selectDinamicQuery(array $arrCol,array $arrAtt,$tablename)
		{
            $connection = DatabaseConnector::connect();
            $select = "SELECT ";
            $where = "WHERE ";

            for($i=0;$i<count($arrCol);$i++){
                $select.="$arrCol[$i],";
            }

            $select = substr($select,0,-1);
            $select .= " FROM $tablename ";

            foreach($arrAtt as $att=>$attValue){
                if(is_int($attValue)){
                    $where .= "$att = $attValue and ";
                }
                else{
                     $where .= "$att = '$attValue' and ";
                }
            }
            $where = substr($where,0,-5);
            $result = $connection->query($select . $where);
            DatabaseConnector::close($connection);
            return $result;
        }
    }
?>