<?php 
    class DatabaseConnector{

        public static function connect($user = "psyuser" , $host = "localhost" , $dbname = "psydb" , $password = "psyuserR1!" ){
            return new mysqli($host, $user, $password, $dbname);
        }

        public static function close($connection){
            return $connection->close();
        }
    }
?>