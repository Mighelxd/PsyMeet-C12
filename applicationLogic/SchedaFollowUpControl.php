<?php
declare(strict_types=1);
/*
* SchedaFollowUpControl
* Questa Control fornisce tutti i metodi relativi alla scheda follow up
* Autore: Francesco Capone
* Versione: 0.2
* 2020 Copyright by PsyMeet - University of Salerno
*/
	include '../plugins/libArray/FunArray.php';
	include '../storage/DatabaseInterface.php';
	include '../storage/SchedaFollowUp.php';

	if (!$_SERVER['REQUEST_METHOD'] == 'POST') {
		header('Location: ../interface/Professionista/SchedaFollowUp.html');
		exit;
	} else {
		$id_scheda=$_POST['id_scheda'];
		$data=$_POST['data'];
		$ricadute=$_POST['ricadute'];
		$esiti_positivi=$_POST['esiti_positivi'];
		$id_terapia=$_POST['id_terapia'];
		$schedafollowup = new SchedaFollowUp($id_scheda, $data, $ricadute, $esiti_positivi, $id_terapia);
		$result = DatabaseInterface::insertQuery($schedafollowup, 'schedaFollowup');

		$recIdScheda = DatabaseInterface::selectQueryByAtt($schedafollowup, 'schedaFollowUp');
		while ($row = $recIdScheda->fetch_array()) {
			$idSchedaCorr = $row[0];
		}
		$ris = ['result'=>$result, 'idScheda'=>$idSchedaCorr];
		echo json_encode($ris);
	}

	if ($_POST['action'] == 'modificaFollowUp') {
		$id_scheda=$_POST['id_scheda'];
		$data=$_POST['data'];
		$ricadute=$_POST['ricadute'];
		$esiti_positivi=$_POST['esiti_positivi'];
		$id_terapia=$_POST['id_terapia'];

		$mod = ['id_scheda' => $id_scheda];
		$result = DatabaseInterface::selectQueryById($mod, 'schedaFollowUp');
		$mod = $result->fetch_array();
		$schedafollowup= new schedaFollowUp($mod[0], $mod[1], $mod[2], $mod[3], $mod[4]);

		if ($id_scheda != '') {
			$schedafollowup->setIdScheda($id_scheda);
		}

		if ($data != '') {
			$schedafollowup->setData($data);
		}

		if ($ricadute != '') {
			$schedafollowup->setRicadute($ricadute);
		}

		if ($esiti_positivi != '') {
			$schedafollowup->setEsitiPositivi($esiti_positivi);
		}

		if ($id_terapia != '') {
			$schedafollowup->setIdTerapia($id_terapia);
		}
		$result = DatabaseInterface::updateQueryById($schedafollowup->getArray(), 'schedaFollowUp');
	}
	  if ($result) {
	  	header('Location: ../interface/Professionista/SchedaFollowUp.php');
	  } else {
	  	echo 'la scheda non è stata aggiunta';
	  }
