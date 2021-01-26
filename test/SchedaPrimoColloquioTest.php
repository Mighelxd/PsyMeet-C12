<?php


use PHPUnit\Framework\TestCase;



class SchedaPrimoColloquioTest extends TestCase
{
    public function testSetCambiamento()
    {
        $spc = new SchedaPrimoColloquio(1,"2021-01-20","ahahahah","18haha","pocahah","pochiahahah", "nulloahahah",1,"Scheda Primo Colloquio");
        $spc ->setCambiamento("cambiamento update");
        self::assertEquals("cambiamento update",$spc->getCambiamento());
    }

    public function testGetCambiamento()
    {
        $spc = new SchedaPrimoColloquio(1,"2021-01-20","tanti","18haha","pocahah","pochiahahah", "cambiamento",1,"Scheda Primo Colloquio");
        self::assertEquals("cambiamento",$spc->getCambiamento());
    }

    public function testGetObiettivi()
    {
        $spc = new SchedaPrimoColloquio(1,"2021-01-20","tanti","18haha","pocahah","obiettivi", "nulloahah",1,"Scheda Primo Colloquio");
        self::assertEquals("obiettivi",$spc->getObiettivi());
    }

    public function testSetProblema()
    {
        $spc = new SchedaPrimoColloquio(1,"2021-01-20","ahahahah","18haha","pocahah","pochiahah", "nulloahah",1,"Scheda Primo Colloquio");
        $spc ->setProblema("problema update");
        self::assertEquals("problema update",$spc->getProblema());
    }

    public function testSetAspettative()
    {
        $spc = new SchedaPrimoColloquio(1,"2021-01-20","ahahahah","18haha","pocahah","pochiahah", "nulloahah",1,"Scheda Primo Colloquio");
        $spc ->setAspettative("aspettative update");
        self::assertEquals("aspettative update",$spc->getAspettative());
    }

    public function testGetProblema()
    {
        $spc = new SchedaPrimoColloquio(1,"2021-01-20","problema","18haha","pocahah","pochiahah",
            "nulloahah",1,"Scheda Primo Colloquio");
        self::assertEquals("problema",$spc->getProblema());
    }

    public function testGetAspettative()
    {
        $spc = new SchedaPrimoColloquio(1,"2021-01-20","tanti","aspettative","pocahah","pochiahah", "nulloahah",1,"Scheda Primo Colloquio");
        self::assertEquals("aspettative",$spc->getAspettative());
    }

    public function testSetMotivazione()
    {
        $spc = new SchedaPrimoColloquio(1,"2021-01-20","ahahahah","18haha","pocahah","pochiahah", "nulloahah",1,"Scheda Primo Colloquio");
        $spc ->setMotivazione("motivazione update");
        self::assertEquals("motivazione update",$spc->getMotivazione());
    }

    public function testSetObiettivi()
    {
        $spc = new SchedaPrimoColloquio(1,"2021-01-20","ahahahah","18haha","pocahah","pochiahah", "nulloahah",1,"Scheda Primo Colloquio");
        $spc ->setObiettivi("obiettivi update");
        self::assertEquals("obiettivi update",$spc->getObiettivi());
    }

    public function testGetMotivazione()
    {
        $spc = new SchedaPrimoColloquio(1,"2021-01-20","tanti","18haha","motivazione","pochiahah", "nulloahah",1,"Scheda Primo Colloquio");
        self::assertEquals("motivazione",$spc->getMotivazione());
    }
}
