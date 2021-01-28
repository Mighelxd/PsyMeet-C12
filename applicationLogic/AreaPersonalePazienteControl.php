<?php
include '../storage/Paziente.php';
include '../storage/DatabaseInterface.php';
include 'PazienteControl.php';
include '../plugins/libArray/FunArray.php';


session_start();
$cfPaziente = $_SESSION['codiceFiscale'];
$_SESSION['eccezione']='';

if ($_POST['action'] == 'ModificaPaziente') {
	try {
		$telefonoPaz = $_POST['telefono'];
		$indirizzoPaz = $_POST['indirizzo'];
		$emailPaz = $_POST['email'];
		$passwordPaz = md5($_POST['password']);
		$istruzionePaz = $_POST['istruzione'];


		$result = PazienteControl::updateSchedaPaziente($cfPaziente, $telefonoPaz, $indirizzoPaz, $emailPaz, $passwordPaz, $istruzionePaz);


		if ($result) {
			header('Location: ../interface/Paziente/areaPersonalePaziente.php');
		} else {
			throw new Exception('Errore: Modifiche non effettuate!');
		}
	} catch (Exception $e) {
		$_SESSION['eccezione']=$e->getMessage();
		header('Location: ../interface/Paziente/areaPersonalePaziente.php');
	}
} elseif ($_POST['action'] == 'modificaFoto') {
	try {
		if (isset($_FILES['fotoProfiloPaz'])) {
			$immagine=addslashes(file_get_contents($_FILES['fotoProfiloPaz']['tmp_name']));
		} else {
			$immagine=null;
		}

		$res = PazienteControl::updateFotoProfilo($cfPaziente, $immagine);


		if ($res) {
			header('Location: ../interface/Paziente/areaPersonalePaziente.php');
		} else {
			throw new Exception('Errore: Modifica foto non effettuate!');
		}

	} catch (Exception $e) {
		$_SESSION['eccezione']=$e->getMessage();
		header('Location: ../interface/Paziente/areaPersonalePaziente.php');
	}
}
