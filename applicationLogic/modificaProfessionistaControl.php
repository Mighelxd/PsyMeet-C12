<?php 
/*
    * modificaProfessionistacontrol.php
    * Control che permette le modifiche relative al professionista
    * Autore: Martino D'Auria
    * Versione: 0.1
    * 2020 Copyright by PsyMeet - University of Salerno
*/
 include "../plugins/libArray/FunArray.php";
 include "../storage/DatabaseInterface.php";
 include "../storage/Professionista.php";
 
 $cf_prof="RSSMRC80R12H703U";

 if($_POST["action"] == "aggiornaDati"){
    $telefono = $_POST["telefono"];
    $cellulare = $_POST["cellulare"];
    $email = $_POST["Email"];
    $password = md5($_POST["Password"]);
    $titolo_studio = $_POST["TitoloDiStudio"];
    $pubblicazioni = $_POST["Pubblicazioni"];
    $esperienze = $_POST["Esperienze"];
    $indirizzo_studio = $_POST["IndirizzoStudio"];

    $arr = array("cf" => $cf_prof);
    $result = DatabaseInterface::selectQueryById($arr,"professionista");
    $arr = $result -> fetch_array();
    $professionista = new Professionista($arr[0], $arr[1], $arr[2], $arr[3], $arr[4], $arr[5], $arr[6], $arr[7], $arr[8], $arr[9], $arr[10], $arr[11], $arr[12], $arr[12], $arr[13], $arr[14], $arr[15], $arr[16], $arr[17]);

    if ($telefono != "") {
      $professionista->setTelefono($telefono);
    }

    if ($cellulare != "") {
      $professionista->setCellulare($cellulare);
    }

    if ($email != "") {
      $professionista->setEmail($email);
    }

    if ($password != "") {
      $professionista->setPassword($password);
    }
    
    if ($titolo_studio != "") {
      $professionista->setTitoloStudio($titolo_studio);
    }

    if ($pubblicazioni != "") {
        $professionista->setPubblicazione($pubblicazioni);
    }

    if ($esperienze != "") {
        $professionista->setEsperienze($esperienze);
    }

    if ($titolo_studio != "") {
        $professionista->setTitoloStudio($titolo_studio);
    }

    if ($indirizzo_studio != "") {
        $professionista->setIndirizzoStudio($indirizzo_studio);
    }
    $result = DatabaseInterface::updateQueryById($professionista->getArrayNoVideo(), "professionista");
  }

if($result){
  header("Location: ../interface/Professionista/areaPersonaleProfessinista.php");
}
else{
  echo "non va";
}



 ?>