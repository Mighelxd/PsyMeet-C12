<?php


use PHPUnit\Framework\TestCase;
include "../plugins/libArray/FunArray.php";
include "../storage/DatabaseInterface.php";
include "../applicationLogic/SeduteControl.php";
include '../storage/SchedaAssessmentFocalizzato.php';
include '../storage/Episodio.php';

class EpisodioControlTest extends TestCase
{
    public function failureTestAddEpisodio(){
        $newEpisodio = new Episodio('1','1','',"Aaa","Aaa","Aaa",'Aaa','1');
        $res = SeduteControl::addEpisodio($newEpisodio->getNum(),$newEpisodio->getAnalisiFun(),$newEpisodio->getMA(),$newEpisodio->getMB(),$newEpisodio->getMC(),$newEpisodio->getAppunti(),$newEpisodio->getIdScheda());
        self::assertEquals("Il campo analisi funzionale è vuoto",$res);
    }
}
