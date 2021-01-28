<?php
declare(strict_types=1);
/*
	* DatabaseInterface
	* Questa classe fornisce tutti i metodi per effettuare query sul DB
	* Autore: Michele D'Avino
	* Versione: 0.1
	* 2020 Copyright by PsyMeet - University of Salerno
*/
	include 'DatabaseConnector.php';
//    include '..\plugins\libArray\FunArray.php';
	class DatabaseInterface
	{
		public static function insertQuery(array $obj, $tablename)
		{
			try {
				$connection = DatabaseConnector::connect();
			} catch (Exception $e) {
				echo $e->getMessage();
			}
			$insert = "INSERT INTO $tablename (";
			$values = 'VALUES(';
			foreach ($obj as $o=>$value) {
				if (gettype($value) == 'string') {
					$insert .= "$o,";
					$values.= "\"$value\",";
				} elseif (gettype($value) == 'integer') {
					$insert .= "$o,";
					$values.= $value . ',';
				} elseif ($value == null) {
					$insert .= "$o,";
					$values.= 'NULL' . ',';
				}
			}

			$insert = substr($insert, 0, -1);
			$insert .= ') ';
			$values = substr($values, 0, -1);
			$values .= ');';
			$result = $connection->query($insert . $values);
			DatabaseConnector::close($connection);
			return $result;
		}


		public static function updateQueryById(array $obj, $tablename)
		{
			try {
				$connection = DatabaseConnector::connect();
			} catch (Exception $e) {
				echo $e->getMessage();
			}
			$update = "UPDATE $tablename SET ";
			if (gettype($obj[FunArray::arrayKeyFirst($obj)] == 'string')) {
				$where = 'WHERE ' . FunArray::arrayKeyFirst($obj) . ' = ' . "'" . $obj[FunArray::arrayKeyFirst($obj)] . "'";
			} else {
				$where = 'WHERE ' . FunArray::arrayKeyFirst($obj) . ' = ' . $obj[FunArray::arrayKeyFirst($obj)];
			}
			foreach ($obj as $key => $value) {
				if (gettype($value) == 'string') {
					$update .= $key . ' = ' . '"' . $value . '"' . ' , ';
				} elseif (!isset($value)) {
					$update .= $key . ' = ' . 'NULL' . ' , ';
				} else {
					$update .= $key . ' = ' . $value . ' , ';
				}
			}
			$update = substr($update, 0, -2);
			$result = $connection->query($update . $where);
			DatabaseConnector::close($connection);
			return $result;
		}


		public static function selectQueryById(array $array, $tablename)
		{
			try {
				$connection = DatabaseConnector::connect();
			} catch (Exception $e) {
				echo $e->getMessage();
			}
			$select = "SELECT * FROM $tablename ";
			if (gettype($array[FunArray::arrayKeyFirst($array)]) == 'string') {
				$where = 'WHERE ' . FunArray::arrayKeyFirst($array) . ' = ' . '"' . $array[FunArray::arrayKeyFirst($array)] . '"';
			} else {
				$where = 'WHERE ' . FunArray::arrayKeyFirst($array) . ' = ' . $array[FunArray::arrayKeyFirst($array)];
			}
			$result = $connection->query($select . $where);
			DatabaseConnector::close($connection);
			return $result;
		}


		public static function selectQueryByAtt(array $array, $tablename)
		{
			try {
				$connection = DatabaseConnector::connect();
			} catch (Exception $e) {
				echo $e->getMessage();
			}

			$select = "SELECT * FROM $tablename ";
			$where = 'WHERE ';
			if (count($array) == 1) {
				if (gettype($array[FunArray::arrayKeyFirst($array)] == 'string')) {
					$where .= FunArray::arrayKeyFirst($array) . ' = ' . '"' . $array[FunArray::arrayKeyFirst($array)] . '"';
				} else {
					$where .= FunArray::arrayKeyFirst($array) . ' = ' . $array[FunArray::arrayKeyFirst($array)];
				}
			} else {
				foreach ($array as $att_name => $att) {
					if (gettype($att == 'string')) {
						$where .= $att_name . ' = ' . '"' . $att . '"';
					} else {
						$where .= $att_name . ' = ' . $att;
					}
					$where .= ' AND ';
				}
				$where = substr($where, 0, -5);
			}
			$result = $connection->query($select . $where);
			DatabaseConnector::close($connection);
			return $result;
		}


		public static function selectDinamicQuery(array $arrCol, array $arrAtt, $tablename)
		{
			try {
				$connection = DatabaseConnector::connect();
			} catch (Exception $e) {
				echo $e->getMessage();
			}
			$select = 'SELECT ';
			$where = 'WHERE ';

			for ($i=0; $i<count($arrCol); $i++) {
				$select.="$arrCol[$i],";
			}

			$select = substr($select, 0, -1);
			$select .= " FROM $tablename ";

			foreach ($arrAtt as $att=>$attValue) {
				if (is_int($attValue)) {
					$where .= "$att = $attValue and ";
				} else {
					$where .= "$att = '$attValue' and ";
				}
			}
			$where = substr($where, 0, -5);
			$result = $connection->query($select . $where);
			DatabaseConnector::close($connection);
			return $result;
		}


		public static function deleteQuery(array $arrAtt, $tablename)
		{
			try {
				$connection = DatabaseConnector::connect();
			} catch (Exception $e) {
				echo $e->getMessage();
			}
			$delete = "DELETE FROM $tablename ";
			$where = 'WHERE ';

			foreach ($arrAtt as $att=>$attValue) {
				if (is_int($attValue)) {
					$where .= "$att = $attValue and ";
				} else {
					$where .= "$att = '$attValue' and ";
				}
			}
			$where = substr($where, 0, -5);
			$result = $connection->query($delete . $where);
			DatabaseConnector::close($connection);
			return $result;
		}


		public static function selectAllQuery($tablename)
		{
			try {
				$connection = DatabaseConnector::connect();
			} catch (Exception $e) {
				echo $e->getMessage();
			}
			$select = 'SELECT * ';

			$select .= " FROM $tablename ";

			$result = $connection->query($select);
			DatabaseConnector::close($connection);
			return $result;
		}
	}
