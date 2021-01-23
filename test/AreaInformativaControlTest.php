<?php


use PHPUnit\Framework\TestCase;
include "../applicationLogic/AreaInformativaControl.php";
include "../storage/Professionista.php";
include "../storage/DatabaseInterface.php";
include "../plugins/libArray/FunArray.php";
class AreaInformativaControlTest extends TestCase
{
    /*public function testRegistrazioneLNomeNotOk()
    {
        AreaInformativaControl::saveProf("JZFDMM50C56E648Q","A","Aaaaaa","1999-11-11","Example@email.it","0892731825","3881234567","passwordProfessionista123@","Via studio, 34","aaaaaaaaaaa","aaaaaaaaaaaaaa","aaaaaaaaaa","122/a","11111111111","Example@email.it","spec","testopolizza","immagine");

    }*/
    public function testUpdateSchedaProfessionistaFCellNotOk()
    {
        $result=AreaInformativaControl::updateSchedaProfessionista("RSSMRC80R12H703U", "0818888888","123Abc4567","Email@gmail.com","Password1.","Laurea","NA","NA","Via studio 1");
        self::assertEquals("Il campo Cellulare non rispetta il formato",$result);
    }
    public function testUpdateSchedaProfessionistaLTelNotOk()
    {
        $result=AreaInformativaControl::updateSchedaProfessionista("RSSMRC80R12H703U", "081888","123Abc4567","Email@gmail.com","Password1.","Laurea","NA","NA","Via studio 1");
        self::assertEquals("Il campo telefono non rispetta la lunghezza",$result);
    }
    public function testUpdateSchedaProfessionistaFIndirizzoNotOk()
    {
            $result=AreaInformativaControl::updateSchedaProfessionista("RSSMRC80R12H703U", "0818888888","3333333333","Email@gmail.com","Password1.","Laurea","NA","NA","@");
            self::assertEquals("Il campo indirizzo studio non rispetta il formato",$result);
    }
    public function testUpdateSchedaProfessionistaLEmailNotOk()
    {
        $result=AreaInformativaControl::updateSchedaProfessionista("RSSMRC80R12H703U", "0818888888","3333333333","Emailllllllllllllllllllllllllllllllllllllllllllllllllll@gmail.com ","Password1.","Laurea","NA","NA","Via studio 1");
        self::assertEquals("Il campo indirizzo studio non rispetta il formato",$result);
    }

}
