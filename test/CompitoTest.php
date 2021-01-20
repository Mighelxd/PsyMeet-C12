<?php


use PHPUnit\Framework\TestCase;

include 'storage/Compito.php';

class CompitoTest extends TestCase
{

    public function testGetCfProf()
    {
        $comp = new Compito(1,"2021-01-20",1,"titolo","desc","svlg","corr","AAA","AAA");
        self::assertEquals("AAA", $comp ->getCfProf());

    }

    public function testGetData()
    {
        $comp = new Compito(1,"2021-01-20",1,"titolo","desc","svlg","corr","AAA","AAA");
        self::assertEquals("2021-01-20", $comp ->getData());

    }


    public function testSetData()
    {
        date_default_timezone_set("Europe/Rome");
        $currDate = date("Y-m-d");
        $comp = new Compito(1,"2021-01-20",1,"titolo","desc","svlg","corr","AAA","AAA");
        $comp -> setData($currDate);
        self::assertEquals(date("Y-m-d"), $comp ->getData());

    }


    public function testGetDescrizione()
    {
        $comp = new Compito(1,"2021-01-20",1,"titolo","desc","svlg","corr","AAA","AAA");
        self::assertEquals("desc", $comp ->getDescrizione());

    }


    public function testGetCorrezione()
    {
        $comp = new Compito(1,"2021-01-20",1,"titolo","desc","svlg","corr","AAA","AAA");
        self::assertEquals("corr", $comp ->getCorrezione());

    }


    public function testGetSvolgimento()
    {
        $comp = new Compito(1,"2021-01-20",1,"titolo","desc","svlg","corr","AAA","AAA");
        self::assertEquals("svlg", $comp ->getSvolgimento());

    }

    public function test__construct()
    {
        $comp = new Compito(1,"2021-01-20",1,"titolo","desc","svlg","corr","AAA","AAA");
        self::assertNotNull($comp);
    }



    public function testSetCorrezione()
    {
        $comp = new Compito(1,"2021-01-20",1,"titolo","desc","svlg","corr","AAA","AAA");
        $comp -> setCorrezione("corr updated");
        self::assertEquals("corr updated", $comp ->getCorrezione());
    }

    public function testGetCfPaz()
    {
        $comp = new Compito(1,"2021-01-20",1,"titolo","desc","svlg","corr","AAA","AAA");
        self::assertEquals("AAA", $comp ->getCfProf());

    }


    public function testSetTitolo()
    {
        $comp = new Compito(1,"2021-01-20",1,"titolo","desc","svlg","corr","AAA","AAA");
        $comp -> setTitolo("TitoLo Updated");
        self::assertEquals("TitoLo Updated", $comp ->getTitolo());
    }

    public function testGetEffettuato()
    {
        $comp = new Compito(1,"2021-01-20",1,"titolo","desc","svlg","corr","AAA","AAA");
        self::assertEquals(1, $comp ->getEffettuato());

    }


    public function testSetSvolgimento()
    {
        $comp = new Compito(1,"2021-01-20",1,"titolo","desc","svlg","corr","AAA","AAA");
        $comp -> setSvolgimento("svlg updated");
        self::assertEquals("svlg updated", $comp ->getSvolgimento());
    }

    public function testSetDescrizione()
    {
        $comp = new Compito(1,"2021-01-20",1,"titolo","desc","svlg","corr","AAA","AAA");
        $comp -> setDescrizione("D3sc updated");
        self::assertEquals("D3sc updated", $comp ->getDescrizione());
    }

    public function testSetEffettuato()
    {
        $comp = new Compito(1,"2021-01-20",1,"titolo","desc","svlg","corr","AAA","AAA");
        $comp -> setEffettuato(2);
        self::assertEquals(2, $comp ->getEffettuato());
    }


    public function testGetId()
    {
        $comp = new Compito(1,"2021-01-20",1,"titolo","desc","svlg","corr","AAA","AAA");
        self::assertEquals(1, $comp ->getId());

    }


    public function testGetTitolo()
    {
        $comp = new Compito(1,"2021-01-20",1,"titolo","desc","svlg","corr","AAA","AAA");
        self::assertEquals("titolo", $comp ->getTitolo());

    }


}
