<?php

/*
	* modificaProfessionistacontrol.php
	* Control che permette le modifiche relative al professionista
	* Autore: Martino D'Auria
	* Versione: 0.1
	* 2020 Copyright by PsyMeet - University of Salerno
*/
 include '../plugins/libArray/FunArray.php';
 include '../storage/DatabaseInterface.php';
 include 'AreaInformativaControl.php';
 include '../storage/Professionista.php';

 session_start();
 $cf_prof = $_SESSION['codiceFiscale'];

 $_SESSION['eccmodprof']='';

 if ($_POST['action'] == 'aggiornaDati') {
 	try {
 		$telefono = $_POST['telefono'];
 		$cellulare = $_POST['cellulare'];
 		$email = $_POST['Email'];
 		$password = md5($_POST['Password']);
 		$titolo_studio = $_POST['TitoloDiStudio'];
 		$pubblicazioni = $_POST['Pubblicazioni'];
 		$esperienze = $_POST['Esperienze'];
 		$indirizzo_studio = $_POST['IndirizzoStudio'];

 		$result = AreaInformativaControl::updateSchedaProfessionista($cf_prof, $telefono, $cellulare, $email, $password, $titolo_studio, $pubblicazioni, $esperienze, $indirizzo_studio);

 		if (gettype($result) == 'boolean') {
 			header('Location: ../interface/Professionista/areaPersonaleProfessionista.php');
 		} else {
 			throw new Exception($result);
 		}
 	} catch (Exception $e) {
 		$_SESSION['eccmodprof'] = $e->getMessage();

 		header('Location: ../interface/Professionista/areaPersonaleProfessionista.php');
 	}
 } elseif ($_POST['action'] == 'modificaFoto') {
  	try {
  		if (isset($_FILES['fotoProfiloProf'])) {
  			$immagine = addslashes(file_get_contents($_FILES['fotoProfiloProf']['tmp_name']));
  		} else {
  			$immagine = null;
  		}

  		$result = AreaInformativaControl::updateFotoProfessionista($cf_prof, $immagine);

  		if (gettype($result)=='boolean') {
  			header('Location: ../interface/Professionista/areaPersonaleProfessionista.php');
  		} else {
  			throw new Exception($result);
  		}
  	} catch (Exception $e) {
  		$_SESSION['eccmodprof'] = $e->getMessage();
  		header('Location: ../interface/Professionista/areaPersonaleProfessionista.php');
  	}
  }
