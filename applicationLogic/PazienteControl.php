<?php

/*
* PazienteControl
* Questa Control fornisce tutti i metodi relativi al paziente
* Autore: Giuseppe Ferrante
* Versione: 0.2
* 2020 Copyright by PsyMeet - University of Salerno
*/
//include "../storage/Paziente.php";
//include ("../storage/DatabaseInterface.php");
//include ("../plugins/libArray/FunArray.php");


class PazienteControl
{
	public static function getPaz($cfPaziente)
	{
		try {
			$arr = ['cf' => $cfPaziente];
			$result = DatabaseInterface::selectQueryById($arr, 'paziente');
			$arr = $result->fetch_array();
			$paz = new Paziente($arr[0], $arr[1], $arr[2], $arr[3], $arr[4], $arr[5], $arr[6], $arr[7], $arr[8], $arr[9], $arr[10], $arr[11], $arr[12]);

			return $paz;
		} catch (Exception $e) {
			$_SESSION['eccezione']=$e->getMessage();
			return null;
		}
	}


	public static function getListPaz()
	{
		try {
			$allPaz = DatabaseInterface::selectAllQuery('paziente');
			$arrayPazienti = null;

			while ($row = $allPaz->fetch_array()) {
				$pazienti = new Paziente($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12]);
				$arrayPazienti[] = $pazienti;
			}
			return $arrayPazienti;
		} catch (Exception $e) {
			$_SESSION['eccezione']=$e->getMessage();
			return null;
		}
	}


	public static function getPazientiByProf($cfProf)
	{
		try {
			$arrKey = ['cf_prof' =>  $cfProf];
			$listTerapie = DatabaseInterface::selectQueryByAtt($arrKey, 'terapia');
			$arrayPazienti = null;
			while ($row = $listTerapie->fetch_array()) {
				$terapia = new Terapia($row[0], $row[1], $row[2], $row[3], $row[4]);
				$arrPaz = ['cf' => $terapia->getCf()];
				$listPazienti = DatabaseInterface::selectQueryById($arrPaz, 'paziente');
				$arrPaziente = $listPazienti->fetch_array();
				$paziente = new Paziente($arrPaziente[0], $arrPaziente[1], $arrPaziente[2], $arrPaziente[3], $arrPaziente[4], $arrPaziente[5], $arrPaziente[6], $arrPaziente[7], $arrPaziente[8], $arrPaziente[9], $arrPaziente[10], $arrPaziente[11], $arrPaziente[12]);
				$arrayPazienti[] = $paziente;
			}
			return $arrayPazienti;
		} catch (Exception $e) {
			$_SESSION['eccezione']=$e->getMessage();
			return null;
		}
	}


	public static function updateSchedaPaziente($cf, $tell, $indirizzo, $email, $password, $istruzione)
	{
		try {
			$arr = ['cf' => $cf];
			$result = DatabaseInterface::selectQueryById($arr, 'paziente');
			$arr = $result->fetch_array();
			$paziente = new Paziente($arr[0], $arr[1], $arr[2], $arr[3], $arr[4], $arr[5], $arr[6], $arr[7], $arr[8], $arr[9], $arr[10], $arr[11], $arr[12]);

			if ($tell != '') {
				$paziente->setTelefono($tell);
			}

			if ($indirizzo != '') {
				$paziente->setIndirizzo($indirizzo);
			}

			if ($email != '') {
				$paziente->setEmail($email);
			}

			if ($password != '') {
				$paziente->setPassword($password);
			}

			if ($istruzione != '') {
				$paziente->setIstruzione($istruzione);
			}


			$result = DatabaseInterface::updateQueryById($paziente->getArrayNoFoto(), 'paziente');

			if ($result == false) {
				throw new Exception('errore update');
			}
			return true;

		} catch (Exception $e) {
			return $e->getMessage();
		}
	}


	public static function updateFotoProfilo($cf, $img)
	{
		try {
			if ($img != null) {
				$arr = ['cf' => $cf];
				$result = DatabaseInterface::selectQueryById($arr, 'paziente');
				$arr = $result->fetch_array();
				$paziente = new Paziente($arr[0], $arr[1], $arr[2], $arr[3], $arr[4], $arr[5], $arr[6], $arr[7], $arr[8], $arr[9], $arr[10], $img, $arr[12]);

				$result = DatabaseInterface::updateQueryById($paziente->getArray(), 'paziente');

				if ($result == false) {
					throw new Exception('errore update');
				}
				return true;
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
}


/*
  if($action == "" && $action )
  {
	echo "cose a caso";
  }
  else if($action == "ModificaPaziente")
  {
	$telefonoControl = $indirizzoControl = $emailControl = $passwordControl = $titoloStdioControl = "";
	echo ($telefonoControl = $_POST["telefono"]) ."<br>";
	echo ($indirizzoControl = $_POST["indirizzo"])."<br>";
	echo ($emailControl = $_POST["email"])."<br>";
	echo ($passwordControl = $_POST["password"])."<br>";
	echo ($titoloStdioControl = $_POST["titoloStudio"])."<br>";
  }
*/
