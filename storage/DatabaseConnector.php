<?php 
/*
     * DatabaseConnector
     * Questa classe contiene i metodi per la connessione al Database MySQL
     * Autore: D'Avino Michele
     * Versione: 0.1
     * 2020 Copyright by PsyMeet - University of Salerno
     */
    class DatabaseConnector{

        public static function connect($user = "psyuser" , $host = "localhost" , $dbname = "psydb" , $password = "psyuserR1!" ){
            return new mysqli($host, $user, $password, $dbname);
        }

        public static function close($connection){
            return $connection->close();
        }
    }
?>