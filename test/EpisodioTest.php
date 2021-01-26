<?php


use PHPUnit\Framework\TestCase;

class EpisodioTest extends TestCase
{

    public function testGetMA()
    {
        $ep = new Episodio(1,1,"analisiFunz","Ma","Mb","Mc","appunti",1);
        self::assertEquals("Ma",$ep->getMA());
    }

    public function testSetMC()
    {
        $ep = new Episodio(1,1,"analisiFunz","Ma","Mb","Mc","appunti",1);
        $ep -> setMC("Mc");
        self::assertEquals("Mc", $ep->getMC());
    }

    public function testGetNum()
    {
        $ep = new Episodio(1,1,"analisiFunz","Ma","Mb","Mc","appunti",1);
        self::assertEquals(1,$ep->getNum());
    }

    public function testSetMA()
    {
        $ep = new Episodio(1,1,"analisiFunzionale","Ma","Mb","Mc","appunti",1);
        $ep -> setMa("Ma");
        self::assertEquals("Ma", $ep->getMA());
    }

    public function testSetAnalisiFun()
    {
        $ep = new Episodio(1,1,"analisiFunzionale","Ma","Mb","Mc","appunti",1);
        $ep -> setAnalisiFun("analisiFunz");
        self::assertEquals("analisiFunz", $ep->getAnalisiFun());
    }

    public function testGetMB()
    {
        $ep = new Episodio(1,1,"analisiFunz","Ma","Mb","Mc","appunti",1);
        self::assertEquals("Mb",$ep->getMB());
    }

    public function testGetAnalisiFun()
    {
        $ep = new Episodio(1,1,"analisiFunz","Ma","Mb","Mc","appunti",1);
        self::assertEquals("analisiFunz",$ep->getAnalisiFun());
    }

    public function testSetAppunti()
    {
        $ep = new Episodio(1,1,"analisiFunz","Ma","Mb","Mc","appunti",1);
        $ep -> setAppunti("appunti");
        self::assertEquals("appunti", $ep->getAppunti());
    }

    public function testSetMB()
    {
        $ep = new Episodio(1,1,"analisiFunz","Ma","Mb","Mc","appunti", 1);
        $ep -> setMC("Mc");
        self::assertEquals("Mc", $ep->getMC());
    }

    public function testGetId()
    {
        $ep = new Episodio(1,1,"analisiFunz","Ma","Mb","Mc","appunti",1);
        self::assertEquals(1,$ep->getId());
    }

    public function testGetAppunti()
    {
        $ep = new Episodio(1,1,"analisiFunz","Ma","Mb","Mc","appunti",1);
        self::assertEquals("appunti",$ep->getAppunti());
    }

    public function testGetMC()
    {
        $ep = new Episodio(1,1,"analisiFunz","Ma","Mb","Mc","appunti",1);
        self::assertEquals("Mc",$ep->getMC());
    }

}
