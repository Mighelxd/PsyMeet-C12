<?php


include '..\plugins\libArray\FunArray.php';
include '../storage/DatabaseInterface.php';
include '../storage/SchedaAssessmentFocalizzato.php';
include '../storage/Episodio.php';
include '../storage/SchedaAssessmentGeneralizzato.php';
include '../storage/SchedaPrimoColloquio.php';
include '../storage/SchedaFollowUp.php';
include '../storage/SchedaModelloEziologico.php';
include '../storage/Professionista.php';
include '../storage/Paziente.php';
include '../storage/scelta.php';
include '../storage/Fattura.php';
include 'PacchettoControl.php';
include 'PazienteControl.php';
include 'SeduteControl.php';
session_start();
if (isset($_POST['action'])) {
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$action = $_POST['action'];
	} else {
		$action = $_GET['action'];
	}
}

$_SESSION['eccep']='';
$_SESSION['eccsme']='';
$_SESSION['eccspq']='';
$_SESSION['eccgen']='';
$_SESSION['eccFU']='';
if ($action == 'saveScheda') {
	try {
		$data = $_POST['data'];
		$idTerapia = $_POST['idTerapia'];
		$addOkFoc=SeduteControl::addSchedaFoc($data, $idTerapia);
		if (!$addOkFoc) {
			throw new Exception($addOkFoc);
		} else {
			$ris = ['ok'=>$addOkFoc, 'idScheda'=>$_SESSION['idSCorr']];
			echo json_encode($ris);
		}
	} catch (Exception $e) {
		$_SESSION['eccep']=$e->getMessage();
		header('Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php');
	}
} elseif ($action == 'delScheda') {
	try {
		$idScheda = $_SESSION['idSCorr'];
		$key = ['id_scheda'=>$idScheda];
		$ok = DatabaseInterface::deleteQuery($key, 'schedaassessmentfocalizzato');
		if ($ok) {
			$_SESSION['idSCorr'] = '';
			header('Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php');
		} else {
			throw new Exception('Errore: scheda non eliminata!');
		}
	} catch (Exception $e) {
		$_SESSION['eccep']=$e->getMessage();
		header('Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php');
	}
} elseif ($action == 'recoveryScheda') {
	try {
		$idScheda = $_POST['idScheda'];
		$key = ['id_scheda'=>$idScheda];

		$recScheda = DatabaseInterface::selectQueryById($key, 'schedaassessmentfocalizzato');
		while ($row = $recScheda->fetch_array()) {
			$scheda = new SchedaAssessmentFocalizzato($row[0], $row[1], $row[2], $row[3], $row[4]);
		}
		echo json_encode($scheda->getArray());
	} catch (Exception $e) {
		$_SESSION['eccep']=$e->getMessage();
		header('Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php');
	}

} elseif ($action == 'addEpisodio') {
	try {
		$numEp = $_POST['numero'];
		$analisi = $_POST['analisi'];
		$mA = $_POST['a'];
		$mB = $_POST['b'];
		$mC = $_POST['c'];
		$appunti = $_POST['appunti'];
		if (isset($_POST['hIdS'])) {
			$idScheda = $_POST['hIdS'];
		} else {
			$idScheda = $_SESSION['idSCorr'];
		}
		$addok = SeduteControl::addEpisodio($numEp, $analisi, $mA, $mB, $mC, $appunti, $idScheda);
		if (gettype($addok)=='boolean') {
			header('Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php');
		} else {
			throw new Exception($addok);
		}
	} catch (Exception $e) {
		$_SESSION['eccep']=$e->getMessage();
		header('Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php');
	}
} elseif ($action == 'delEpisodio') {
	try {
		$numEp = $_POST['numero'];
		$analisi = $_POST['analisi'];
		$mA = $_POST['a'];
		$mB = $_POST['b'];
		$mC = $_POST['c'];
		$appunti = $_POST['appunti'];
		if (isset($_SESSION['idSCorr'])) {
			$idSchedaCorr = $_SESSION['idSCorr'];
		}

		$attEp = new Episodio(null, $numEp, $analisi, $mA, $mB, $mC, $appunti, $idSchedaCorr);
		$attEp = $attEp->getArray();
		$attEp = array_diff($attEp, ['']);
		$ok = DatabaseInterface::deleteQuery($attEp, 'episodio');
		if ($ok) {
			$key = ['id_scheda'=>$idSchedaCorr];
			$recScheda = DatabaseInterface::selectQueryById($key, 'schedaassessmentfocalizzato');
			while ($row = $recScheda->fetch_array()) {
				$scheda = new SchedaAssessmentFocalizzato($row[0], $row[1], $row[2], $row[3], $row[4]);
			}
			$oldNumEpForSch = $scheda->getNEpisodi();
			$newNumEp = $oldNumEpForSch - 1;
			$scheda->setNEpisodi($newNumEp);
			$updateScheda = DatabaseInterface::updateQueryById($scheda->getArray(), 'schedaassessmentfocalizzato');
			if ($updateScheda) {
				$att=['id_scheda'=>$idSchedaCorr];
				$allEpForSch = DatabaseInterface::selectQueryByAtt($att, 'episodio');
				while ($row = $allEpForSch->fetch_array()) {
					$listEp[] = new Episodio($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]);
				}
				$posDaScalare = $oldNumEpForSch - (int) $numEp;
				$startIndex = $newNumEp - $posDaScalare;
				for ($i=$startIndex; $i<count($listEp); $i++) {
					$oldNumEp = $listEp[$i]->getNum();
					$listEp[$i]->setNum($oldNumEp - 1);
					$up=DatabaseInterface::updateQueryById($listEp[$i]->getArray(), 'episodio');
					if (!$up) {
						throw new Exception('Errore: numero episodio in episodio non aggiornato!');
					}
				}
				header('Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php');
			} else {
				throw new Exception('Errore: numero episodio in scheda non modificato!');
			}
		} else {
			throw new Exception('Errore: episodio non eliminato!');
		}
	} catch (Exception $e) {
		$_SESSION['eccep']=$e->getMessage();
		header('Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php');
	}
} elseif ($action == 'modEpisodio') {
	try {
		$numEp = $_POST['numero'];
		$analisi = $_POST['analisi'];
		$mA = $_POST['a'];
		$mB = $_POST['b'];
		$mC = $_POST['c'];
		$appunti = $_POST['appunti'];
		if (isset($_SESSION['idSCorr'])) {
			$idSchedaCorr = $_SESSION['idSCorr'];
		}

		$modok = SeduteControl::modEpisodio($numEp, $analisi, $mA, $mB, $mC, $appunti, $idSchedaCorr);

		if (gettype($modok)=='boolean') {
			header('Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php');
		} else {
			throw new Exception($modok);
		}
	} catch (Exception $e) {
		$_SESSION['eccep']=$e->getMessage();
		header('Location: ../interface/Professionista/SchedaAssessmentFocalizzato.php');
	}
}
/////////////////////////////////////////////////////////////Generalizzato
elseif ($action =='addSchGen') {
	try {
		$aspPosAut = $_POST['aspPosAut'];
		$aspNegAut = $_POST['aspNegAut'];
		$aspPosCog = $_POST['aspPosCog'];
		$aspNegCog = $_POST['aspNegCog'];
		$aspPosSM = $_POST['aspPosSM'];
		$aspNegSM = $_POST['aspNegSM'];
		$aspPosSo = $_POST['aspPosSo'];
		$aspNegSo = $_POST['aspNegSo'];
		$idTerCorr = $_SESSION['idTerCorr'];
		$tipo = 'Scheda Assessment Generalizzato';
		$dataCorr = date('Y-m-d');
		$addOkGen = SeduteControl::addSchGen($dataCorr, $aspPosAut, $aspNegAut, $aspPosCog, $aspNegCog, $aspPosSM, $aspNegSM, $aspPosSo, $aspNegSo, $idTerCorr, $tipo);
		if (gettype($addOkGen)=='boolean') {
			header('Location: ../interface/Professionista/SchedaAssessmentGeneralizzato.php');
		} else {
			throw new Exception($addOkGen);
		}
	} catch (Exception $e) {
		$_SESSION['eccgen']=$e->getMessage();
		header('Location: ../interface/Professionista/SchedaAssessmentGeneralizzato.php');
	}
} elseif ($action =='delSchGen') {
	try {
		$idTerCorr = $_SESSION['idTerCorr'];
		$key = ['id_terapia'=>$idTerCorr];
		$ok=DatabaseInterface::deleteQuery($key, SchedaAssessmentGeneralizzato::$tableName);
		if ($ok) {
			header('Location: ../interface/Professionista/SchedaAssessmentGeneralizzato.php');
		} else {
			throw new Exception('Errore: scheda non eliminata!');
		}
	} catch (Exception $e) {
		$_SESSION['eccgen']=$e->getMessage();
		header('Location: ../interface/Professionista/SchedaAssessmentGeneralizzato.php');
	}
} elseif ($action == 'modSchGen') {
	try {
		$aspPosAut = $_POST['aspPosAut'];
		$aspNegAut = $_POST['aspNegAut'];
		$aspPosCog = $_POST['aspPosCog'];
		$aspNegCog = $_POST['aspNegCog'];
		$aspPosSM = $_POST['aspPosSM'];
		$aspNegSM = $_POST['aspNegSM'];
		$aspPosSo = $_POST['aspPosSo'];
		$aspNegSo = $_POST['aspNegSo'];
		$idTerCorr = $_SESSION['idTerCorr'];

		$modGenOk=SeduteControl::modSchGen($aspPosAut, $aspNegAut, $aspPosCog, $aspNegCog, $aspPosSM, $aspNegSM, $aspPosSo, $aspNegSo, $idTerCorr);

		if (gettype($modGenOk)=='boolean') {
			header('Location: ../interface/Professionista/SchedaAssessmentGeneralizzato.php');
		} else {
			throw new Exception($modGenOk);
		}
	} catch (Exception $e) {
		$_SESSION['eccgen']=$e->getMessage();
		header('Location: ../interface/Professionista/SchedaAssessmentGeneralizzato.php');
	}
}
/////////////////////////////////////////////////////////////SPQ
elseif ($action == 'addSPQ') {
	try {
		$data = date('Y/m/d');
		$defP = $_POST['defP'];
		$aspP = $_POST['aspP'];
		$mot = $_POST['mot'];
		$obt = $_POST['obt'];
		$defC = $_POST['defC'];
		$tipo= 'Scheda Primo Colloquio';
		$idTerCorr = $_SESSION['idTerCorr'];

		$addOkSpq=SeduteControl::addSPQ($data, $defP, $aspP, $mot, $obt, $defC, $idTerCorr, $tipo);

		if (gettype($addOkSpq)=='boolean') {
			header('Location: ../interface/Professionista/SchedaPrimoColloquio.php');
		} else {
			throw new Exception($addOkSpq);
		}
	} catch (Exception $e) {
		$_SESSION['eccspq']=$e->getMessage();
		header('Location: ../interface/Professionista/SchedaPrimoColloquio.php');
	}
} elseif ($action == 'modSPQ') {
	try {
		$defP = $_POST['defP'];
		$aspP = $_POST['aspP'];
		$mot = $_POST['mot'];
		$obt = $_POST['obt'];
		$defC = $_POST['defC'];
		$tipo= 'Scheda Primo Colloquio';
		$idTerCorr = $_SESSION['idTerCorr'];

		$modOkSpq= SeduteControl::modSPQ($defP, $aspP, $mot, $obt, $defC, $idTerCorr);

		if (gettype($modOkSpq)=='boolean') {
			header('Location: ../interface/Professionista/SchedaPrimoColloquio.php');
		} else {
			throw new Exception($modOkSpq);
		}
	} catch (Exception $e) {
		$_SESSION['eccspq']=$e->getMessage();
		header('Location: ../interface/Professionista/SchedaPrimoColloquio.php');
	}
} elseif ($action == 'delSPQ') {
	try {
		$idTerCorr = $_SESSION['idTerCorr'];

		$key=['id_terapia'=>$idTerCorr];
		$ok=DatabaseInterface::deleteQuery($key, SchedaPrimoColloquio::$tableName);
		if ($ok) {
			header('Location: ../interface/Professionista/SchedaPrimoColloquio.php');
		} else {
			throw new Exception('Errore: scheda non eliminata!');
		}
	} catch (Exception $e) {
		$_SESSION['eccspq']=$e->getMessage();
		header('Location: ../interface/Professionista/SchedaPrimoColloquio.php');
	}
}
/////////////////////////////////////////////Follow up
elseif ($action == 'addSFU') {
	try {
		$data = date('Y-m-d');
		$ric = $_POST['ric'];
		$esPos = $_POST['esPos'];
		$tipo= 'Scheda Follow Up';
		$idTerCorr = $_SESSION['idTerCorr'];

		$addSfuOk=SeduteControl::addSFU($data, $ric, $esPos, $idTerCorr, $tipo);
		if (gettype($addSfuOk)=='boolean') {
			header('Location: ../interface/Professionista/SchedaFollowUp.php');
		} else {
			throw new Exception($addSfuOk);
		}
	} catch (Exception $e) {
		$_SESSION['eccFU']=$e->getMessage();
		header('Location: ../interface/Professionista/SchedaFollowUp.php');
	}
} elseif ($action == 'modSFU') {
	try {
		$ric = $_POST['ric'];
		$esPos = $_POST['esPos'];
		$idTerCorr = $_SESSION['idTerCorr'];

		$okModFw=SeduteControl::modSFU($ric, $esPos, $idTerCorr);
		if (gettype($okModFw) == 'boolean') {
			header('Location: ../interface/Professionista/SchedaFollowUp.php');
		} else {
			throw new Exception($okModFw);
		}
	} catch (Exception $e) {
		$_SESSION['eccFU']=$e->getMessage();
		header('Location: ../interface/Professionista/SchedaFollowUp.php');
	}
} elseif ($action == 'delSFU') {
	try {
		$idTerCorr = $_SESSION['idTerCorr'];

		$key=['id_terapia'=>$idTerCorr];
		$ok=DatabaseInterface::deleteQuery($key, SchedaFollowUp::$tableName);
		if ($ok) {
			header('Location: ../interface/Professionista/SchedaFollowUp.php');
		} else {
			throw new Exception('Errore: scheda non eliminata!');
		}
	} catch (Exception $e) {
		$_SESSION['eccFU']=$e->getMessage();
		header('Location: ../interface/Professionista/SchedaFollowUp.php');
	}
}
/////////////////////////////////////////////////////////Scheda modello eziologico
elseif ($action == 'addSME') {
	try {
		$data = date('Y-m-d');
		$idTerCorr = $_SESSION['idTerCorr'];
		$tipo = 'Scheda Modello Eziologico';
		$fc = $_POST['fc'];
		$fm = $_POST['fm'];
		$fp = $_POST['fp'];
		$rf = $_POST['rf'];

		$addOkSme=SeduteControl::addSME($data, $fc, $fp, $fm, $rf, $idTerCorr, $tipo);

		if (gettype($addOkSme)=='boolean') {
			header('Location: ../interface/Professionista/SchedaModelloEziologico.php');
		} else {
			throw new Exception($addOkSme);
		}
	} catch (Exception $e) {
		$_SESSION['eccsme']=$e->getMessage();
		header('Location: ../interface/Professionista/SchedaModelloEziologico.php');
	}
} elseif ($action == 'modSME') {
	try {
		$idTerCorr = $_SESSION['idTerCorr'];
		$fc = $_POST['fc'];
		$fm = $_POST['fm'];
		$fp = $_POST['fp'];
		$rf = $_POST['rf'];

		echo $fp;

		$modSmeOk=SeduteControl::modSME($fc, $fp, $fm, $rf, $idTerCorr);
		if (gettype($modSmeOk)=='boolean') {
			header('Location: ../interface/Professionista/SchedaModelloEziologico.php');
		} else {
			throw new Exception($modSmeOk);
		}
	} catch (Exception $e) {
		$_SESSION['eccsme']=$e->getMessage();
		header('Location: ../interface/Professionista/SchedaModelloEziologico.php');
	}
} elseif ($action == 'delSME') {
	try {
		$idTerCorr = $_SESSION['idTerCorr'];
		$key=['id_terapia'=>$idTerCorr];
		$ok=DatabaseInterface::deleteQuery($key, SchedaModelloEziologico::$tableName);
		if ($ok) {
			header('Location: ../interface/Professionista/SchedaModelloEziologico.php');
		} else {
			throw new Exception('Errore: scheda non eliminata!');
		}
	} catch (Exception $e) {
		$_SESSION['eccsme']=$e->getMessage();
		header('Location: ../interface/Professionista/SchedaModelloEziologico.php');
	}
}
//////////////////////////////////////////////////////////////////////Videoconferenza
if ($_POST['action']=='avvia' && isset($_POST['codiceFiscale'])) {
	//session_start();
	if (!isset($_SESSION['codiceFiscale']) || $_SESSION['tipo']!='professionista') {
		echo json_encode(['esito'=>false]);
		exit();
	}
	$cf=$_SESSION['codiceFiscale'];
	if (!isset($_POST['codiceFiscale'])) {
		echo json_encode(['esito'=>false]);
		header('Location: ../interface/indexProfessionista.php');
		exit();
	}
	$cfpaz=$_POST['codiceFiscale'];
	$resultp=DatabaseInterface::selectQueryById(['cf' => $cfpaz], Paziente::$tableName);
	if ($resultp->num_rows!=1) {
		echo json_encode(['esito'=>false]);
		exit();
	}
	try {
		$resultp=$resultp->fetch_array();
		$paziente= new Paziente($resultp['cf'], $resultp['nome'], $resultp['cognome'], $resultp['data_nascita'], $resultp['email'], $resultp['telefono'], $resultp['passwor'], $resultp['indirizzo'], $resultp['istruzione'], $resultp['lavoro'], $resultp['difficol_cura'], $resultp['foto_profilo_paz'], $resultp['videochiamata']);
		$resultp=null;
		$_SESSION['paziente']=$paziente;
		$result=DatabaseInterface::selectQueryById(['cf_prof'=> $cf], Professionista::$tableName);
		$result=$result->fetch_array();
		$professionista= new Professionista($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $result[11], $result[12], $result[13], $result[14], $result[15], $result[16], $result[17]);
		$_SESSION['professionista']=$professionista;
		echo json_encode(['esito'=>true]);
	} catch (Exception $e) {
		$_SESSION['eccezioni']=$e->getMessage();
		echo json_encode(['esito'=>false, 'errore'=>$e->getMessage()]);
	}
} elseif ($_POST['action']=='avvia') {
	//session_start();
	$paziente=$_SESSION['paziente'];
	$paziente->setVideo(1);
	$result=DatabaseInterface::updateQueryById(['cf'=>$paziente->getCf(), 'videochiamata' => $paziente->getVideo()], Paziente::$tableName);
	if ($result) {
		echo json_encode(['esito'=>true]);
		exit();
	} else {
		echo json_encode(['esito'=>false, 'errore'=>'errore update']);
	}
	echo json_encode(['esito'=>true]);
} elseif ($_POST['action']=='termina') {
	//session_start();
	$paziente=$_SESSION['paziente'];
	$paziente->setVideo(0);
	$fattura=PacchettoControl::getFatturaByPazProf($paziente->getCf(), $_SESSION['codiceFiscale']);
	DatabaseInterface::updateQueryById(['id_fattura'=>$fattura->getIdFattura(), 'n_sedute_rim'=>$fattura->getNSeduteRim()-1], Fattura::$tableName);
	$result=DatabaseInterface::updateQueryById(['cf'=>$paziente->getCf(), 'videochiamata' => $paziente->getVideo()], Paziente::$tableName);
	if ($result) {
		echo json_encode(['esito'=>true]);
		exit();
	} else {
		echo json_encode(['esito'=>false, 'errore'=>'errore update']);
	}
	echo json_encode(['esito'=>true]);
} elseif ($_POST['action']=='checkChiamata') {
	//session_start();
	$paziente=PazienteControl::getPaz($_SESSION['codiceFiscale']);
	if ($paziente->getVideo()) {
		echo json_encode(['esito'=>true]);
		exit();
	} else {
		echo json_encode(['esito'=>false]);
		exit();
	}
}
