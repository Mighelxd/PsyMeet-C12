<?php
;


use PHPUnit\Framework\TestCase;

class DatabaseInterfaceTest extends TestCase
{
	public function testUpdateQueryById()
	{
		$date=date('Y-m-d');
		$cartellaClinica=new CartellaClinica(1, $date, '2', '3', 'Patologia', 'Farmaco', 'RSSMRC80R12H703U', 'NSTFNC94M23H703G');
		$result=DatabaseInterface::UpdateQueryById($cartellaClinica->getArray(), CartellaClinica::$tableName);
		self::assertEquals(true, $result);
	}


	public function testSelectQueryById()
	{
		$date=date('Y-m-d');
		$cartellaClinica=new CartellaClinica(1, $date, '2', '3', 'Patologia', 'Farmaco', 'RSSMRC80R12H703U', 'NSTFNC94M23H703G');
		$select=DatabaseInterface::selectQueryById(['id_cartella_clinica'=>$cartellaClinica->getId()], CartellaClinica::$tableName);
		$select=$select->fetch_array();
		self::assertEquals($cartellaClinica->getId(), $select[0]);
	}


	public function testInsertQuery()
	{
		$pacchetto=new Pacchetto('15', 6, 60, 'si');
		$result=DatabaseInterface::insertQuery($pacchetto->getArray(), Pacchetto::$tableName);
		self::assertEquals(true, $result);
	}


	public function testDeleteQuery()
	{
		$pacchetto=new Pacchetto('15', 6, 60, 'si');
		$result=DatabaseInterface::deleteQuery($pacchetto->getArray(), Pacchetto::$tableName);
		self::assertEquals(true, $result);
	}


	public function testSelectAllQuery()
	{
		$result=DatabaseInterface::selectAllQuery(Pacchetto::$tableName);
		self::assertEquals(5, $result->num_rows);
	}


	public function testSelectDinamicQuery()
	{
		$result=DatabaseInterface::selectDinamicQuery(['n_sedute'], ['id_pacchetto'=>1], Pacchetto::$tableName);
		self::assertEquals('1', $result->fetch_row()[0]);
	}
}
