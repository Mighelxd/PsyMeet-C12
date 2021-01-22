<?php

include 'storage/Fattura.php';

use PHPUnit\Framework\TestCase;

class FatturaTest extends TestCase
{

    public function test__construct()
    {
        $fatt = new Fattura(12,"2021-01-22","RSSSDR80A01F839S",3,5);
        self::assertNotNull($fatt);
    }

    public function testGetIdFattura()
    {
        $fatt = new Fattura(12,"2021-01-22","RSSSDR80A01F839S",3,5);
        self::assertEquals(12, $fatt->getIdFattura());

    }

    public function testSetNSeduteRim()
    {
        $fatt = new Fattura(12,"2021-01-22","RSSSDR80A01F839S",3,5);
        $fatt ->setNSeduteRim(3);
        self::assertEquals(3, $fatt->getNSeduteRim());
    }

    public function testGetIdScelta()
    {
        $fatt = new Fattura(12,"2021-01-22","RSSSDR80A01F839S",3,5);
        self::assertEquals(3, $fatt->getIdScelta());
    }

    public function testSetData()
    {
        $fatt = new Fattura(12,"2021-01-22","RSSSDR80A01F839S",3,5);
        $fatt ->setData("2021-01-25");
        self::assertEquals("2021-01-25", $fatt->getData());
    }

    public function testGetData()
    {
        $fatt = new Fattura(12,"2021-01-22","RSSSDR80A01F839S",3,5);
        self::assertEquals("2021-01-22", $fatt->getData());
    }

    public function testGetCfPaz()
    {
        $fatt = new Fattura(12,"2021-01-22","RSSSDR80A01F839S",3,5);
        self::assertEquals("RSSSDR80A01F839S", $fatt->getCfPaz());
    }

    public function testGetNSeduteRim()
    {
        $fatt = new Fattura(12,"2021-01-22","RSSSDR80A01F839S",3,5);
        self::assertEquals(5, $fatt->getNSeduteRim());
    }
}
