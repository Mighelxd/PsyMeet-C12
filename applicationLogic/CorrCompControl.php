<?php


/*
	* CompitoControl
	* Questo control fornisce le operazioni che si possono fare per il compito'
	* Autore: Mary Cerullo
	* Versione: 0.1
	* 2020 Copyright by PsyMeet - University of Salerno
*/

include '../storage/Compito.php';
include '../storage/DatabaseInterface.php';
include '../plugins/libArray/FunArray.php';
include 'CompitoControl.php';


define('TABLE_NAME', 'compito');

session_start();
$cfProf=$_SESSION['codiceFiscale'];
$cfPaz=$_SESSION['cfPazTer'];
$_SESSION['eccComp']='';





if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$action=$_POST['action'];
}

// questa action permette di correggere un compito
if ($action=='correzione') {
	try {
		$idComp = $_POST['id'];
		$effettuato = $_POST['effettuato'];

		/* if (!isset($_POST['effettuato'])) {
			$effettuato=0;
		} else {
			$effettuato=1;
		} */
		$correzione = $_POST['correzione'];

		$corrComp = CompitoControl::corrComp($idComp, $effettuato, $correzione);


		if (gettype($corrComp) =='boolean') {
			header('Location: ../interface/Professionista/gestioneCompiti.php');
		} else {
			throw new Exception($corrComp);
		}

	} catch (Exception $e) {
		$_SESSION['eccComp']= $e->getMessage();
		header('Location: ../interface/Professionista/gestioneCompiti.php');
	}
} elseif //questa action permette di aggiungere un nuovo compito

  ($action=='addComp') {
	try {
		$data = $_POST['data'];
		$titolo = $_POST['titolo'];
		$descrizione = $_POST['descrizione'];
		$svolgimento='';
		$correzione='';


		$compitoComp = new Compito(null, $data, 0, $titolo, $descrizione, $svolgimento, $correzione, $cfProf, $cfPaz);

		$compt = DatabaseInterface::insertQuery($compitoComp->getArray(), TABLE_NAME);
		//var_dump($compt);

		if (gettype($compt)=='boolean') {
			header('Location: ../interface/Professionista/gestioneCompiti.php');
		} else {
			throw new Exception('Errore: Compito non aggiunto!');
		}
	} catch (Exception $e) {
		$_SESSION['eccComp']= $e->getMessage();
		//echo $e->getMessage();
		header('Location: ../interface/Professionista/gestioneCompiti.php');
	}
} elseif //questa action permette al paziente di svolgere un compito
	($action=='doComp') {
	try {
		$idComp = $_POST['id'];
		$svolgimento = $_POST['svolgimento'];

		$doCompOk = CompitoControl::doComp($idComp, $svolgimento);

		if (gettype($doCompOk)=='boolean') {
			header('Location: ../interface/Paziente/gestioneCompitiPaziente.php');
		} else {
			throw new Exception($doCompOk);
		}
	} catch (Exception $e) {
		$_SESSION['eccComp']= $e->getMessage();
		header('Location: ../interface/Paziente/gestioneCompitiPaziente.php');
	}
}
