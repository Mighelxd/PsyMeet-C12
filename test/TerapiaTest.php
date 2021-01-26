<?php


use PHPUnit\Framework\TestCase;



class TerapiaTest extends TestCase
{

    public function testGetCfProf()
    {
        $ter = new Terapia(1,"2021-01-21","desc","RSSSDR80A01F839S","BNCSDR80A01F839S");
        self::assertEquals("RSSSDR80A01F839S",$ter ->getCfProf());
    }

    public function testSetDescrizione()
    {
        $ter = new Terapia(1,"2021-01-21","desc","RSSSDR80A01F839S","BNCSDR80A01F839S");
        $ter ->setDescrizione("desc updated");
        self::assertEquals("desc updated",$ter ->getDescrizione());
    }

    public function testSetData()
    {
        $ter = new Terapia(1,"2021-01-21","desc","RSSSDR80A01F839S","BNCSDR80A01F839S");
        $ter ->setData("2021-01-22");
        self::assertEquals("2021-01-22",$ter ->getData());
    }

    public function testSetCf_Prof()
    {
        $ter = new Terapia(1,"2021-01-21","desc","RSSSDR80A01F839S","BNCSDR80A01F839S");
        $ter ->setCf_Prof("RSSSDR80A01F839B");
        self::assertEquals("RSSSDR80A01F839B",$ter ->getCfProf());
    }

    public function testGetData()
    {
        $ter = new Terapia(1,"2021-01-21","desc","RSSSDR80A01F839S","BNCSDR80A01F839S");
        self::assertEquals("2021-01-21",$ter ->getData());
    }

    public function testSetCf()
    {
        $ter = new Terapia(1,"2021-01-21","desc","RSSSDR80A01F839S","BNCSDR80A01F839S");
        $ter ->setCf("BNCSDR80A01F839D");
        self::assertEquals("BNCSDR80A01F839D",$ter ->getCf());
    }

    public function testGetDescrizione()
    {
        $ter = new Terapia(1,"2021-01-21","desc","RSSSDR80A01F839S","BNCSDR80A01F839S");
        self::assertEquals("desc",$ter ->getDescrizione());
    }

    public function testGetCf()
    {
        $ter = new Terapia(1,"2021-01-21","desc","RSSSDR80A01F839S","BNCSDR80A01F839S");
        self::assertEquals("BNCSDR80A01F839S",$ter ->getCf());
    }


    public function testGetIdTerapia()
    {
        $ter = new Terapia(1,"2021-01-21","desc","RSSSDR80A01F839S","BNCSDR80A01F839S");
        self::assertEquals(1,$ter ->getIdTerapia());
    }

    public function test__construct()
    {
        $ter = new Terapia(1,"2021-01-21","desc","RSSSDR80A01F839S","BNCSDR80A01F839S");
        self::assertNotNull($ter);
    }
}
