<?php
declare(strict_types=1);




use PHPUnit\Framework\TestCase;

  $currDate = date('Y-m-d');

class CompitoControlTest extends TestCase
{
	public function testAddCompLTitNotOk()
	{
		$result = CompitoControl::addComp(
			'2021-01-23',
			'TitoloOoooooooooooooooooooo',
			'desc',
			'',
			'',
			'RSSMRC80R12H703U',
			'NSTFNC94M23H703G'
		);

		self::assertEquals('Il campo titolo non rispetta la lunghezza', $result);
	}


	public function testAddCompFTitNotOk()
	{
		$result = CompitoControl::addComp(
			'2021-01-23',
			'Titol@',
			'desc',
			'',
			'',
			'RSSMRC80R12H703U',
			'NSTFNC94M23H703G'
		);

		self::assertEquals('Il campo titolo non rispetta il formato', $result);
	}


	public function testAddCompFDescNotOk()
	{
		$result = CompitoControl::addComp(
			'2021-01-23',
			'Titolo',
			'Descrizion$',
			'',
			'',
			'RSSMRC80R12H703U',
			'NSTFNC94M23H703G'
		);

		self::assertEquals('Il campo descrizione non rispetta il formato', $result);
	}


	public function testAddCompOk()
	{
		$result = CompitoControl::addComp(
			'2021-01-23',
			'Titolo',
			'Descrizione1',
			'',
			'',
			'RSSMRC80R12H703U',
			'NSTFNC94M23H703G'
		);

		self::assertEquals(true, $result);
	}


	public function testCorrCompFNotOk()
	{
		$result = CompitoControl::corrComp(
			1,
			0,
			'Correzion@'
		);

		self::assertEquals('Il campo correzione non rispetta il formato', $result);
	}


	public function testCorrCompOk()
	{
		$result = CompitoControl::corrComp(
			1,
			1,
			'Correzione3'
		);

		self::assertEquals(true, $result);
	}


	public function testDoCompFSvolgNotOk()
	{
		$result = CompitoControl::doComp(
			1,
			'Svolgiment#'
		);

		self::assertEquals('Il campo svolgimento non rispetta il formato', $result);
	}


	public function testDoCompOk()
	{
		$result = CompitoControl::doComp(
			1,
			'Svolgimento1'
		);

		self::assertEquals(true, $result);
	}
}
