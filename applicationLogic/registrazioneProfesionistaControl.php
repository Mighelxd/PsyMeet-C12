<?php
    include "../storage/DatabaseInterface.php ";
    include "../storage/professionista.php";
    if(!$_SERVER["REQUEST_METHOD"] == "POST"){
        header("Location: psymeet/interface/Professionista/registrazioneProfessionista.html");
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
            $password=$_POST["password"];
            $conferma_password=$_POST["confermaPassword"];
            $videoProfessionista=$_POST["videoPresentazione"];
            $professionista = new Professionista($codice_fiscale,$nome,$cognome,$data_nascita,$email,$telefono,$cellulare,$password,$indirizzo_studio,$esperienze,$pubblicazioni,$titolo_studio,$n_iscrizione_albo,$p_iva,NULL,NULL,$polizza_rc,$videoProfessionista,NULL);
            var_dump($professionista);
        }
?>