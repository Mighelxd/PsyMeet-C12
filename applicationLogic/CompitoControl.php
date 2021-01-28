<?php


/*
	* CompitoControl
	* Questo control fornisce tutte le operazioni che si possono fare per il compito'
	* Autore: Mary Cerullo
	* Versione: 0.1
	* 2020 Copyright by PsyMeet - University of Salerno
*/



//define('TABLE_NAME', 'compito');


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


	// metodo aggiunto per selezionare tutti i compiti relativi al paziente


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
