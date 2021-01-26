<?php


use PHPUnit\Framework\TestCase;

class PacchettoTest extends TestCase
{

    public function testGetNSedute()
    {
        $pacc = new Pacchetto(1,1,50,"seduta singola");
        self::assertEquals(1,$pacc->getNSedute());
    }

    public function testGetPrezzo()
    {
        $pacc = new Pacchetto(1,1,50,"seduta singola");
        self::assertEquals(50,$pacc->getPrezzo());
    }

    public function testSetTipologia()
    {
        $pacc = new Pacchetto(1,1,50,"seduta singola");
        $pacc->setTipologia("seduta singola update");
        self::assertEquals("seduta singola update",$pacc->getTipologia());
    }

    public function test__construct()
    {
        $pacc = new Pacchetto(1,1,50,"seduta singola");
        self::assertNotNull($pacc);
    }

    public function testGetIdPacchetto()
    {
        $pacc = new Pacchetto(1,1,50,"seduta singola");
        self::assertEquals(1,$pacc->getIdPacchetto());
    }

    public function testSetNSedute()
    {
        $pacc = new Pacchetto(1,1,50,"seduta singola");
        $pacc->setNSedute(6);
        self::assertEquals(6,$pacc->getNSedute());
    }

    public function testGetTipologia()
    {
        $pacc = new Pacchetto(1,1,50,"seduta singola");
        self::assertEquals("seduta singola",$pacc->getTipologia());
    }

    public function testSetPrezzo()
    {
        $pacc = new Pacchetto(1,1,50,"seduta singola");
        $pacc->setPrezzo(60);
        self::assertEquals(60,$pacc->getPrezzo());
    }
}
