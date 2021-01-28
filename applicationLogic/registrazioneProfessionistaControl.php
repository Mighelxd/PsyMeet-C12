<?php

/*
	* registrazioneProfessionistaControl.php
	* Questo file fornisce le funzioni di control per la registrazione del professionista.
	* Autore: Michele D'Avino
	* Versione: 0.1
	* 2020 Copyright by PsyMeet - University of Salerno
*/
	include '../storage/DatabaseInterface.php ';
	include '../storage/Professionista.php';
	include 'AreaInformativaControl.php';
	include '../plugins/libArray/FunArray.php';
	if (!$_SERVER['REQUEST_METHOD'] == 'POST') {
		header('Location: ../interface/Professionista/registrazioneProfessionista.php');
		exit;
	} else {
		$_SESSION['eccregprof']='';
		try {
			$nome = $_POST['nome'];
			$cognome = $_POST['cognome'];
			$data_nascita = $_POST['dataN'];
			$codice_fiscale = strtoupper($_POST['cf']);
			$titolo_studio = $_POST['titoloStudio'];
			$pubblicazioni = $_POST['pubblicazioni'];
			$esperienze = $_POST['esperienze'];
			$indirizzo_studio = $_POST['indirizzoStudio'];
			$telefono = $_POST['telefono'];
			$cellulare = $_POST['cellulare'];
			$p_iva = $_POST['pIva'];
			$polizza_rc = $_POST['polizzaRc'];
			$n_iscrizione_albo = $_POST['nIscrizioneAlbo'];
			$email = $_POST['email'];
			$password = md5($_POST['password']);
			$pec = $_POST['pec'];
			$specializzazione = $_POST['specializzazione'];
			$conferma_password = md5($_POST['confermaPassword']);
			if (isset($_FILES['immagine'])) {
				$immagine = addslashes(file_get_contents($_FILES['immagine']['tmp_name']));
			} else {
				$immagine = null;
			}
			$result=AreaInformativaControl::saveProf($codice_fiscale, $nome, $cognome, $data_nascita, $email, $telefono, $cellulare, $password, $indirizzo_studio, $esperienze, $pubblicazioni, $titolo_studio, $n_iscrizione_albo, $p_iva, $pec, $specializzazione, $polizza_rc, $immagine);
			if (gettype($result)=='string') {
				$esito = ['esito' => false, 'errore' => $result];
				echo json_encode($esito);
				exit();
			} elseif ($result) {
				session_start();
				$_SESSION['codiceFiscale'] = $codice_fiscale;
				$_SESSION['tipo'] = 'professionista';
				$esito = ['esito' => true, 'errore' => 'nessuno'];
				echo json_encode($esito);
				exit();
			}
		} catch (Exception $e) {
			$_SESSION['eccregprof']= $e->getMessage();
			header('Location: ../interface/Professionista/registrazioneProfessionista.php');
		}
	}
