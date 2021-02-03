<?php



	/*
	 * Compito
	 * Questa classe contiene le operazioni relative all'oggetto Compito
	 * Autore: Cerullo Mary
	 * Versione: 1.0
	 * 2020 Copyright by PsyMeet - University of Salerno
	 */


/**
 * Class CompitoControl
 *
 * @method string selcetAllCompitiProf(string $cfProf)
 */
class CompitoControl
{
	/**
	 * @param $cfProf
	 * @return array
	 */

	/*
	 * NomeMetodo selectAllCompitiProf
	 * Parametri $cfProf
	 * Desc metodo che consente di recuperare tutti i compiti di un professionista
	 * ValoreDiRitorno in caso di successo ritorna l'arrey contenente la lista dei compiti, in caso di insuccesso ritorna il messaggio di errore
	 * Autore: Cerullo Mary
	 * Versione: 1.0
	 * 2020 Copyright by PsyMeet - University of Salerno
	 */

	public static function selectAllCompitiProf($cfProf)
	{
		try {
			// if(isset($_SESSION['eccComp']) && $_SESSION['eccComp']!=""){$_SESSION['eccComp']="";}
			$arrKey = ['cf_prof'=>$cfProf];
			$arr = null;
			$allCompProf = DatabaseInterface::selectQueryByAtt($arrKey, 'compito');
			while ($row=$allCompProf->fetch_array()) {
				$comp= new Compito($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8]);
				$arr[]=$comp;
			}

			return $arr;
		} catch (Exception $e) {
			$_SESSION['eccComp'] = $e->getMessage();
			return null;
		}
	}


	/*
	 * NomeMetodo selectAllCompitiPaz
	 * Parametri $cfPaz
	 * Desc metodo che consente di recuperare tutti i compiti di un paziente
	 * ValoreDiRitorno in caso di successo ritorna l'arrey contenente la lista dei compiti, in caso di insuccesso ritorna il messaggio di errore
	 * Autore: Cerullo Mary
	 * Versione: 1.0
	 * 2020 Copyright by PsyMeet - University of Salerno
	 */


	/**
	 * @param $cfPaz
	 * @return array
	 */
	public static function selectAllCompitiPaz($cfPaz)
	{
		try {
			//  if(isset($_SESSION['eccComp']) && $_SESSION['eccComp']!=""){$_SESSION['eccComp']="";}
			$arrKey = ['cf'=>$cfPaz];
			$arr=null;
			$allCompPaz = DatabaseInterface::selectQueryByAtt($arrKey, 'compito');
			while ($row=$allCompPaz->fetch_array()) {
				$comp= new Compito($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8]);
				$arr[]=$comp;
			}

			return $arr;
		} catch (Exception $e) {
			$_SESSION['eccComp'] = $e->getMessage();
			return null;
		}
	}


	/*
	* NomeMetodo addComp
	* Parametri: $data, $titolo, $descrizione, $svolgimento, $correzione, $cfProf, $cfPaz
	* Metodo che consente al professionista di aggiungere un nuovo compito per un dato paziente
	* ValoreDiRitorno: in caso di successo ritorna true, in caso di insuccesso ritorna il messaggio di errore
	* Autore: Cerullo Mary
	* Versione: 1.0
	* 2020 Copyright by PsyMeet - University of Salerno
	*/

	public static function addComp($data, $titolo, $descrizione, $svolgimento, $correzione, $cfProf, $cfPaz)
	{
		try {
			$compitoComp = new Compito(null, $data, 0, $titolo, $descrizione, $svolgimento, $correzione, $cfProf, $cfPaz);
			$compitoComp = $compitoComp->getArray();
			$compitoComp = array_diff($compitoComp, ['']);


			$compt = DatabaseInterface::insertQuery($compitoComp, Compito::$tableName);
			//var_dump($compt);

			if ($compt) {
				return true;
			} else {
				throw new Exception('Errore: Compito non aggiunto!');
			}

		} catch (Exception $e) {
			return $e->getMessage();
		}
	}


	/*
	* NomeMetodo doComp
	* Parametri: $idCp, $svolg
	* Metodo che consente al paziente di svolgere un compito assegnatogli da un dato professionista
	* ValoreDiRitorno: in caso di successo ritorna true, in caso di insuccesso ritorna il messaggio di errore
	* Autore: Cerullo Mary
	* Versione: 1.0
	* 2020 Copyright by PsyMeet - University of Salerno
	*/

	public static function doComp($idCp, $svolg)
	{
		try {
			$arrKey = ['id_compito'=>$idCp];
			$comp = DatabaseInterface::selectQueryByAtt($arrKey, Compito::$tableName);
			$temp=$comp->fetch_array();

			$compitoComp= new Compito($temp[0], $temp[1], $temp[2], $temp[3], $temp[4], $temp[5], $temp[6], $temp[7], $temp[8]);
			$compitoComp->setSvolgimento($svolg);

			$isSvolg = DatabaseInterface::updateQueryById($compitoComp->getArray(), Compito::$tableName);

			if ($isSvolg) {
				return true;
			} else {
				throw new Exception('Errore: compito non svolto!');
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}


	/*
	* NomeMetodo corrComp
	* Parametri: $id, $effettuatoNew, $correzioneNew
	* Metodo che consente al professionista di correggere un compito precedentemente svolto da un dato paziente
	* ValoreDiRitorno: in caso di successo ritorna true, in caso di insuccesso ritorna il messaggio di errore
	* Autore: Cerullo Mary
	* Versione: 1.0
	* 2020 Copyright by PsyMeet - University of Salerno
	*/

	public static function corrComp($id, $effettuatoNew, $correzioneNew)
	{
		try {
			$arrKey = ['id_compito'=>$id];
			$comp = DatabaseInterface::selectQueryByAtt($arrKey, Compito::$tableName);
			$temp=$comp->fetch_array();
			$compitoComp= new Compito($temp[0], $temp[1], $temp[2], $temp[3], $temp[4], $temp[5], $temp[6], $temp[7], $temp[8]);


			$compitoComp->setCorrezione($correzioneNew);
			$compitoComp->setEffettuato($effettuatoNew);
			$isUpdate = DatabaseInterface::updateQueryById($compitoComp->getArray(), Compito::$tableName);

			if ($isUpdate) {
				return true;
			} else {
				throw new Exception('Errore: Compito non corretto!');
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
}
