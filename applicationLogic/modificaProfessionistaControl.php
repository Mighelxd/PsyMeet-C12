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
 //$_SESSION['eccezione']="";

 if($_POST["action"] == "aggiornaDati"){
     try {
         $telefono = $_POST["telefono"];
         $cellulare = $_POST["cellulare"];
         $email = $_POST["Email"];
         $password = md5($_POST["Password"]);
         $titolo_studio = $_POST["TitoloDiStudio"];
         $pubblicazioni = $_POST["Pubblicazioni"];
         $esperienze = $_POST["Esperienze"];
         $indirizzo_studio = $_POST["IndirizzoStudio"];

         $result = AreaInformativaControl::updateSchedaProfessionista($cf_prof, $telefono, $cellulare, $email, $password, $titolo_studio, $pubblicazioni, $esperienze, $indirizzo_studio);

         if (gettype($result) != "string" ) {
           header("Location: ../interface/Professionista/areaPersonaleProfessionista.php");
         } else{
             throw new Exception($result);
         }
     }catch(Exception $e){
          $_SESSION['eccezione'] = $e->getMessage();

         header("Location: ../interface/Professionista/areaPersonaleProfessionista.php");
      }
  }
  else if($_POST["action"] == "modificaFoto"){
      try {
          if (isset($_FILES["fotoProfiloProf"]))
              $immagine = addslashes(file_get_contents($_FILES["fotoProfiloProf"]["tmp_name"]));
          else
              $immagine = NULL;

          $result = AreaInformativaControl::updateFotoProfessionista($cf_prof, $immagine);

          if ($result){
              header("Location: ../interface/Professionista/areaPersonaleProfessionista.php");
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
