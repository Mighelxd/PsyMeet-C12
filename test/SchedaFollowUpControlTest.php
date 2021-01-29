<?php
;


use PHPUnit\Framework\TestCase;

class SchedaFollowUpControlTest extends TestCase
{
	public function testAddSFURicNotCor()
	{
		$result = SeduteControl::addSFU(
			date('Y-m-d'),
			'',
			'AAA',
			'1',
			'Scheda Follow Up'
		);
		self::assertEquals('Il campo Ricadute è vuoto.', $result);
	}


	public function testAddSFURicNotForm()
	{
		$result = SeduteControl::addSFU(
			date('Y-m-d'),
			'AAAAAAAAAAAAAA$',
			'AAA',
			'1',
			'Scheda Follow Up'
		);
		self::assertEquals('Il campo Ricadute non rispetta il formato', $result);
	}


	public function testAddSFUEPNotCor()
	{
		$result = SeduteControl::addSFU(
			date('Y-m-d'),
			'AAAAAAAAAAAAAA',
			'',
			'1',
			'Scheda Follow Up'
		);
		self::assertEquals('Il campo Esiti positivi è vuoto', $result);
	}


	public function testAddSFUEPNotForm()
	{
		$result = SeduteControl::addSFU(
			date('Y-m-d'),
			'AAAAAAAAAAAAAA',
			'AAAAAAAAAAAAAA$$',
			'1',
			'Scheda Follow Up'
		);
		self::assertEquals('Il campo Esiti positivi non rispetta il formato', $result);
	}


	public function testAddSFUSucc()
	{
		$result = SeduteControl::addSFU(
			date('Y-m-d'),
			'AAAAAAAAAAAAAA',
			'AAAAAAAAAAAAAA',
			'1',
			'Scheda Follow Up'
		);
		self::assertEquals(true, $result);
	}


	public function testModSFURicNotCor()
	{
		$result = SeduteControl::modSFU(
			'',
			'AAA',
			'1'
		);
		self::assertEquals('Il campo Ricadute è vuoto', $result);
	}


	public function testModSFURicNotForm()
	{
		$result = SeduteControl::modSFU(
			'AAAAAAAAAAA@',
			'AAA',
			'1'
		);
		self::assertEquals('Il campo Ricadute non rispetta il formato', $result);
	}


	public function testModSFUEpNotCor()
	{
		$result = SeduteControl::modSFU(
			'AAAAAAAAAAAA',
			'',
			'1'
		);
		self::assertEquals('Il campo Esiti positivi è vuoto', $result);
	}


	public function testModSFUEpNotForm()
	{
		$result = SeduteControl::modSFU(
			'AAAAAAAAAAAA',
			'AAAAAAA@',
			'1'
		);
		self::assertEquals('Il campo Esiti positivi non rispetta il formato', $result);
	}


	public function testModSFUSucc()
	{
		$result = SeduteControl::modSFU(
			'AAAAAAAAAAAA',
			'AAAAAAAAAAA',
			'1'
		);
		self::assertEquals(true, $result);
	}
}
