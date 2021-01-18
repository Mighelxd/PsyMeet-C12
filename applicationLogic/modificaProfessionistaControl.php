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
 include "AreaInformativaControl.php";
 include "../storage/Professionista.php";

 session_start();
 $cf_prof = $_SESSION["codiceFiscale"];
 $_SESSION['noUpdate']="";
 $_SESSION['noUpdatePhoto']="";
 $_SESSION['eccezione']="";

 if($_POST["action"] == "aggiornaDati"){
         $telefono = $_POST["telefono"];
         $cellulare = $_POST["cellulare"];
         $email = $_POST["Email"];
         $password = md5($_POST["Password"]);
         $titolo_studio = $_POST["TitoloDiStudio"];
         $pubblicazioni = $_POST["Pubblicazioni"];
         $esperienze = $_POST["Esperienze"];
         $indirizzo_studio = $_POST["IndirizzoStudio"];

         $professionista = AreaInformativaControl::getProf($cf_prof);

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
         if ($result) {
             header("Location: ../interface/Professionista/areaPersonaleProfessionista.php");
         } else {
             $_SESSION['noUpdate'] = "Modifiche non effettuate";
             header("Location: ../interface/Professionista/areaPersonaleProfessionista.php");
         }
  }
  else if($_POST["action"] == "modificaFoto"){
      try {
          if (isset($_FILES["fotoProfiloProf"]))
              $immagine = addslashes(file_get_contents($_FILES["fotoProfiloProf"]["tmp_name"]));
          else
              $immagine = NULL;

          if ($immagine != NULL) {
              $arr = array("cf_prof" => $cf_prof,);
              $result = DatabaseInterface::selectQueryById($arr, "professionista");
              $arr = $result->fetch_array();
              $professionista = new Professionista($arr[0], $arr[1], $arr[2], $arr[3], $arr[4], $arr[5], $arr[6], $arr[7], $arr[8], $arr[9], $arr[10], $arr[11], $arr[12], $arr[13], $arr[14], $arr[15], $arr[16], $immagine);


              $result = DatabaseInterface::updateQueryById($professionista->getArray(), "professionista");
              //var_dump($result);
              if ($result) {
                  header("Location: ../interface/Professionista/areaPersonaleProfessionista.php");
              } else {
                  $_SESSION['noUpdatePhoto'] = "Professionista inesistente";
                  header("Location: ../interface/Professionista/areaPersonaleProfessionista.php");
              }
          } else {
              $_SESSION['noUpdatePhoto'] = "Foto non aggiornata";
              header("Location: ../interface/Professionista/areaPersonaleProfessionista.php");
          }
      }catch(Exception $e){
          $_SESSION['eccezione'] = $e->getMessage();
          header("Location: ../interface/Professionista/areaPersonaleProfessionista.php");
      }
  }
 ?>
