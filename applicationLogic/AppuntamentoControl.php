<?php

session_start();
include '../plugins/libArray/FunArray.php';
include '../storage/DatabaseInterface.php';
include '../storage/Appuntamento.php';
include 'AppuntamentoControlF.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$action = $_POST['action'];
} else {
	$action = $_GET['action'];
}

if ($_SESSION['tipo'] == 'professionista') {
	$cfProf = $_SESSION['codiceFiscale'];
} else {
	$cfPaz = $_SESSION['codiceFiscale'];
}

$_SESSION['erroreApp']='';

/*Questa action recupera tutti gli appuntamenti di un professionista recuperando per ognuno il nome dei pazienti.*/
if ($action == 'recoveryAll') {
	try {
		$arrKey = ['cf_prof' => $cfProf];
		$allAppProf = DatabaseInterface::selectQueryByAtt($arrKey, Appuntamento::$tableName);
		if ($allAppProf === false) {
			throw new Exception('recupero appuntamenti professionista fallita!');
		}
		$allObj = [];

		while ($row = $allAppProf->fetch_array()) {
			$arrKeyPaz = ['cf' => $row['cf']];
			$pazienteQuery = DatabaseInterface::selectQueryByAtt($arrKeyPaz, 'paziente');
			if ($pazienteQuery === false) {
				throw new Exception('recupero dei pazienti associati agli appuntamenti fallita!');
			}
			while ($rowP = $pazienteQuery->fetch_array()) {
				$paziente = $rowP['nome'] . ' ' . $rowP['cognome'];
			}
			$a[] = $row;
			$row['cf'] .= " - $paziente";
			$allObj[] = $row;
		}

		$_SESSION['appuntamenti'] = $a;
		echo json_encode($allObj);
	} catch (Exception $e) {
		$_SESSION['erroreApp'] = $e->getMessage();
		header('Location: ../interface/Professionista/calendario.php');
	}
}
/*Questa funzione recupera tutti gli appuntamenti di un paziente*/
elseif ($action == 'recoveryAllByPaz') {
	try {
		$arrKey = ['cf' => $cfPaz];
		$allAppPaz = DatabaseInterface::selectQueryByAtt($arrKey, Appuntamento::$tableName);
		if ($allAppPaz === false) {
			throw new Exception('recupero appuntamenti paziente fallita!');
		}
		$allObj = [];

		while ($row = $allAppPaz->fetch_array()) {
			$arrKeyProf = ['cf_prof' => $row['cf_prof']];
			$profQuery = DatabaseInterface::selectQueryByAtt($arrKeyProf, 'professionista');
			if ($profQuery === false) {
				throw new Exception('recupero dei professionisti associati agli appuntamenti fallita!');
			}
			while ($rowP = $profQuery->fetch_array()) {
				$prof = $rowP['nome'] . ' ' . $rowP['cognome'];
			}
			$a[] = $row;
			$row['cf_prof'] = "Dott. $prof";
			$allObj[] = $row;
		}
		echo json_encode($allObj);
	} catch (Exception $e) {
		$_SESSION['erroreApp'] = $e->getMessage();
		header('Location: ../interface/Paziente/calendario.php');
	}
}
/*Questa action aggiunge un nuovo appuntamento*/
elseif ($action == 'addApp') {
	try {
		$data = $_POST['data'];
		$ora = $_POST['ora'];
		$descrizione = $_POST['descrizione'];
		$cf = $_POST['codF'];
		$addOk = AppuntamentoControlF::addApp($data, $ora, $descrizione, $cfProf, $cf);
		if (gettype($addOk)=='boolean') {
			header('Location: ../interface/Professionista/calendario.php');
		} else {
			throw new Exception($addOk);
		}
	} catch (Exception $e) {
		$_SESSION['erroreApp'] = $e->getMessage();
		header('Location: ../interface/Professionista/calendario.php');
	}
}
/*Questa action cancella un appuntamento*/
elseif ($action == 'delApp') {
	$data = $_POST['data'];
	$ora = $_POST['ora'];
	$descrizione = $_POST['descrizione'];
	$cf = $_POST['codF'];
	$id = $_POST['id'];
	try {
		$delApp = new Appuntamento($id, $data, $ora, $descrizione, $cfProf, $cf);
		$ok = DatabaseInterface::deleteQuery($delApp->getArray(), Appuntamento::$tableName);
		if ($ok) {
			header('Location: ../interface/Professionista/calendario.php');
		} else {
			throw new Exception('Errore: Appuntamento non eliminato!');
		}
	} catch (Exception $e) {
		$_SESSION['erroreApp'] = $e->getMessage();
		header('Location: ../interface/Professionista/calendario.php');
	}
}
/*Questa action modifica un appuntamento*/
elseif ($action == 'modApp') {
	$id = $_POST['oldId'];

	$oldData = $_POST['oldData'];
	$oldOra = $_POST['oldOra'];
	$oldDescrizione = $_POST['oldDesc'];
	$oldCf = $_POST['oldCodF'];

	$data = $_POST['data'];
	$ora = $_POST['ora'];
	$descrizione = $_POST['descrizione'];
	$cf = $_POST['codF'];
	try {
		$modOk=AppuntamentoControlF::modApp($id, $data, $ora, $descrizione, $cfProf, $cf, $oldData, $oldOra, $oldDescrizione, $oldCf);
		if (gettype($modOk)=='boolean') {
			header('Location: ../interface/Professionista/calendario.php');
		} else {
			throw new Exception($modOk);
		}
	} catch (Exception $e) {
		$_SESSION['erroreApp'] = $e->getMessage();
		header('Location: ../interface/Professionista/calendario.php');
	}
}
/*Questa action cerca il codice fiscale del paziente di cui si sa nome e cognome*/
elseif ($action == 'searchCf') {
	$keyN = $_POST['keyN'];
	$keyC = $_POST['keyC'];
	$arrCol = ['nome', 'cognome', 'cf'];
	$arrAtt = ['nome'=>$keyN, 'cognome'=>$keyC];
	$pazient = [];
	$pazienteQuery = DatabaseInterface::selectDinamicQuery($arrCol, $arrAtt, 'paziente');

	while ($rowP = $pazienteQuery->fetch_array()) {
		$pazient[] = $rowP;
	}

	if (count($pazient) > 0) {
		echo json_encode($pazient);
	} else {
		$arrS = ['cf' => ''];
		echo json_encode($arrS);
	}
}
/*Questa action controlla se esiste un appuntamento con un determinato orario*/
elseif ($action == 'recoveryAppToHour') {
	$cfProf = $_POST['cf_prof'];
	$oraApp = $_POST['oraApp'];
	$dataApp = $_POST['dataApp'];
	$arrKey = ['cf_prof'=>$cfProf, 'data'=>$dataApp, 'ora'=>$oraApp];
	$arrCol = ['*'];
	$allAppProf = DatabaseInterface::selectDinamicQuery($arrCol, $arrKey, TABLE_NAME);
	if ($allAppProf->num_rows == 0) {
		echo true;
	} else {
		echo false;
	}
}
