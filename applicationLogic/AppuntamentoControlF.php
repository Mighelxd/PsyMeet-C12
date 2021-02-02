<?php
/*
	* AppuntamentoControl
	* Questo control fornisce tutte le funzioni che si possono fare per Appuntamento
	* Autore: Marco Campione
	* Versione: 1.0
	* 2020 Copyright by PsyMeet - University of Salerno
*/
class AppuntamentoControlF
{
    /*
	* addApp
	* data, ora, descrizione, codice fiscale professionista, codice fiscale paziente
    * Aggiunge un nuovo appuntamento
    * La funzione restituisce true in caso di successo, un'eccezione altrimenti
	* Autore: Marco Campione
	* Versione: 1.0
	* 2020 Copyright by PsyMeet - University of Salerno
*/
	public static function addApp($data, $ora, $desc, $cfProf, $cf)
	{
		try {
			$ora .=':00';
			$newApp = new Appuntamento(null, $data, $ora, $desc, $cfProf, $cf);
			$ok = DatabaseInterface::insertQuery($newApp->getArray(), Appuntamento::$tableName);
			if ($ok) {
				return true;
			} else {
				throw new Exception('Errore: Appuntamento non aggiunto!');
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
    /*
        * modApp
        * id, data, ora, descrizione, codice fiscale professionista, codice fiscale paziente, data prima della modifica, ora prima della modifica, descrizione prima modifica, codice fiscale paziente prima modifica
        * Modifica un appuntamento
        * La funzione restituisce true in caso di successo, un'eccezione altrimenti
        * Autore: Marco Campione
        * Versione: 1.0
        * 2020 Copyright by PsyMeet - University of Salerno
    */
	public static function modApp($id, $data, $ora, $desc, $cfProf, $cf, $oldD, $oldO, $oldDe, $oldCfPaz)
	{
		try {
			$ora .=':00';
			$oldO .=':00';
			$oldApp = new Appuntamento($id, $oldD, $oldO, $oldDe, $cfProf, $oldCfPaz);
			$oldApp->setData($data);
			$oldApp->setOra($ora);
			$oldApp->setDesc($desc);
			$oldApp->setCfPaz($cf);

			$isUpdate = DatabaseInterface::updateQueryById($oldApp->getArray(), Appuntamento::$tableName);
			if ($isUpdate) {
				return true;
			} else {
				throw new Exception('Errore: Appuntamento non modificato!');
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
}
