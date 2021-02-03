<?php


session_start();

include '../plugins/libArray/FunArray.php';
 include '../storage/DatabaseInterface.php';
 include '../storage/Pacchetto.php';
 include '../storage/scelta.php';
include '../storage/Fattura.php';
 include 'PacchettoControl.php';


if ($_SERVER['REQUEST_METHOD']=='POST') {
	$action=$_POST['action'];

} else {
	$action=$_GET['action'];
}
$_SESSION['eccpac']='';
if ($action=='addPacchetto') {
	try {
		$pacchetto=$_POST['pac'];

		$result = PacchettoControl::addPacchetto($pacchetto);

		if (gettype($result) == 'boolean') {
			header('Location: ../interface/Professionista/gestionePacchettiProf.php');
		} else {
			throw new Exception($result);
		}
	} catch (Exception $e) {
		$_SESSION['eccpac']=$e->getMessage();
		header('Location: ../interface/Professionista/gestionePacchettiProf.php');
	}
} elseif ($action=='delPacchetto') {
	try {
		$idProf=$_SESSION['codiceFiscale'];
		$pacchetto=$_POST['idPacchetto'];

		$result = PacchettoControl::delPacchetto($idProf, $pacchetto);

		if (gettype($result) == 'boolean') {
			header('Location: ../interface/Professionista/gestionePacchettiProf.php');
		} else {
			throw new Exception($result);
		}
	} catch (Exception $e) {
		$_SESSION['eccpac']=$e->getMessage();
		header('Location: ../interface/Professionista/gestionePacchettiProf.php');
	}
} elseif ($action == 'compraPacchetto') {
	try {
		$data = date('Y-m-d');
		$cfProf=$_POST['cfProf'];
		$cfPaz=$_POST['cfPaz'];
		$idScelta =$_POST['idScelta'];

		$result = PacchettoControl::buyPacchetto($data, $cfPaz, $idScelta);

		if (gettype($result) == 'boolean') {
			header('Location: ../interface/Paziente/fatture.php');
		} else {
			throw new Exception($result);
		}
	} catch (Exception $e) {
		$_SESSION['eccezione']=$e->getMessage();
		header('Location: ../interface/Paziente/pacchetti.php');
	}
}
