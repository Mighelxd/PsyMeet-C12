<?php
declare(strict_types=1);


use PHPUnit\Framework\TestCase;


class SchedaAssessmentGeneralizzatoTest extends TestCase
{
	public function testGetSelfManagementPositivi()
	{
		$sag = new SchedaAssessmentGeneralizzato(1, '2021-01-20', 'autoreg positivi', 'aa', 'cogn positivi', 'a', 'self mngm positivi', 'self mngm negativi', 'a', 'a', 1, 'Scheda Assessment Generalizzato');
		self::assertEquals('self mngm positivi', $sag->getSelfManagementPositivi());
	}


	public function testGetSelfManagementNegativi()
	{
		$sag = new SchedaAssessmentGeneralizzato(1, '2021-01-20', 'aaa', 'aa', 'a', 'a', 'a', 'self mngm negativi', 'a', 'a', 1, 'Scheda Assessment Generalizzato');
		self::assertEquals('self mngm negativi', $sag->getSelfManagementNegativi());
	}


	public function testGetAutoregPositivi()
	{
		$sag = new SchedaAssessmentGeneralizzato(1, '2021-01-20', 'autoreg positivi', 'aa', 'a', 'a', 'a', 'self mngm negativi', 'a', 'a', 1, 'Scheda Assessment Generalizzato');
		self::assertEquals('autoreg positivi', $sag->getAutoregPositivi());
	}


	public function testGetAutoregNegativi()
	{
		$sag = new SchedaAssessmentGeneralizzato(1, '2021-01-20', 'autoreg positivi', 'autoreg negativi', 'a', 'a', 'a', 'self mngm negativi', 'a', 'a', 1, 'Scheda Assessment Generalizzato');
		self::assertEquals('autoreg negativi', $sag->getAutoregNegativi());
	}


	public function testGetCognitivePositivi()
	{
		$sag = new SchedaAssessmentGeneralizzato(1, '2021-01-20', 'autoreg positivi', 'aa', 'cogn positivi', 'a', 'a', 'self mngm negativi', 'a', 'a', 1, 'Scheda Assessment Generalizzato');
		self::assertEquals('cogn positivi', $sag->getCognitivePositivi());
	}


	public function testGetCognitiveNegativi()
	{
		$sag = new SchedaAssessmentGeneralizzato(1, '2021-01-20', 'autoreg positivi', 'aa', 'cogn positivi', 'cogn negativi', 'a', 'self mngm negativi', 'a', 'a', 1, 'Scheda Assessment Generalizzato');
		self::assertEquals('cogn negativi', $sag->getCognitiveNegativi());
	}


	public function testGetSocialiPositivi()
	{
		$sag = new SchedaAssessmentGeneralizzato(1, '2021-01-20', 'autoreg positivi', 'aa', 'cogn positivi', 'a', 'a', 'self mngm negativi', 'sociali positive', 'sociali negative', 1, 'Scheda Assessment Generalizzato');
		self::assertEquals('sociali positive', $sag->getSocialiPositivi());
	}


	public function testGetSocialiNegativi()
	{
		$sag = new SchedaAssessmentGeneralizzato(1, '2021-01-20', 'autoreg positivi', 'aa', 'cogn positivi', 'a', 'a', 'self mngm negativi', 'a', 'sociali negative', 1, 'Scheda Assessment Generalizzato');
		self::assertEquals('sociali negative', $sag->getSocialiNegativi());
	}


	public function testSetSelfManagementPositivi()
	{
		$sag = new SchedaAssessmentGeneralizzato(1, '2021-01-20', 'autoreg positivi', 'aa', 'cogn positivi', 'a', 'a', 'self mngm negativi', 'a', 'sociali negative', 1, 'Scheda Assessment Generalizzato');
		$sag->setSelfManagementPositivi('smng pos updated');
		self::assertEquals('smng pos updated', $sag->getSelfManagementPositivi());
	}


	public function testSetSelfManagementNegativi()
	{
		$sag = new SchedaAssessmentGeneralizzato(1, '2021-01-20', 'autoreg positivi', 'aa', 'cogn positivi', 'a', 'a', 'self mngm negativi', 'a', 'sociali negative', 1, 'Scheda Assessment Generalizzato');
		$sag->setSelfManagementNegativi('smng neg updated');
		self::assertEquals('smng neg updated', $sag->getSelfManagementNegativi());
	}


	public function testSetAutoregPositivi()
	{
		$sag = new SchedaAssessmentGeneralizzato(1, '2021-01-20', 'autoreg positivi', 'aa', 'cogn positivi', 'a', 'a', 'self mngm negativi', 'a', 'sociali negative', 1, 'Scheda Assessment Generalizzato');
		$sag->setAutoregPositivi('autoreg pos updated');
		self::assertEquals('autoreg pos updated', $sag->getAutoregPositivi());
	}


	public function testSetAutoregNegativi()
	{
		$sag = new SchedaAssessmentGeneralizzato(1, '2021-01-20', 'autoreg positivi', 'aa', 'cogn positivi', 'a', 'a', 'self mngm negativi', 'a', 'sociali negative', 1, 'Scheda Assessment Generalizzato');
		$sag->setAutoregNegativi('autoreg neg updated');
		self::assertEquals('autoreg neg updated', $sag->getAutoregNegativi());
	}


	public function testSetSocialiPositivi()
	{
		$sag = new SchedaAssessmentGeneralizzato(1, '2021-01-20', 'autoreg positivi', 'aa', 'cogn positivi', 'a', 'a', 'self mngm negativi', 'a', 'sociali negative', 1, 'Scheda Assessment Generalizzato');
		$sag->setSocialiPositivi('sociali pos updated');
		self::assertEquals('sociali pos updated', $sag->getSocialiPositivi());
	}


	public function testSetSocialiNegativi()
	{
		$sag = new SchedaAssessmentGeneralizzato(1, '2021-01-20', 'autoreg positivi', 'aa', 'cogn positivi', 'a', 'a', 'self mngm negativi', 'a', 'sociali negative', 1, 'Scheda Assessment Generalizzato');
		$sag->setSocialiNegativi('sociali neg updated');
		self::assertEquals('sociali neg updated', $sag->getSocialiNegativi());
	}


	public function testSetCognitiveNegativi()
	{
		$sag = new SchedaAssessmentGeneralizzato(1, '2021-01-20', 'autoreg positivi', 'aa', 'cogn positivi', 'a', 'a', 'self mngm negativi', 'a', 'sociali negative', 1, 'Scheda Assessment Generalizzato');
		$sag->setCognitiveNegativi('cogn neg updated');
		self::assertEquals('cogn neg updated', $sag->getCognitiveNegativi());
	}


	public function testSetCognitivePositivi()
	{
		$sag = new SchedaAssessmentGeneralizzato(1, '2021-01-20', 'autoreg positivi', 'aa', 'cogn positivi', 'a', 'a', 'self mngm negativi', 'a', 'sociali negative', 1, 'Scheda Assessment Generalizzato');
		$sag->setCognitivePositivi('cogn pos updated');
		self::assertEquals('cogn pos updated', $sag->getCognitivePositivi());
	}
}
