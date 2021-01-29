<?php
;


use PHPUnit\Framework\TestCase;

class CartellaClinicaTest extends TestCase
{
	public function testSetFarmaciFNotOk()
	{
		try {
			$cartellaClinica= new CartellaClinica(1, '2020-01-21', 3, 3, 'NA', 'NA', 'RSSMRC80R12H703U', 'NSTFNC94M23H703G');
			$cartellaClinica->setFarmaci('abc@@@');
		} catch (Exception $e) {
			$this->assertEquals('Il campo Farmaci/Psicofarmaci non rispetta il formato', $e->getMessage());
		}
	}


	public function testSetFarmaciOk()
	{
		try {
			$cartellaClinica= new CartellaClinica(1, '2020-01-21', 3, 3, 'NA', 'NA', 'RSSMRC80R12H703U', 'NSTFNC94M23H703G');
			$cartellaClinica->setFarmaci('abc');
			$this->assertEquals('abc', $cartellaClinica->getFarmaci());
		} catch (Exception $e) {
			$this->assertEquals('Il campo Farmaci/Psicofarmaci non rispetta il formato', $e->getMessage());
		}
	}


	public function testSetUmoreLNotOk()
	{
		try {
			$cartellaClinica= new CartellaClinica(1, '2020-01-21', 3, 3, 'NA', 'NA', 'RSSMRC80R12H703U', 'NSTFNC94M23H703G');
			$cartellaClinica->setQualitaUmore(11);

		} catch (Exception $e) {
			self::assertEquals('Il campo Qualità Umore non rispetta la lunghezza', $e->getMessage());
		}
	}


	public function testSetUmoreFNotOk()
	{
		try {
			$cartellaClinica= new CartellaClinica(1, '2020-01-21', 3, 3, 'NA', 'NA', 'RSSMRC80R12H703U', 'NSTFNC94M23H703G');
			$cartellaClinica->setQualitaUmore(7);
		} catch (Exception $e) {
			self::assertEquals('Il campo Qualità Umore non rispetta il formato', $e->getMessage());
		}
	}


	public function testSetUmoreOk()
	{
		try {
			$cartellaClinica= new CartellaClinica(1, '2020-01-21', 3, 3, 'NA', 'NA', 'RSSMRC80R12H703U', 'NSTFNC94M23H703G');
			$cartellaClinica->setQualitaUmore(5);
			self::assertEquals(5, $cartellaClinica->getQualitaUmore());
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}


	public function testSetPatologieFNotOk()
	{
		try {
			$cartellaClinica= new CartellaClinica(1, '2020-01-21', 3, 3, 'NA', 'NA', 'RSSMRC80R12H703U', 'NSTFNC94M23H703G');
			$cartellaClinica->setPatologiePregresse('abc@@@');
		} catch (Exception $e) {
			self::assertEquals('Il campo Patologie pregresse non rispetta il formato', $e->getMessage());
		}
	}


	public function testSetPatologieOk()
	{
		try {
			$cartellaClinica= new CartellaClinica(1, '2020-01-21', 3, 3, 'NA', 'NA', 'RSSMRC80R12H703U', 'NSTFNC94M23H703G');
			$cartellaClinica->setPatologiePregresse('abc');
			$this->assertEquals('abc', $cartellaClinica->getPatologiePregresse());
		} catch (Exception $e) {
			$this->assertEquals('Il campo Farmaci/Psicofarmaci non rispetta il formato', $e->getMessage());
		}
	}


	public function testSetRelazioniLNotOk()
	{
		try {
			$cartellaClinica= new CartellaClinica(1, '2020-01-21', 3, 3, 'NA', 'NA', 'RSSMRC80R12H703U', 'NSTFNC94M23H703G');
			$cartellaClinica->setQualitaRelazioni(33);
		} catch (Exception $e) {
			self::assertEquals('Il campo Qualità relazioni affettive non rispetta la lunghezza', $e->getMessage());
		}
	}


	public function testSetRelazioniFNotOk()
	{
		try {
			$cartellaClinica= new CartellaClinica(1, '2020-01-21', 3, 3, 'NA', 'NA', 'RSSMRC80R12H703U', 'NSTFNC94M23H703G');
			$cartellaClinica->setQualitaRelazioni(7);
		} catch (Exception $e) {
			self::assertEquals('Il campo Qualità relazioni affettive non rispetta il formato', $e->getMessage());
		}
	}


	public function testSetRelazioniOk()
	{
		try {
			$cartellaClinica= new CartellaClinica(1, '2020-01-21', 3, 3, 'NA', 'NA', 'RSSMRC80R12H703U', 'NSTFNC94M23H703G');
			$cartellaClinica->setQualitaRelazioni(5);
			self::assertEquals(5, $cartellaClinica->getQualitaRealazioni());
		} catch (Exception $e) {
			self::assertEquals('Il campo Qualità Umore non rispetta il formato', $e->getMessage());
		}
	}
}
