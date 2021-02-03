<?php

/*
	* CartellaClinicaControl
	* Questa classe Control fornisce tutte le funzioni che si possono fare per la cartella clinica
	* Autore: D'Avino Michele
	* Versione: 1.0
	* 2020 Copyright by PsyMeet - University of Salerno
*/
class CartellaClinicaControl
{
	/*
		* getCartellaClinica
		* Parametri: cfPaz,cfProf
		* Questo metodo serve a recuperare la cartella clinica di un paziente
		* ValoreDiRitorno: In caso di successo ritorna la cartella clinica altrimenti ritorna il messaggio d'errore
		* Autore: D'Avino Michele
		* Versione: 1.0
		* 2020 Copyright by PsyMeet - University of Salerno
		*/
	public static function getCartellaClinica($cfPaz, $cfProf)
	{
		try {
			$select = DatabaseInterface::selectQueryByAtt(['cf_prof' => $cfProf, 'cf' => $cfPaz], CartellaClinica::$tableName);
			if ($select->num_rows == 0) {
				return null;
			}
			$result = $select->fetch_array();
			$cartellaClinica = new CartellaClinica($result['id_cartella_clinica'], $result['data_creazione'], $result['q_umore'], $result['q_relazioni'], $result['patologie_pregresse'], $result['farmaci'], $cfProf, $cfPaz);
			return $cartellaClinica;
		} catch (Exception $e) {
			$_SESSION['eccCaClPr'] = $e->getMessage();
			return $e->getMessage();
		}
	}


	/*
		* updateCartellaClinica
		* Parametri: id, date, umo, relaz, patol, farma, cfprof, cfpaz
		* Questo metodo serve ad aggiornare la cartella clinica di un paziente nel Database
		* ValoreDiRitorno: In caso di successo ritorna true altrimenti ritorna il messaggio d'errore
		* Autore: D'Avino Michele
		* Versione: 1.0
		* 2020 Copyright by PsyMeet - University of Salerno
		*/
	public static function updateCartellaClinica($id, $date, $umo, $relaz, $patol, $farma, $cfProf, $cfPaz)
	{
		try {
			$cartellaClinica = new CartellaClinica($id, $date, $umo, $relaz, $patol, $farma, $cfProf, $cfPaz);
			$result = DatabaseInterface::updateQueryById($cartellaClinica->getArray(), CartellaClinica::$tableName);
			if ($result == false) {
				throw new Exception('errore update');
			}
			return true;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}


	/*
		* saveCartellaClinica
		* Parametri: id, date, umo, relaz, patol, farma, cfprof, cfpaz
		* Questo metodo serve a salvare la cartella clinica di un paziente nel Database
		* ValoreDiRitorno: In caso di successo ritorna true altrimenti ritorna il messaggio d'errore
		* Autore: D'Avino Michele
		* Versione: 1.0
		* 2020 Copyright by PsyMeet - University of Salerno
		*/
	public static function saveCartellaClinica($id, $date, $umo, $relaz, $patol, $farma, $cfProf, $cfPaz)
	{
		try {
			$cartellaClinica = new CartellaClinica($id, $date, $umo, $relaz, $patol, $farma, $cfProf, $cfPaz);
			$result=self::getCartellaClinica($cfPaz, $cfProf);
			if (isset($result)) {
				throw new Exception('Cartella clinica gia` esistente.');
			}
			$result = DatabaseInterface::insertQuery($cartellaClinica->getArraySenzaId(), CartellaClinica::$tableName);
			if (!$result) {
				throw new Exception('errore inserimento');
			}
			return true;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
}
