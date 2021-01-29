<?php
;


use PHPUnit\Framework\TestCase;

class SchedaPrimoColloquioControlTest extends TestCase
{
	public function testAddSPQdefProbEmpty()
	{
		$dataCurr = date('Y-m-d');
		$res = SeduteControl::addSPQ($dataCurr, '', '', '', '', '', 1, 'Scheda Primo Colloquio');
		self::assertEquals('Il campo Definizione Problema è vuoto', $res);
	}


	public function testAddSPQdefProbFormatoError()
	{
		$dataCurr = date('Y-m-d');
		$res = SeduteControl::addSPQ($dataCurr, 'Definizione problema@', '', '', '', '', 1, 'Scheda Primo Colloquio');
		self::assertEquals('Il campo Definizione Problema non rispetta il formato', $res);
	}


	public function testAddSPQaspPazEmpty()
	{
		$dataCurr = date('Y-m-d');
		$res = SeduteControl::addSPQ($dataCurr, 'Definizione problema', '', '', '', '', 1, 'Scheda Primo Colloquio');
		self::assertEquals('Il campo Aspettative Paziente è vuoto', $res);
	}


	public function testAddSPQaspPazFormatoError()
	{
		$dataCurr = date('Y-m-d');
		$res = SeduteControl::addSPQ($dataCurr, 'Definizione problema', 'Aspettative paziente@', '', '', '', 1, 'Scheda Primo Colloquio');
		self::assertEquals('Il campo Aspettative Paziente non rispetta il formato', $res);
	}


	public function testAddSPQmotEmpty()
	{
		$dataCurr = date('Y-m-d');
		$res = SeduteControl::addSPQ($dataCurr, 'Definizione problema', 'Aspettative paziente', '', '', '', 1, 'Scheda Primo Colloquio');
		self::assertEquals('Il campo Motivazione è vuoto', $res);
	}


	public function testAddSPQmotFormatoError()
	{
		$dataCurr = date('Y-m-d');
		$res = SeduteControl::addSPQ($dataCurr, 'Definizione problema', 'Aspettative paziente', 'Motivazione@', '', '', 1, 'Scheda Primo Colloquio');
		self::assertEquals('Il campo Motivazione non rispetta il formato', $res);
	}


	public function testAddSPQobtEmpty()
	{
		$dataCurr = date('Y-m-d');
		$res = SeduteControl::addSPQ($dataCurr, 'Definizione problema', 'Aspettative paziente', 'Motivazione', '', '', 1, 'Scheda Primo Colloquio');
		self::assertEquals('Il campo Obiettivi è vuoto', $res);
	}


	public function testAddSPQobtFormatoError()
	{
		$dataCurr = date('Y-m-d');
		$res = SeduteControl::addSPQ($dataCurr, 'Definizione problema', 'Aspettative paziente', 'Motivazione', 'Obiettivi@', '', 1, 'Scheda Primo Colloquio');
		self::assertEquals('Il campo Obiettivi non rispetta il formato', $res);
	}


	public function testAddSPQdefCambEmpty()
	{
		$dataCurr = date('Y-m-d');
		$res = SeduteControl::addSPQ($dataCurr, 'Definizione problema', 'Aspettative paziente', 'Motivazione', 'Obiettivi', '', 1, 'Scheda Primo Colloquio');
		self::assertEquals('Il campo Definizione Cambiamento è vuoto', $res);
	}


	public function testAddSPQdefCambFormatoError()
	{
		$dataCurr = date('Y-m-d');
		$res = SeduteControl::addSPQ($dataCurr, 'Definizione problema', 'Aspettative paziente', 'Motivazione', 'Obiettivi', 'Definizione cambiamento@', 1, 'Scheda Primo Colloquio');
		self::assertEquals('Il campo Definizione Cambiamento non rispetta il formato', $res);
	}


	public function testAddSPQsuccess()
	{
		$dataCurr = date('Y-m-d');
		$res = SeduteControl::addSPQ($dataCurr, 'Definizione problema', 'Aspettative paziente', 'Motivazione', 'Obiettivi', 'Definizione cambiamento', 1, 'Scheda Primo Colloquio');
		self::assertEquals(true, $res);
	}


	/*Modifica*/

	public function testModSPQdefProbEmpty()
	{
		$res = SeduteControl::modSPQ('', '', '', '', '', 1);
		self::assertEquals('Il campo Definizione Problema è vuoto', $res);
	}


	public function testModSPQdefProbFormatoError()
	{
		$res = SeduteControl::modSPQ('Definizione problema mod@', '', '', '', '', 1);
		self::assertEquals('Il campo Definizione Problema non rispetta il formato', $res);
	}


	public function testModSPQaspPazEmpty()
	{
		$res = SeduteControl::modSPQ('Definizione problema mod', '', '', '', '', 1);
		self::assertEquals('Il campo Aspettative Paziente è vuoto', $res);
	}


	public function testModSPQaspPazFormatoError()
	{
		$res = SeduteControl::modSPQ('Definizione problema mod', 'Aspettative paziente mod@', '', '', '', 1);
		self::assertEquals('Il campo Aspettative Paziente non rispetta il formato', $res);
	}


	public function testModSPQmotEmpty()
	{
		$res = SeduteControl::modSPQ('Definizione problema mod', 'Aspettative paziente mod', '', '', '', 1);
		self::assertEquals('Il campo Motivazione è vuoto', $res);
	}


	public function testModSPQmotFormatoError()
	{
		$res = SeduteControl::modSPQ('Definizione problema mod', 'Aspettative paziente mod', 'Motivazione mod@', '', '', 1);
		self::assertEquals('Il campo Motivazione non rispetta il formato', $res);
	}


	public function testModSPQobtEmpty()
	{
		$res = SeduteControl::modSPQ('Definizione problema mod', 'Aspettative paziente mod', 'Motivazione mod', '', '', 1);
		self::assertEquals('Il campo Obiettivi è vuoto', $res);
	}


	public function testModSPQobtFormatoError()
	{
		$res = SeduteControl::modSPQ('Definizione problema mod', 'Aspettative paziente mod', 'Motivazione mod', 'Obiettivi mod@', '', 1);
		self::assertEquals('Il campo Obiettivi non rispetta il formato', $res);
	}


	public function testModSPQdefCambEmpty()
	{
		$res = SeduteControl::modSPQ('Definizione problema mod', 'Aspettative paziente mod', 'Motivazione mod', 'Obiettivi mod', '', 1);
		self::assertEquals('Il campo Definizione Cambiamento è vuoto', $res);
	}


	public function testModSPQdefCambFormatoError()
	{
		$res = SeduteControl::modSPQ('Definizione problema mod', 'Aspettative paziente mod', 'Motivazione mod', 'Obiettivi mod', 'Definizione cambiamento mod@', 1);
		self::assertEquals('Il campo Definizione Cambiamento non rispetta il formato', $res);
	}


	public function testModSPQsuccess()
	{
		$res = SeduteControl::modSPQ('Definizione problema mod', 'Aspettative paziente mod', 'Motivazione mod', 'Obiettivi mod', 'Definizione cambiamento mod', 1);
		self::assertEquals(true, $res);
	}
}
