<?php


session_start();
include '..\plugins\libArray\FunArray.php';
include '../storage/DatabaseInterface.php';
include 'terapiaControl.php';
include '../storage/Terapia.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$action = $_POST['action'];
} else {
	$action = $_GET['action'];
}
$_SESSION['eccTer']='';
if ($action == 'addTer') {
	try {
		$cfPaz = $_SESSION['cfPazTer'];
		$cfProf = $_SESSION['codiceFiscale'];
		$data = date('Y-m-d');
		$desc = $_POST['descTer'];

		$okAddTer=terapiaControl::addTer($data, $desc, $cfProf, $cfPaz);
		if (gettype($okAddTer)=='boolean') {
			header('Location: ../interface/Professionista/Pazienti.php');
		} else {
			throw new Exception($okAddTer);
		}
	} catch (Exception $e) {
		$_SESSION['eccTer']=$e->getMessage();
		header('Location: ../interface/Professionista/gestioneTerapia.php');
	}
} elseif ($action == 'modTer') {
	try {
		$idTer = $_SESSION['idTerCorr'];
		$desc = $_POST['descTer'];

		$okModTer=terapiaControl::modTerr($idTer, $desc);
		if (gettype($okModTer)=='boolean') {
			header('Location: ../interface/Professionista/gestioneTerapia.php');
		} else {
			throw new Exception($okModTer);
		}

	} catch (Exception $e) {
		$_SESSION['eccTer']=$e->getMessage();
		header('Location: ../interface/Professionista/gestioneTerapia.php');
	}
} elseif ($action == 'delTer') {
	try {
		$idTer = $_SESSION['idTerCorr'];
		$key = ['id_terapia'=>$idTer];

		$ok=DatabaseInterface::deleteQuery($key, Terapia::$tableName);
		if ($ok) {
			header('Location: ../interface/Professionista/Pazienti.php');
		} else {
			throw new Exception('Errore: Terapia non eliminata!');
		}
	} catch (Exception $e) {
		$_SESSION['eccTer']=$e->getMessage();
		header('Location: ../interface/Professionista/gestioneTerapia.php');
	}
}
