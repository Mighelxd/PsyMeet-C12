<?php
/*
    * SeduteControl
    * Questa classe fornisce tutti i metodi per tutte le schede delle sedute e la videoconferenza
    * Autore: Marco Campione
    * Versione: 1.0
    * 2020 Copyright by PsyMeet - University of Salerno
*/

class SeduteControl
{
	public static function addSchedaFoc($data, $idTerapia)
	{
        /*
        * addSchedaFoc
        * data, idTerapia
        * Questo metodo permette di aggiungere una Scheda Assessment Focalizzato
        * In caso di successo il metodo restituisce true
        * In caso di errore il metodo restituisce l'eccezione
        * Autore:Simone D'Ambrosio
        * Versione: 1.0
        * 2020 Copyright by PsyMeet - University of Salerno
        */
		try {
			$numEp = '0';
			$data = str_replace('/', '-', $data);
			$data=date_create($data);
			$data = date_format($data, 'Y-m-d');
			$tipo = 'Scheda Assessment Focalizzato';
			$scheda = new SchedaAssessmentFocalizzato(null, $data, $numEp, $idTerapia, $tipo);
			$scheda = $scheda->getArray();
			$ok = DatabaseInterface::insertQuery($scheda, 'schedaassessmentfocalizzato');
			if ($ok) {
				$scheda = array_diff($scheda, ['']);
				$recIdScheda = DatabaseInterface::selectQueryByAtt($scheda, 'schedaassessmentfocalizzato');
				if ($recIdScheda->num_rows == 1) {
					$row = $recIdScheda->fetch_array();
					$idSchedaCorr = $row[0];
					$_SESSION['idSCorr'] = $idSchedaCorr;
					return true;
				} else {
					throw new Exception('Scheda non trovata!');
				}
			} else {
				throw new Exception('Errore: scheda non aggiunta!');
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}


	public static function addEpisodio($numEp, $analisi, $mA, $mB, $mC, $appunti, $idScheda)
	{
        /*
        * addEpisodio
        * numEp, analisi, mA, mB, mC, appunti, idScheda
        * Questo metodo permette di aggiungere un Episodio
        * In caso di successo il metodo restituisce true
        * In caso di errore il metodo restituisce l'eccezione
        * Autore:Marco Campione
        * Versione: 1.0
        * 2020 Copyright by PsyMeet - University of Salerno
        */
		try {
			$attEp = new Episodio(null, $numEp, $analisi, $mA, $mB, $mC, $appunti, $idScheda);
			$insOk = DatabaseInterface::insertQuery($attEp->getArray(), 'episodio');
			if ($insOk) {
				$key = ['id_scheda'=>$idScheda];
				$recScheda = DatabaseInterface::selectQueryById($key, 'schedaassessmentfocalizzato');
				if ($recScheda->num_rows == 1) {
					$row = $recScheda->fetch_array();
					$scheda = new SchedaAssessmentFocalizzato($row[0], $row[1], $row[2], $row[3], $row[4]);
					$newNumEp = $scheda->getNEpisodi() + 1;
					$scheda->setNEpisodi($newNumEp);
					$updateScheda = DatabaseInterface::updateQueryById($scheda->getArray(), 'schedaassessmentfocalizzato');
					if ($updateScheda) {
						$_SESSION['idSCorr'] = $idScheda;
						return true;
					} else {
						throw new Exception('Errore: numero episodi in scheda non aggiornato!');
					}
				} else {
					throw new Exception('Scheda non trovata!');
				}
			} else {
				throw new Exception('Errore: episodio non inserito!');
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}


	public static function modEpisodio($numEp, $analisi, $mA, $mB, $mC, $appunti, $idSchedaCorr)
	{
        /*
        * modEpisodio
        * numEp, analisi, mA, mB, mC, appunti, idSchedaCorr
        * Questo metodo permette di modificare un Episodio
        * In caso di successo il metodo restituisce true
        * In caso di errore il metodo restituisce l'eccezione
        * Autore:Marco Campione
        * Versione: 1.0
        * 2020 Copyright by PsyMeet - University of Salerno
        */
		try {
			$attRec=['numero'=>$numEp, 'id_scheda'=>$idSchedaCorr];
			$recEp=DatabaseInterface::selectQueryByAtt($attRec, 'episodio');
			if ($recEp->num_rows == 1) {
				$row=$recEp->fetch_array();
				$ep = new Episodio($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]);
				$ep->setAnalisiFun($analisi);
				$ep->setMA($mA);
				$ep->setMB($mB);
				$ep->setMC($mC);
				$ep->setAppunti($appunti);

				$upd = DatabaseInterface::updateQueryById($ep->getArray(), 'episodio');
				if ($upd) {
					return true;
				} else {
					throw new Exception('Errore: episodio non modificato!');
				}
			} else {
				throw new Exception('Scheda non trovata!');
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}


	public static function recuperaEpisodi($allSchede)
	{
	    /*
        * recuperaEpisodi
        * allSchede
        * Questo metodo permette di recuperare gli Episodi
        * In caso di successo il metodo restituisce la Scheda con Episodi
        * In caso di errore il metodo restituisce l'eccezione
        * Autore:Marco Campione
        * Versione: 1.0
        * 2020 Copyright by PsyMeet - University of Salerno
        */
		try {
			$schedaConEpisodi = [];

			for ($i = 0; $i < count($allSchede); $i++) {
				$scheda = [];
				$episodi = [];
				$scheda[] = $allSchede[$i];
				$attEp = ['id_scheda' => $allSchede[$i]->getIdScheda()];
				$datiEpisodi = DatabaseInterface::selectQueryByAtt($attEp, Episodio::$tableName);
				while ($rowEp = $datiEpisodi->fetch_array()) {
					$ep = new episodio($rowEp[0], $rowEp[1], $rowEp[2], $rowEp[3], $rowEp[4], $rowEp[5], $rowEp[6], $rowEp[7]);
					$episodi[] = $ep;
				}
				$scheda[] = $episodi;
				$schedaConEpisodi[] = $scheda;
			}
			return $schedaConEpisodi;
		} catch (Exception $e) {
			$_SESSION['eccep']=$e->getMessage();
			return [];
		}
	}


	///////////////////////////////////////////////Generalizzato

	public static function addSchGen(
		$dataCorr,
		$aspPosAut,
		$aspNegAut,
		$aspPosCog,
		$aspNegCog,
		$aspPosSM,
		$aspNegSM,
		$aspPosSo,
		$aspNegSo,
		$idTerCorr,
		$tipo
	) {
	    /*
        * addSchGen
        * dataCorr, aspPosAut, aspNegAut, aspPosCog, aspNegCog, aspPosSM, aspNegSM, aspPosSo, aspNegSo, idTerCorr, tipo
        * Questo metodo permette di aggiungere una Scheda Assessment Generalizzato
        * In caso di successo il metodo restituisce true
        * In caso di errore il metodo restituisce l'eccezione
        * Autore:Simone D'Ambrosio
        * Versione: 1.0
        * 2020 Copyright by PsyMeet - University of Salerno
        */
		try {
			$att = new SchedaAssessmentGeneralizzato(null, $dataCorr, $aspPosAut, $aspNegAut, $aspPosCog, $aspNegCog, $aspPosSM, $aspNegSM, $aspPosSo, $aspNegSo, $idTerCorr, $tipo);
			$ok = DatabaseInterface::insertQuery($att->getArray(), SchedaAssessmentGeneralizzato::$tableName);
			if ($ok) {
				return true;
			} else {
				throw new Exception('Errore: scheda non aggiunta!');
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}


	public static function modSchGen(
		$aspPosAut,
		$aspNegAut,
		$aspPosCog,
		$aspNegCog,
		$aspPosSM,
		$aspNegSM,
		$aspPosSo,
		$aspNegSo,
		$idTerCorr
	) {
	    /*
        * modSchGen
        * aspPosAut, aspNegAut, aspPosCog, aspNegCog, aspPosSM, aspNegSM, aspPosSo, aspNegSo, idTerCorr
        * Questo metodo permette di modificare una Scheda Assessment Generalizzato
        * In caso di successo il metodo restituisce true
        * In caso di errore il metodo restituisce l'eccezione
        * Autore:Simone D'Ambrosio
        * Versione: 1.0
        * 2020 Copyright by PsyMeet - University of Salerno
        */
		try {
			$key = ['id_terapia'=>$idTerCorr];

			$recSchGen = DatabaseInterface::selectQueryById($key, SchedaAssessmentGeneralizzato::$tableName);
			if ($recSchGen->num_rows == 1) {
				$row = $recSchGen->fetch_array();
				$schGen = new SchedaAssessmentGeneralizzato($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11]);
				$schGen->setAutoregPositivi($aspPosAut);
				$schGen->setAutoregNegativi($aspNegAut);
				$schGen->setCognitivePositivi($aspPosCog);
				$schGen->setCognitiveNegativi($aspNegCog);
				$schGen->setSelfManagementPositivi($aspPosSM);
				$schGen->setSelfManagementNegativi($aspNegSM);
				$schGen->setSocialiPositivi($aspPosSo);
				$schGen->setSocialiNegativi($aspNegSo);

				$upd=DatabaseInterface::updateQueryById($schGen->getArray(), SchedaAssessmentGeneralizzato::$tableName);

				if ($upd) {
					return true;
				} else {
					throw new Exception('Errore: scheda non modificata!');
				}
			} else {
				throw new Exception('scheda non trovata');
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}


	/////////////////////////////////////////////////SPQ

	public static function addSPQ($data, $defP, $aspP, $mot, $obt, $defC, $idTerCorr, $tipo)
	{
		try {
			$att = new SchedaPrimoColloquio(null, $data, $defP, $aspP, $mot, $obt, $defC, $idTerCorr, $tipo);
			$ok = DatabaseInterface::insertQuery($att->getArray(), SchedaPrimoColloquio::$tableName);
			if ($ok) {
				return true;
			} else {
				throw new Exception('Errore: scheda non aggiunta!');
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}


	public static function modSPQ($defP, $aspP, $mot, $obt, $defC, $idTerCorr)
	{
		try {
			$key=['id_terapia'=>$idTerCorr];
			$rec=DatabaseInterface::selectQueryById($key, SchedaPrimoColloquio::$tableName);
			if ($rec->num_rows==1) {
				$row = $rec->fetch_array();
				$sPq = new SchedaPrimoColloquio($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8]);
				$sPq->setProblema($defP);
				$sPq->setAspettative($aspP);
				$sPq->setMotivazione($mot);
				$sPq->setObiettivi($obt);
				$sPq->setCambiamento($defC);
				$upd = DatabaseInterface::updateQueryById($sPq->getArray(), SchedaPrimoColloquio::$tableName);
				if ($upd) {
					return true;
				} else {
					throw new Exception('Errore: scheda non modificata!');
				}
			} else {
				throw new Exception('Scheda non trovata!');
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}


	/////////////////////////////////////////////////////follow up

	public static function addSFU($data, $ric, $esPos, $idTerCorr, $tipo)
	{
		try {
			$att = new SchedaFollowUp(null, $data, $ric, $esPos, $idTerCorr, $tipo);

			$ok = DatabaseInterface::insertQuery($att->getArray(), SchedaFollowUp::$tableName);
			if ($ok) {
				return true;
			} else {
				throw new Exception('Errore: scheda non aggiunta!');
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}


	public static function modSFU($ric, $esPos, $idTerCorr)
	{
		try {
			$key=['id_terapia'=>$idTerCorr];
			$rec=DatabaseInterface::selectQueryById($key, SchedaFollowUp::$tableName);
			if ($rec->num_rows==1) {
				$row = $rec->fetch_array();
				$sFu = new SchedaFollowUp($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
				$sFu->setRicadute($ric);
				$sFu->setEsitiPositivi($esPos);
				$upd = DatabaseInterface::updateQueryById($sFu->getArray(), SchedaFollowUp::$tableName);
				if ($upd) {
					return true;
				} else {
					throw new Exception('Errore: scheda non modificata!');
				}
			} else {
				throw new Exception('Scheda non trovata');
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}


	///////////////////////////////eziologico
	public static function addSME($data, $fc, $fp, $fm, $rf, $idTerCorr, $tipo)
	{
		try {
			$mEz = new SchedaModelloEziologico(null, $data, $fc, $fp, $fm, $rf, $idTerCorr, $tipo);

			$ok = DatabaseInterface::insertQuery($mEz->getArray(), SchedaModelloEziologico::$tableName);
			if ($ok) {
				return true;
			} else {
				throw new Exception('Errore: scheda non aggiunta!');
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}


	public static function modSME($fc, $fp, $fm, $rf, $idTerCorr)
	{
		try {
			$key= ['id_terapia'=>$idTerCorr];
			$rec = DatabaseInterface::selectQueryById($key, SchedaModelloEziologico::$tableName);
			if ($rec->num_rows==1) {
				$row = $rec->fetch_array();
				$scME = new SchedaModelloEziologico($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]);
				$scME->setFattoriCausativi($fc);
				$scME->setFattoriMantenimento($fm);
				$scME->setFattoriPrecipitanti($fp);
				$scME->setRelazioneFinale($rf);

				$upd = DatabaseInterface::updateQueryById($scME->getArray(), SchedaModelloEziologico::$tableName);
				if ($upd) {
					return true;
				} else {
					throw new Exception('Errore: scheda non modificata!');
				}
			} else {
				throw new Exception('Scheda non trovato');
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
}
