<?php
declare(strict_types=1);

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



define('TABLE_NAME', 'compito');

session_start();
$cfProf=$_SESSION['codiceFiscale'];





if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$action=$_POST['action'];
}

// questa action permette di correggere un compito
  if ($action=='correzione') {
  	$idComp = $_POST['id'];
  	$arrKey = ['id_compito'=>$idComp];
  	$comp = DatabaseInterface::selectQueryByAtt($arrKey, TABLE_NAME);
  	$temp=$comp->fetch_array();
  	$compitoComp= new Compito($temp[0], $temp[1], $temp[2], $temp[3], $temp[4], $temp[5], $temp[6], $temp[7], $temp[8]);

  	if (!isset($_POST['effettuato'])) {
  		$effettuato=0;
  	} else {
  		$effettuato=1;
  	}
  	$correzione = $_POST['correzione'];
  	$compitoComp->setCorrezione($correzione);
  	$compitoComp->setEffettuato($effettuato);
  	$isUpdate = DatabaseInterface::updateQueryById($compitoComp->getArray(), TABLE_NAME);

  	if ($isUpdate) {
  		header('Location: ../interface/Professionista/gestioneCompiti.php');
  	} else {
  		echo 'non corretto correttamente';
  	}

  } elseif

  //questa action permette di aggiungere un nuovo compito

  ($action=='addComp') {
	$data = $_POST['data'];
	$titolo = $_POST['titolo'];
	$descrizione = $_POST['descrizione'];
	$cfPaz = 'NSTFNC94M23H703G';
	$svolgimento='';
	$correzione='';


	$compitoComp=['data'=>$data, 'effettuato'=>'0', 'titolo'=>$titolo, 'descrizione'=>$descrizione, 'svolgimento'=>$svolgimento, 'correzione'=>$correzione, 'cf_prof'=>$cfProf, 'cf'=>$cfPaz];


	$compt = DatabaseInterface::insertQuery($compitoComp, TABLE_NAME);
	var_dump($compt);



	if ($compt) {
		header('Location: ../interface/Professionista/gestioneCompiti.php');
	} else {
		echo 'non aggiunto correttamente';
	}


} elseif

 //questa action permette al paziente di svolgere un compito
 
	($action='doComp') {
	$idComp = $_POST['id'];
	echo $idComp;
	$arrKey = ['id_compito'=>$idComp];
	$comp = DatabaseInterface::selectQueryByAtt($arrKey, TABLE_NAME);
	$temp=$comp->fetch_array();
	$compitoComp= new Compito($temp[0], $temp[1], $temp[2], $temp[3], $temp[4], $temp[5], $temp[6], $temp[7], $temp[8]);


	$svolgimento = $_POST['svolgimento'];

	echo $svolgimento;


	$compitoComp->setSvolgimento($svolgimento);
	var_dump($compitoComp);
	echo '<br>';

	$isUpdate = DatabaseInterface::updateQueryById($compitoComp->getArray(), TABLE_NAME);
	var_dump($isUpdate);

	if ($isUpdate) {
		header('Location: ../interface/Paziente/gestioneCompitiPaziente.php');
	} else {
		echo 'non svolto correttamente';
	}
}
