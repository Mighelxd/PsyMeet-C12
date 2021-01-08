<?php
    /*
    * registrazioneProfessionistaControl.php 
    * Questo file fornisce le funzioni di control per la registrazione del professionista.
    * Autore: Michele D'Avino
    * Versione: 0.1
    * 2020 Copyright by PsyMeet - University of Salerno 
*/
    include "../storage/DatabaseInterface.php ";
    include "../storage/professionista.php";
    include '../plugins/libArray/FunArray.php';
    if(!$_SERVER["REQUEST_METHOD"] == "POST"){
        header("Location: ../interface/Professionista/registrazioneProfessionista.php");
        exit;
    }
    else{
            $nome=$_POST["nome"];
            $cognome=$_POST["cognome"];
            $data_nascita=$_POST["dataN"];
            $codice_fiscale=strtoupper($_POST["cf"]);
            $titolo_studio=$_POST["titoloStudio"];
            $pubblicazioni=$_POST["pubblicazioni"];
            $esperienze=$_POST["esperienze"];
            $indirizzo_studio=$_POST["indirizzoStudio"];
            $telefono=$_POST["telefono"];
            $cellulare=$_POST["cellulare"];
            $p_iva=$_POST["pIva"];
            $polizza_rc=$_POST["polizzaRc"];
            $n_iscrizione_albo=$_POST["nIscrizioneAlbo"];
            $email=$_POST["email"];
            $password=md5($_POST["password"]);
            $conferma_password=md5($_POST["confermaPassword"]);
            $videoProfessionista=$_POST["videoPresentazione"];
            $professionista = new Professionista($codice_fiscale,$nome,$cognome,$data_nascita,$email,$telefono,$cellulare,$password,$indirizzo_studio,$esperienze,$pubblicazioni,$titolo_studio,$n_iscrizione_albo,$p_iva,NULL,NULL,$polizza_rc,Null,NULL);
            $select = DatabaseInterface::selectQueryById($professionista->getArray(),$professionista->tableName);
            if(mysqli_num_rows($select)!=0){
                session_start();
                $_SESSION["errore"]="Codice fiscale già presente.";
                header("Location: ../interface/professionista/registrazioneProfessionista.php");
            }
            $select = DatabaseInterface::selectQueryByAtt(array("email" => $professionista->getEmail()),$professionista->tableName);
            if(mysqli_num_rows($select)!=0){
                session_start();
                $_SESSION["errore"]="Email già presente.";
                header("Location: ../interface/professionista/registrazioneProfessionista.php");
            }
            $result = DatabaseInterface::insertQuery($professionista->getArray(),$professionista->tableName);
            if($result==true){
                session_start();
                $_SESSION["codiceFiscale"]=$codice_fiscale;
                $_SESSION["tipo"]="professionista";
                header("Location: ../interface/Professionista/areaPersonale.php");
            }
        }
?>