<?php

/*
     * AreaInformativaControl
     * Questa classe contiene le informazioni relative all'oggetto Professionista
     * Autore: D'Avino Michele
     * Versione: 1.0
     * 2020 Copyright by PsyMeet - University of Salerno
     */

class AreaInformativaControl
{
    /*
     * saveProf
     * Parametri: codice_fiscale, nome, cognome, data_nascita, email, telefono, cellulare, password, indirizzo_studio, esperienze, pubblicazioni, titolo_studio, n_iscrizione_albo, p_iva, pec, specializzazione, polizza_rc, immagine
     * Questo metodo serve a salvare un professionista nel Database
     * ValoreDiRitorno: In caso di successo ritorna true altrimenti ritorna il messaggio di errore
     * Autore: D'Avino Michele
     * Versione: 1.0
     * 2020 Copyright by PsyMeet - University of Salerno
     */
	public static function saveProf(
		$codice_fiscale,
		$nome,
		$cognome,
		$data_nascita,
		$email,
		$telefono,
		$cellulare,
		$password,
		$indirizzo_studio,
		$esperienze,
		$pubblicazioni,
		$titolo_studio,
		$n_iscrizione_albo,
		$p_iva,
		$pec,
		$specializzazione,
		$polizza_rc,
		$immagine
	) {
		try {
			$professionista=new Professionista($codice_fiscale, $nome, $cognome, $data_nascita, $email, $telefono, $cellulare, $password, $indirizzo_studio, $esperienze, $pubblicazioni, $titolo_studio, $n_iscrizione_albo, $p_iva, $pec, $specializzazione, $polizza_rc, $immagine);
			$prof = self::getProf($codice_fiscale);
			if (isset($select)) {
				throw new Exception('Codice fiscale già presente');
			}
			$select = DatabaseInterface::selectQueryByAtt(['email' => $professionista->getEmail()], Professionista::$tableName);
			if (mysqli_num_rows($select)!=0) {
				throw new Exception('Email già presente.');
			}
			$result = DatabaseInterface::insertQuery($professionista->getArray(), Professionista::$tableName);
			return $result;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}

    /*
     * savePaz
     * Parametri: codiceFiscale, nome, cognome, dataNascita, email, telefono, password, indirizzo, istruzione, lavoro, diffCura, immagine
     * Questo metodo serve a salvare un paziente nel Database
     * ValoreDiRitorno: In caso di successo ritorna true altrimenti ritorna il messaggio di errore
     * Autore: D'Avino Michele
     * Versione: 1.0
     * 2020 Copyright by PsyMeet - University of Salerno
     */
	public static function savePaz(
		$codiceFiscale,
		$nome,
		$cognome,
		$dataNascita,
		$email,
		$telefono,
		$password,
		$indirizzo,
		$istruzione,
		$lavoro,
		$diffCura,
		$immagine
	) {
		try {
			$paziente= new Paziente($codiceFiscale, $nome, $cognome, $dataNascita, $email, $telefono, $password, $indirizzo, $istruzione, $lavoro, $diffCura, $immagine, 0);
			$select = DatabaseInterface::selectQueryById($paziente->getArray(), Paziente::$tableName);
			if ($select->num_rows!=0) {
				throw new Exception('Codice fiscale già presente');
			}
			$select = DatabaseInterface::selectQueryByAtt(['email' => $paziente->getEmail()], Paziente::$tableName);
			if ($select->num_rows!=0) {
				throw new Exception('Email già presente.');
			}
			$result = DatabaseInterface::insertQuery($paziente->getArray(), Paziente::$tableName);
		} catch (Exception $e) {
			return $e->getMessage();
		}
		return $result;
	}

    /*
     * recuperaProfessionisti
     * Parametri: //
     * Questo metodo serve a recuperare tutti i professionisti dal Database
     * ValoreDiRitorno: In caso di successo ritorna un array di professionisti altrimenti ritorna null
     * Autore: D'Avino Michele
     * Versione: 1.0
     * 2020 Copyright by PsyMeet - University of Salerno
     */
	public static function recuperaProfessionisti()
	{
		try {
			$allProf = DatabaseInterface::selectAllQuery('professionista');
			$arrProf = null;

			while ($row = $allProf->fetch_array()) {
				$prof = new professionista($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[14], $row[15], $row[16], $row[17]);
				$arrProf[] = $prof;
			}
			return $arrProf;
		} catch (Exception $e) {
			$_SESSION['eccareaprof'] = $e->getMessage();
			return null;
		}
	}

    /*
     * getProf
     * Parametri: cfProf
     * Questo metodo serve a recuperare un professionista dal Database tramite il suo codice fiscale
     * ValoreDiRitorno: In caso di successo ritorna il professionista altrimenti ritorna null
     * Autore: D'Avino Michele
     * Versione: 1.0
     * 2020 Copyright by PsyMeet - University of Salerno
     */
	public static function getProf($cfProf)
	{
		try {
			$arr = ['cf_prof' => $cfProf];
			$result = DatabaseInterface::selectQueryById($arr, 'professionista');
			$arr = $result->fetch_array();
			$prof = new Professionista($arr[0], $arr[1], $arr[2], $arr[3], $arr[4], $arr[5], $arr[6], $arr[7], $arr[8], $arr[9], $arr[10], $arr[11], $arr[12], $arr[13], $arr[14], $arr[15], $arr[16], $arr[17]);
			return $prof;
		} catch (Exception $e) {
			echo $e->getMessage();
			$_SESSION['eccareaprof'] = $e->getMessage();
			return null;
		}
	}

    /*
    * getProfessionistByPaz
    * Parametri: cfPaziente
    * Questo metodo serve a recuperare un professionista dal Database tramite il codice fiscale di un suo paziente
    * ValoreDiRitorno: In caso di successo ritorna il professionista altrimenti ritorna null
    * Autore: D'Avino Michele
    * Versione: 1.0
    * 2020 Copyright by PsyMeet - University of Salerno
    */
	public static function getProfessionistByPaz($cfPaziente)
	{
		try {
			$professionisti = null;

			$arr = ['cf' => $cfPaziente];
			$result = DatabaseInterface::selectQueryByAtt($arr, 'terapia');

			while ($row = $result->fetch_array()) {
				$terapie = new Terapia($row[0], $row[1], $row[2], $row[3], $row[4]);
				$prof = self::getProf($terapie->getCfProf());
				$professionisti[] = $prof;
			}

			return $professionisti;
		} catch (Exception $e) {
			$_SESSION['eccareaprof'] = $e->getMessage();
			return null;
		}
	}

    /*
    * updateSchedaProfessionista
    * Parametri: cf,telefono,cellulare,email,pass,titoloDiStudio,pubblicazioni,esperienze,indirizzoStudio
    * Questo metodo serve ad aggiornare le informazioni del professionista nel Database
    * ValoreDiRitorno: In caso di successo ritorna true altrimenti ritorna il messaggio di errore.
    * Autore: D'Avino Michele
    * Versione: 1.0
    * 2020 Copyright by PsyMeet - University of Salerno
    */
	public static function updateSchedaProfessionista(
		$cf,
		$telefono,
		$cellulare,
		$email,
		$pass,
		$titoloDiStudio,
		$pubblicazioni,
		$esperienze,
		$indirizzoStudio
	) {
		try {
			$professionista = self::getProf($cf);
			if ($telefono != '') {
				$professionista->setTelefono($telefono);
			}

			if ($cellulare != '') {
				$professionista->setCellulare($cellulare);
			}

			if ($email != '') {
				$professionista->setEmail($email);
			}

			if ($pass != '') {
				$professionista->setPassword($pass);
			}

			if ($titoloDiStudio != '') {
				$professionista->setTitoloStudio($titoloDiStudio);
			}

			if ($pubblicazioni != '') {
				$professionista->setPubblicazione($pubblicazioni);
			}

			if ($esperienze != '') {
				$professionista->setEsperienze($esperienze);
			}

			if ($indirizzoStudio != '') {
				$professionista->setIndirizzoStudio($indirizzoStudio);
			}

			$result = DatabaseInterface::updateQueryById($professionista->getArrayNoVideo(), Professionista::$tableName);

			if ($result == false) {
				throw new Exception('errore update');
			}

			return true;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}

    /*
    * updateFotoProfessionista
    * Parametri: cf,img
    * Questo metodo serve ad aggiornare l'immagine del professionista nel Database
    * ValoreDiRitorno: In caso di successo ritorna true altrimenti ritorna il messaggio di errore.
    * Autore: D'Avino Michele
    * Versione: 1.0
    * 2020 Copyright by PsyMeet - University of Salerno
    */
	public static function updateFotoProfessionista($cf, $img)
	{
		try {
			if ($img != null) {
				$arr = ['cf_prof' => $cf];
				$result = DatabaseInterface::selectQueryById($arr, 'professionista');
				$arr = $result->fetch_array();
				$professionista = new Professionista($arr[0], $arr[1], $arr[2], $arr[3], $arr[4], $arr[5], $arr[6], $arr[7], $arr[8], $arr[9], $arr[10], $arr[11], $arr[12], $arr[13], $arr[14], $arr[15], $arr[16], $img);

				$result = DatabaseInterface::updateQueryById($professionista->getArray(), Professionista::$tableName);

				if ($result == false) {
					throw new Exception('errore foto non aggiornata');
				}
				return true;
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
}
