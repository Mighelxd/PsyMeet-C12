<?php
;



use PHPUnit\Framework\TestCase;

class SchedaFollowUpTest extends TestCase
{
	public function testSetIdTerapia()
	{
		$scheda = new SchedaFollowUp(1, '2021-01-22', 'ricadute', 'esiti', 2, 'Scheda Follow Up');
		self::assertEquals(2, $scheda->getIdTerapia());
	}


	public function testGetData()
	{
		$scheda = new SchedaFollowUp(1, '2021-01-22', 'ricadute', 'esiti', 2, 'Scheda Follow Up');
		self::assertEquals('2021-01-22', $scheda->getData());
	}


	public function testSetTipo()
	{
		$scheda = new SchedaFollowUp(1, '2021-01-22', 'ricadute', 'esiti', 2, 'Scheda Follow Up');
		$scheda->setTipo('Scheda Follow Up');
		self::assertEquals('Scheda Follow Up', $scheda->getTipo());
	}


	public function testGetTipo()
	{
		$scheda = new SchedaFollowUp(1, '2021-01-22', 'ricadute', 'esiti', 2, 'Scheda Follow Up');
		self::assertEquals('Scheda Follow Up', $scheda->getTipo());
	}


	public function testGetEsitiPositivi()
	{
		$scheda = new SchedaFollowUp(1, '2021-01-22', 'ricadute', 'esiti', 2, 'Scheda Follow Up');
		self::assertEquals('esiti', $scheda->getEsitiPositivi());
	}


	public function testGetIdTerapia()
	{
		$scheda = new SchedaFollowUp(1, '2021-01-22', 'ricadute', 'esiti', 2, 'Scheda Follow Up');
		self::assertEquals(2, $scheda->getIdTerapia());
	}


	public function testSetData()
	{
		$scheda = new SchedaFollowUp(1, '2021-01-22', 'ricadute', 'esiti', 2, 'Scheda Follow Up');
		$scheda->setData('2021-01-25');
		self::assertEquals('2021-01-25', $scheda->getData());
	}


	public function testSetRicadute()
	{
		$scheda = new SchedaFollowUp(1, '2021-01-22', 'ricadute', 'esiti', 2, 'Scheda Follow Up');
		$scheda->setRicadute('ricadute updated');
		self::assertEquals('ricadute updated', $scheda->getRicadute());
	}


	public function testGetIdScheda()
	{
		$scheda = new SchedaFollowUp(1, '2021-01-22', 'ricadute', 'esiti', 2, 'Scheda Follow Up');
		self::assertEquals(1, $scheda->getIdScheda());
	}


	public function testSetEsitiPositivi()
	{
		$scheda = new SchedaFollowUp(1, '2021-01-22', 'ricadute', 'esiti', 2, 'Scheda Follow Up');
		$scheda->setEsitiPositivi('esiti pos up');
		self::assertEquals('esiti pos up', $scheda->getEsitiPositivi());
	}


	public function testGetRicadute()
	{
		$scheda = new SchedaFollowUp(1, '2021-01-22', 'ricadute', 'esiti', 2, 'Scheda Follow Up');
		self::assertEquals('ricadute', $scheda->getRicadute());
	}


	public function test__construct()
	{
		$scheda = new SchedaFollowUp(1, '2021-01-22', 'ricadute', 'esiti', 2, 'Scheda Follow Up');
		self::assertNotNull($scheda);
	}


	public function testSetIdScheda()
	{
		$scheda = new SchedaFollowUp(1, '2021-01-22', 'ricadute', 'esiti', 2, 'Scheda Follow Up');
		$scheda->setIdScheda(3);
		self::assertEquals(3, $scheda->getIdScheda());
	}
}
