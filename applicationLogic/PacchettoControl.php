<?php

/*
	* PacchettoControl
	* Questa classe fornisce tutti i metodi per la classe PacchettoControl
	* Autore: Giuseppe D'avino
	* Versione: 1.0
	* 2020 Copyright by PsyMeet - University of Salerno
*/
define('TABLE_NAME', 'pacchetto');

class PacchettoControl
{
	/*
	 * NomeMetodo:selectAllPacchetto
	 * Parametri:
	 * Desc: Questa funzione recupera tutti i pacchetti che vi sono nel DB
	 * ValoreDiRitorno: in caso di successo vieni restituito l'array con tutti i pacchetti nel DB
	 *                  in caso di insuccesso viene restituito l'eccezione
	 * Autore: Giuseppe D'avino
	 * Versione: 1.0
	 * 2020 Copyright by PsyMeet - University of Salerno
	 */
	public static function selectAllPacchetto()
	{
		//Questa action cerca di recuperare tutti i pacchetti che vi sono nel DB
		try {
			$allPac = DatabaseInterface::selectAllQuery(Pacchetto::$tableName);
			$arr = null;
			while ($row=$allPac->fetch_array()) {
				$pac=new Pacchetto($row[0], $row[1], $row[2], $row[3]);
				$arr[]=$pac;
			}
			return $arr;
		} catch (Exception $e) {
			$_SESSION['eccpac']=$e->getMessage();
			return null;
		}
	}


	/*
	 * NomeMetodo:selectAllPacchettoProf
	 * Parametri:cfProfessionista
	 * Desc:metodo che recupera tutti i pacchetti per un dato Professionista
	 * ValoreDiRitorno: in caso di successo viene restituito l'array con tutti i pacchetti per il dato professionista
	 *                  in caso di insuccesso viene restituita l'eccezione
	 * Autore: Giuseppe D'avino
	 * Versione: 1.0
	 * 2020 Copyright by PsyMeet - University of Salerno
	 */
	public static function selectAllPacchettoProf($cfProfessionista)
	{
		try {
			$arrscelte= ['cf_prof' =>$cfProfessionista];
			$arrs=null;
			$allScelte= DatabaseInterface::selectQueryByAtt($arrscelte, scelta::$tableName);
			while ($row =$allScelte->fetch_array()) {
				$pacscelta= new Scelta($row[0], $row[1], $row[2]);
				$arrs[]=$pacscelta;
			}
			//var_dump($arrs);
			return $arrs;
		} catch (Exception $e) {
			$_SESSION['eccpac']=$e->getMessage();
			return null;
		}
	}


	/*
	   * NomeMetodo:recuperaPacchetto
	   * Parametri:id
	   * Desc:metodo che recupera tutti i pacchetti per un dato id
	   * ValoreDiRitorno: in caso di successo viene restituito l'array con tutti i pacchetti per il dato id
	   *                  in caso di insuccesso viene restituita l'eccezione
	   * Autore: Giuseppe D'avino
	   * Versione: 1.0
	   * 2020 Copyright by PsyMeet - University of Salerno
	   */
	public static function recuperaPacchetto($id)
	{
		try {
			$arrecupero=['id_pacchetto' =>$id];
			$pacrec=null;
			$paccrecupero=DatabaseInterface::selectQueryByAtt($arrecupero, Pacchetto::$tableName);
			while ($row=$paccrecupero->fetch_array()) {
				$pacrec= new Pacchetto($row[0], $row[1], $row[2], $row[3]);
			}

			return $pacrec;
		} catch (Exception $e) {
			$_SESSION['eccpac']=$e->getMessage();
			return null;
		}
	}


