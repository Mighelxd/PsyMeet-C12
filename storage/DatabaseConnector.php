<?php
/*
     * DatabaseConnector
     * Questa classe contiene i metodi per la connessione al Database MySQL
     * Autore: D'Avino Michele
     * Versione: 0.1
     * 2020 Copyright by PsyMeet - University of Salerno
     */
    class DatabaseConnector{
      static $conn = null;
      public static function connect($user = "psyuser" , $host = "localhost" , $dbname = "psydb" , $password = "psyuserR1!" ){
            $conn = new mysqli($host, $user, $password, $dbname);
            if($conn->connect_error){
                throw new Exception("Connessione fallita : ".$conn->connect_error);
            }
            return $conn;
        }

        public static function close($connection){
            $conn = $connection->close();
            return $conn;
        }
    }
?>
