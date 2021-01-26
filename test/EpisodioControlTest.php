<?php


use PHPUnit\Framework\TestCase;


class EpisodioControlTest extends TestCase
{
    public function testAddEpAnFunEmpty(){
        $res = SeduteControl::addEpisodio('1','','Aaa','Aaa','Aaa','Aaa','1');
        self::assertEquals("Il campo analisi funzionale è vuoto",$res);
    }

    public function testAddEpAnFunFormatoNonCorretto(){
        $res = SeduteControl::addEpisodio('1','aaaaaa@','Aaa','Aaa','Aaa','Aaa','1');
        self::assertEquals("Il campo analisi funzionale non rispetta il formato",$res);
    }

    public function testAddEpMaEmpty(){
        $res = SeduteControl::addEpisodio('1','aaa','','Aaa','Aaa','Aaa','1');
        self::assertEquals("Il campo A è vuoto",$res);
    }

    public function testAddEpMaFormatoNonCorretto(){
        $res = SeduteControl::addEpisodio('1','Aaa','aaaaaaa@','Aaa','Aaa','Aaa','1');
        self::assertEquals("Il campo A non rispetta il formato",$res);
    }

    public function testAddEpMbEmpty(){
        $res = SeduteControl::addEpisodio('1','Aaa','Aaa','','Aaa','Aaa','1');
        self::assertEquals("Il campo B è vuoto",$res);
    }

    public function testAddEpMbFormatoNonCorretto(){
        $res = SeduteControl::addEpisodio('1','Aaa','Aaa','aaaaa@','Aaa','Aaa','1');
        self::assertEquals("Il campo B non rispetta il formato",$res);
    }

    public function testAddEpMcEmpty(){
        $res = SeduteControl::addEpisodio('1','Aaa','Aaa','Aaa','','aaa','1');
        self::assertEquals("Il campo C è vuoto",$res);
    }

    public function testAddEpMcFormatoNonCorretto(){
        $res = SeduteControl::addEpisodio('1','Aaa','Aaa','Aaa','aaaa@','Aaa','1');
        self::assertEquals("Il campo C non rispetta il formato",$res);
    }

    public function testAddEpAppEmpty(){
        $res = SeduteControl::addEpisodio('1','Aaa','Aaa','Aaa','Aaa','','1');
        self::assertEquals("Il campo appunti terapeuta è vuoto",$res);
    }
    public function testAddEpSuccess(){
        $res = SeduteControl::addEpisodio('1','Aaa','Aaa','Aaa','Aaa','Aaa','1');
        self::assertEquals(true,$res);
    }
    /*Modifica*/

    public function testModEpAnFunEmpty(){
        $res = SeduteControl::modEpisodio('1','','Bbb','Bbb','Bbb','Bbb','1');
        self::assertEquals("Il campo analisi funzionale è vuoto",$res);
    }
    public function testModEpAnFunFormatoNonCorretto(){
        $res = SeduteControl::modEpisodio('1','aaaaaa@','Bbb','Bbb','Bbb','Bbb','1');
        self::assertEquals("Il campo analisi funzionale non rispetta il formato",$res);
    }

    public function testModEpMaEmpty(){
        $res = SeduteControl::modEpisodio('1','bbb','','Bbb','Bbb','Bbb','1');
        self::assertEquals("Il campo A è vuoto",$res);
    }

    public function testModEpMaFormatoNonCorretto(){
        $res = SeduteControl::modEpisodio('1','Bbb','Aaaaaaa@','Bbb','Bbb','Bbb','1');
        self::assertEquals("Il campo A non rispetta il formato",$res);
    }

    public function testModEpMbEmpty(){
        $res = SeduteControl::modEpisodio('1','Bbb','bbb','','Bbb','Bbb','1');
        self::assertEquals("Il campo B è vuoto",$res);
    }

    public function testModEpMbFormatoNonCorretto(){
        $res = SeduteControl::modEpisodio('1','Bbb','Bbb','aaaaa@','Bbb','Bbb','1');
        self::assertEquals("Il campo B non rispetta il formato",$res);
    }

    public function testModEpMcEmpty(){
        $res = SeduteControl::modEpisodio('1','Bbb','Bbb','Bbb','','Bbb','1');
        self::assertEquals("Il campo C è vuoto",$res);
    }

    public function testModEpMcFormatoNonCorretto(){
        $res = SeduteControl::modEpisodio('1','Bbb','Bbb','Bbb','aaaa@','Bbb','1');
        self::assertEquals("Il campo C non rispetta il formato",$res);
    }

    public function testModEpAppEmpty(){
        $res = SeduteControl::modEpisodio('1','Bbb','Bbb','Bbb','Bbb','','1');
        self::assertEquals("Il campo appunti terapeuta è vuoto",$res);
    }
    public function testModEpSuccess(){
        $res = SeduteControl::modEpisodio('1','Bbb','Bbb','Bbb','Bbb','Bbb','1');
        self::assertEquals(true,$res);
    }
}