	/*
	   * NomeMetodo:selectAllPacchettoPaz
	   * Parametri:cfPaziente
	   * Desc: metodo che recupera tutti i pacchetti per un dato Paziente
	   * ValoreDiRitorno: in caso di successo viene restituito l'array con tutti i pacchetti per il dato Paziente
	   *                  in caso di insuccesso viene restituita l'eccezione
	   * Autore: Giuseppe D'avino
	   * Versione: 1.0
	   * 2020 Copyright by PsyMeet - University of Salerno
	   */
	public static function selectAllPacchettoPaz($cfPaziente)
	{
		try {
			$arrs = null;
			$arrscelte= ['cf' =>$cfPaziente];
			$allFatture= DatabaseInterface::selectQueryByAtt($arrscelte, 'fattura');
			while ($row =$allFatture->fetch_array()) {
				$pacFattura = new Fattura($row[0], $row[1], $row[2], $row[3], $row[4]);
				//$arrayFatture[] = $pacFattura;
				$arr = ['id_scelta' => $pacFattura->getIdScelta()];
				$scelta = DatabaseInterface::selectQueryById($arr, 'scelta');
				$sc = $scelta->fetch_array();
				$pacscelta= new Scelta($sc[0], $sc[1], $sc[2]);
				$arrayScelta = ['id_pacchetto'=> $pacscelta->getIdPacchetto()];
				$selectPacchetto = DatabaseInterface::selectQueryById($arrayScelta, 'pacchetto');
				$pac = $selectPacchetto->fetch_array();
				$pacchetto = new Pacchetto($pac[0], $pac[1], $pac[2], $pac[3]);
				$arrs[]=$pacchetto;
			}
			//var_dump($arrs);
			return $arrs;
		} catch (Exception $e) {
			$_SESSION['eccpac']=$e->getMessage();
			return null;
		}
	}


	/*
	 * NomeMetodo: getFatture
	 * Parametri:cfPaziente
	 * Desc: metodo che recupera tutte le fatture per un dato Paziente
	 * ValoreDiRitorno: in caso di successo viene restituito l'array con tutte le fatture per il dato Paziente
	 *                  in caso di insuccesso viene restituita l'eccezione
	 * Autore: Giuseppe D'avino
	 * Versione: 1.0
	 * 2020 Copyright by PsyMeet - University of Salerno
	 */
	public static function getFatture($cfPaziente)
	{
		try {
			$fatture = null;
			$att= ['cf' =>$cfPaziente];
			$allFatture= DatabaseInterface::selectQueryByAtt($att, 'fattura');
			while ($row = $allFatture->fetch_array()) {
				$fatture[] = new Fattura($row[0], $row[1], $row[2], $row[3], $row[4]);
			}
			return $fatture;
		} catch (Exception $e) {
			//echo 'sono in eccezione ' . $e->getMessage();
			$_SESSION['eccezioneFatture']=$e->getMessage();
			return null;
		}
	}


	/*
	   * NomeMetodo: getFatturaByPazProf
	   * Parametri:cfPaz ,cfProf
	   * Desc: metodo che recupera tutte le fatture per un dato Paziente in relazione con un Professionista
	   * ValoreDiRitorno: in caso di successo viene restituito l'array con tutte le fatture per il dato Paziente in base al professionista
	   * Autore: Giuseppe D'avino
	   * Versione: 1.0
	   * 2020 Copyright by PsyMeet - University of Salerno
	   */
	public static function getFatturaByPazProf($cfPaz, $cfProf)
	{
		$fattAtt=null;
		//$fatts = null;
		$fatts=self::getFatture($cfPaz);
		$scelte=self::selectAllPacchettoProf($cfProf);
		if ($fatts!= null) {
			foreach ($fatts as $fatt) {
				foreach ($scelte as $pacchetto) {
					if ($fatt->getIdScelta() == $pacchetto->getIdPacchetto() && $fatt->getNSeduteRim() > 0) {
						$fattAtt = $fatt;
					}
				}
			}
		}
		return $fattAtt;
	}


	/*
		* NomeMetodo: getSceltaById
		* Parametri:idScelta
		* Desc: metodo che si occupa di recuerare le scelte per un dato id della scelta
		* ValoreDiRitorno: in caso di successo viene restituito l'array con tutte informazioni riguardo la scelta
		* Autore: Giuseppe D'avino
		* Versione: 1.0
		* 2020 Copyright by PsyMeet - University of Salerno
		*/

