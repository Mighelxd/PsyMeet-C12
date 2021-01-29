<?php
;


use PHPUnit\Framework\TestCase;

class SchedaModelloEziologicoControlTest extends TestCase
{
	public function testAddSMEfCausEmpty()
	{
		$dataCurr = date('Y-m-d');
		$res=SeduteControl::addSME($dataCurr, '', 'AAA', 'AAA', 'AAA', 1, 'Scheda Modello Eziologico');
		self::assertEquals('Il campo Fattori Causativi è vuoto', $res);
	}


	public function testAddSMEfCausFormatoError()
	{
		$dataCurr = date('Y-m-d');
		$res=SeduteControl::addSME($dataCurr, '@', 'AAA', 'AAA', 'AAA', 1, 'Scheda Modello Eziologico');
		self::assertEquals('Il campo Fattori Causativi non rispetta il formato', $res);
	}


	public function testAddSMEfPrecEmpty()
	{
		$dataCurr = date('Y-m-d');
		$res=SeduteControl::addSME($dataCurr, 'AAA', '', 'AAA', 'AAA', 1, 'Scheda Modello Eziologico');
		self::assertEquals('Il campo Fattori Precipitanti è vuoto', $res);
	}


	public function testAddSMEfPrecFormatoError()
	{
		$dataCurr = date('Y-m-d');
		$res=SeduteControl::addSME($dataCurr, 'AAA', '@', 'AAA', 'AAA', 1, 'Scheda Modello Eziologico');
		self::assertEquals('Il campo Fattori Precipitanti non rispetta il formato', $res);
	}


	public function testAddSMEfMantEmpty()
	{
		$dataCurr = date('Y-m-d');
		$res=SeduteControl::addSME($dataCurr, 'AAA', 'AAA', '', 'AAA', 1, 'Scheda Modello Eziologico');
		self::assertEquals('Il campo Fattori Mantenimento è vuoto', $res);
	}


	public function testAddSMEfMantFormatoError()
	{
		$dataCurr = date('Y-m-d');
		$res=SeduteControl::addSME($dataCurr, 'AAA', 'AAA', '@', 'AAA', 1, 'Scheda Modello Eziologico');
		self::assertEquals('Il campo Fattori Mantenimento non rispetta il formato', $res);
	}


	public function testAddSMErFinaleEmpty()
	{
		$dataCurr = date('Y-m-d');
		$res=SeduteControl::addSME($dataCurr, 'AAA', 'AAA', 'AAA', '', 1, 'Scheda Modello Eziologico');
		self::assertEquals('Il campo Relazione finale è vuoto', $res);
	}


	public function testAddSMErFinaleFormatoError()
	{
		$dataCurr = date('Y-m-d');
		$res=SeduteControl::addSME($dataCurr, 'AAA', 'AAA', 'AAA', '@', 1, 'Scheda Modello Eziologico');
		self::assertEquals('Il campo Relazione finale non rispetta il formato', $res);
	}


	public function testAddSMEsuccess()
	{
		$dataCurr = date('Y-m-d');
		$res=SeduteControl::addSME($dataCurr, 'AAA', 'AAA', 'AAA', 'AAA', 1, 'Scheda Modello Eziologico');
		self::assertEquals(true, $res);
	}


	/*Modifica*/

	public function testModSMEfCausEmpty()
	{
		$res=SeduteControl::modSME('', 'BBB', 'BBB', 'BBB', 1);
		self::assertEquals('Il campo Fattori Causativi è vuoto', $res);
	}


	public function testModSMEfCausFormatoError()
	{
		$res=SeduteControl::modSME('@', 'BBB', 'BBB', 'BBB', 1);
		self::assertEquals('Il campo Fattori Causativi non rispetta il formato', $res);
	}


	public function testModSMEfPrecEmpty()
	{
		$res=SeduteControl::modSME('BBB', '', 'BBB', 'BBB', 1);
		self::assertEquals('Il campo Fattori Precipitanti è vuoto', $res);
	}


	public function testModSMEfPrecFormatoError()
	{
		$res=SeduteControl::modSME('BBB', '@', 'BBB', 'BBB', 1);
		self::assertEquals('Il campo Fattori Precipitanti non rispetta il formato', $res);
	}


	public function testModSMEfMantEmpty()
	{
		$res=SeduteControl::modSME('BBB', 'BBB', '', 'BBB', 1);
		self::assertEquals('Il campo Fattori Mantenimento è vuoto', $res);
	}


	public function testModSMEfMantFormatoError()
	{
		$res=SeduteControl::modSME('BBB', 'BBB', '@', 'BBB', 1);
		self::assertEquals('Il campo Fattori Mantenimento non rispetta il formato', $res);
	}


	public function testModSMErFinaleEmpty()
	{
		$res=SeduteControl::modSME('BBB', 'BBB', 'BBB', '', 1);
		self::assertEquals('Il campo Relazione finale è vuoto', $res);
	}


	public function testModSMErFinaleFormatoError()
	{
		$res=SeduteControl::modSME('BBB', 'BBB', 'BBB', '@', 1);
		self::assertEquals('Il campo Relazione finale non rispetta il formato', $res);
	}


	public function testModSMEsuccess()
	{
		$res=SeduteControl::modSME('BBB', 'BBB', 'BBB', 'BBB', 1);
		self::assertEquals(true, $res);
	}
}