	public static function getSceltaById($idScelta)
	{
		$scheda = null;
		$arr = ['id_scelta' => $idScelta];
		$result = DatabaseInterface::selectQueryById($arr, 'scelta');
		$row = $result->fetch_array();
		$scheda = new Scelta($row[0], $row[1], $row[2]);
		return $scheda;
	}


	/*
		   * NomeMetodo: addPacchetto
		   * Parametri:pacchetto
		   * Desc: metodo che si occupa di inserire i nuovi pacchetti nel DB
		   * ValoreDiRitorno: in caso di successo viene inserito un nuovo pacchetto nel DB
		   * Autore: Giuseppe D'avino
		   * Versione: 1.0
		   * 2020 Copyright by PsyMeet - University of Salerno
		   */
	public static function addPacchetto($pacchetto)
	{
		try {
			$id =0;
			$att=['tipologia'=>$pacchetto];
			$coll=['*'];
			$recuperapacc =DatabaseInterface::selectDinamicQuery($coll, $att, Pacchetto::$tableName);
			$row = $recuperapacc->fetch_array();
			$id=$row[0];

			$arrycheck=['id_pacchetto'=>$id];
			$check = DatabaseInterface::selectDinamicQuery($coll, $arrycheck, scelta::$tableName);
			if ($check->num_rows>0) {
				throw new Exception('Pacchetto gia esistente, seleziona un pacchetto che non appartiene al Professionista corrente');
			} else {
				$_SESSION['Errore']='';
				$arryid = new Scelta(null, $_SESSION['codiceFiscale'], $id);
				$ok=DatabaseInterface::insertQuery($arryid->getArray(), scelta::$tableName);
				if (!$ok) {
					throw new Exception('Errore: Pacchetto non inserito!');
				} else {
					return true;
				}
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}


	/*
			* NomeMetodo: delPacchetto
			* Parametri:pacchetto , idprof
			* Desc: metodo che si occupa di eliminare i pacchetti nel DB
			* ValoreDiRitorno: in caso di successo viene eliminato un pacchetto nel DB
	 *                         in caso di insuccesso viene lanciata l'eccezione
			* Autore: Giuseppe D'avino
			* Versione: 1.0
			* 2020 Copyright by PsyMeet - University of Salerno
			*/
	public static function delPacchetto($idProf, $pacchetto)
	{
		try {
			$key = new Scelta(null, $idProf, $pacchetto);
			$arrPac = $key->getArray();
			$arrPac = array_diff($arrPac, ['']);
			$del=DatabaseInterface::deleteQuery($arrPac, scelta::$tableName);

			if (!$del) {
				throw new Exception('Errore: pacchetto non eliminato!');
			} else {
				return true;
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}


	/*
			   * NomeMetodo: delPacchetto
			   * Parametri:pacchetto , idprof
			   * Desc: metodo che si occupa di 'compare' i pacchetti
			   * ValoreDiRitorno: in caso di successo viene restituito true
			   *                  in caso di insuccesso viene lanciata l'eccezione
			   * Autore: Giuseppe D'avino
			   * Versione: 1.0
			   * 2020 Copyright by PsyMeet - University of Salerno
			   */
	public static function buyPacchetto($data, $cfPaz, $idScelta)
	{
		try {
			$arr = ['id_scelta' =>$idScelta];
			$rowScelta = DatabaseInterface::selectQueryById($arr, 'scelta');
			$row = $rowScelta->fetch_array();
			$scelta = new Scelta($row[0], $row[1], $row[2]);
			$pacchetto = self::recuperaPacchetto($scelta->getIdPacchetto());

			$fattura = new Fattura(null, $data, $cfPaz, $idScelta, $pacchetto->getNSedute());
			$result = DatabaseInterface::insertQuery($fattura->getArray(), 'fattura');
			if (!$result) {
				throw new Exception('Errore: acquisto fallito!');
			} else {
				return true;
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
}
