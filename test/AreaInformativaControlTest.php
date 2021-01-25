<?php


use PHPUnit\Framework\TestCase;
include "../applicationLogic/AreaInformativaControl.php";
include "../storage/Professionista.php";
include "../storage/DatabaseInterface.php";
include "../plugins/libArray/FunArray.php";
include "../storage/Paziente.php";
class AreaInformativaControlTest extends TestCase
{
    public function testRegistrazioneProfessionistaLNomeNotOk(){
        $result=AreaInformativaControl::saveProf("JZFDMM50C56E648Q","A","Aaaaaa","1999-11-11","Example@email.it","0892731825","3881234567","PasswordProfessionista123@","Via studio, 34","Aaaaaaaaaaa","Aaaaaaaaaaaaaa","Aaaaaaaaaa","122/a","11111111111","Example2@email.it","Aaaaaaaaaa","Aaaa3aa","");
        self::assertEquals("Il campo Nome non rispetta la lunghezza",$result);
    }
    public function testRegistrazioneProfessionistaLCognomeNotOk(){
        $result=AreaInformativaControl::saveProf("JZFDMM50C56E648Q","A aaaaa","A","1999-11-11","Example@email.it","0892731825","3881234567","PasswordProfessionista123@","Via studio, 34","Aaaaaaaaaaa","Aaaaaaaaaaaaaa","Aaaaaaaaaa","122/a","11111111111","Example2@email.it","Aaaaaaaaaa","Aaaa3aa","");
        self::assertEquals("Il campo Cognome non rispetta la lunghezza",$result);
    }
    //public function testRegistrazioneProfessionistaFDataNotOk(){
    public function testRegistrazioneProfessionistaFCodiceNotOk(){
        $result=AreaInformativaControl::saveProf("JZFDMM50C56@648Q","A aaaaa","Aaaaaaaa","1999-11-11","Example@email.it","0892731825","3881234567","PasswordProfessionista123@","Via studio, 34","Aaaaaaaaaaa","Aaaaaaaaaaaaaa","Aaaaaaaaaa","122/a","11111111111","Example2@email.it","Aaaaaaaaaa","Aaaa3aa","");
        self::assertEquals("Il campo Codice Fiscale non rispetta il formato",$result);
    }
    public function testRegistrazioneProfessionistaLTitoloStNotOk(){
        $result=AreaInformativaControl::saveProf("JZFDMM50C56E648Q","A aaaaa","Aaaaaaaa","1999-11-11","Example@email.it","0892731825","3881234567","PasswordProfessionista123@","Via studio, 34","Aaaaaaaaaaa","Aaaaaaaaaaaaaa","A","122/a","11111111111","Example2@email.it","Aaaaaaaaaa","Aaaa3aa","");
        self::assertEquals("Il campo Titolo di studio non rispetta la lunghezza",$result);
    }
    public function testRegistrazioneProfessionistaLSpecNotOk(){
        $result=AreaInformativaControl::saveProf("JZFDMM50C56E648Q","A aaaaa","Aaaaaaaa","1999-11-11","Example@email.it","0892731825","3881234567","PasswordProfessionista123@","Via studio, 34","Aaaaaaaaaaa","Aaaaaaaaaaaaaa","Aaaaaaaa","122/a","11111111111","Example2@email.it","A","Aaaa3aa","");
        self::assertEquals("Il campo Specializzazione non rispetta la lunghezza",$result);
    }
    public function testRegistrazioneProfessionistaLPubbNotOk(){
        $result=AreaInformativaControl::saveProf("JZFDMM50C56E648Q","A aaaaa","Aaaaaaaa","1999-11-11","Example@email.it","0892731825","3881234567","PasswordProfessionista123@","Via studio, 34","Aaaaaaaaaaa","A","Aaaaaaaa","122/a","11111111111","Example2@email.it","Aaaaaaaaaa","Aaaa3aa","");
        self::assertEquals("Il campo Pubblicazioni Scientifiche/Partecipazioni non rispetta la lunghezza",$result);
    }
    public function testRegistrazioneProfessionistaFEspNotOk(){
        $result=AreaInformativaControl::saveProf("JZFDMM50C56E648Q","A aaaaa","Aaaaaaaa","1999-11-11","Example@email.it","0892731825","3881234567","PasswordProfessionista123@","Via studio, 34","Aaaaaaaaaaa @","Aaaaaaaa","Aaaaaaaa","122/a","11111111111","Example2@email.it","Aaaaaaaaaa","Aaaa3aa","");
        self::assertEquals("Il campo Esperienze Professionali non rispetta il formato",$result);
    }
    public function testRegistrazioneProfessionistaFNALbNotOk(){
        $result=AreaInformativaControl::saveProf("JZFDMM50C56E648Q","A aaaaa","Aaaaaaaa","1999-11-11","Example@email.it","0892731825","3881234567","PasswordProfessionista123@","Via studio, 34","Aaaaaaaaaaa","Aaaaaaaa","Aaaaaaaa","122/a @","11111111111","Example2@email.it","Aaaaaaaaaa","Aaaa3aa","");
        self::assertEquals("Il campo Numero Iscrizione Albo non rispetta il formato",$result);
    }
    public function testRegistrazioneProfessionistaOk(){
        $result=AreaInformativaControl::saveProf("JZFDMM50C56E648Q","A aaaaa","Aaaaaaaa","1999-11-11","Example@email.it","0892731825","3881234567","PasswordProfessionista123@","Via studio, 34","Aaaaaaaaaaa","Aaaaaaaa","Aaaaaaaa","122/a","11111111111","Example2@email.it","Aaaaaaaaaa","Aaaa3aa","");
        self::assertEquals(true,$result);
    }

    public function testUpdateSchedaProfessionistaFCellNotOk()
    {
        $result=AreaInformativaControl::updateSchedaProfessionista("RSSMRC80R12H703U", "0818888888","123Abc4567","Email@gmail.com","Password1.","Laurea","Aaaaaaaaaaa","Aaaaaaaaaaa","Via studio 1");
        self::assertEquals("Il campo Cellulare non rispetta il formato",$result);
    }
    public function testUpdateSchedaProfessionistaLTelNotOk()
    {
        $result=AreaInformativaControl::updateSchedaProfessionista("RSSMRC80R12H703U", "081888","3333333333","Email@gmail.com","Password1.","Laurea","Aaaaaaaaaaa","Aaaaaaaaaaa","Via studio 1");
        self::assertEquals("Il campo telefono non rispetta la lunghezza",$result);
    }
    public function testUpdateSchedaProfessionistaFIndirizzoNotOk()
    {
        $result=AreaInformativaControl::updateSchedaProfessionista("RSSMRC80R12H703U", "0818888888","3333333333","Email@gmail.com","Password1.","Laurea","Aaaaaaaaaaa","Aaaaaaaaaaa","@");
            self::assertEquals("Il campo indirizzo studio non rispetta il formato",$result);
    }
    public function testUpdateSchedaProfessionistaLEmailNotOk()
    {
        $result=AreaInformativaControl::updateSchedaProfessionista("RSSMRC80R12H703U", "0818888888","3333333333","Emailllllllllllllllllllllllllllllllllllllllllllllllllll@gmail.com","Password1.","Laurea","Aaaaaaaaaaa","Aaaaaaaaaaa","Via studio 1");
        self::assertEquals("Il campo email non rispetta la lunghezza",$result);
    }
    public function testUpdateSchedaProfessionistaFEmailNotOk()
    {
        $result=AreaInformativaControl::updateSchedaProfessionista("RSSMRC80R12H703U", "0818888888","3333333333","Emailgmail.com","Password1.","Laurea","Aaaaaaaaaaa","Aaaaaaaaaaa","Via studio 1");
        self::assertEquals("Il campo email non rispetta il formato",$result);
    }
    public function testUpdateSchedaProfessionistaLPubNotOk()
    {
        $result=AreaInformativaControl::updateSchedaProfessionista("RSSMRC80R12H703U", "0818888888","3333333333","Email@gmail.com","Password1.","Laurea","N","Aaaaaaaaaaa","Via studio 1");
        self::assertEquals("Il campo pubblicazioni non rispetta la lunghezza",$result);
    }
    public function testUpdateSchedaProfessionistaOk()
    {
        $result=AreaInformativaControl::updateSchedaProfessionista("RSSMRC80R12H703U", "0818888888","3333333333","Email@gmail.com","Password1.","Laurea","Aaaaaaaaaa","Aaaaaaaaaaa","Via studio 1");
        self::assertEquals(true,$result);
    }

   public function testRegistrazionePazienteFCognomeNotOk(){
        $result=AreaInformativaControl::savePaz("RSSSDR80A01F839S","Marg","adfvsfdvfdgdf9","1980-12-31","marco@gmail.it","1234567890","marcocampione","Via strada","diploma","nessuno",2,null);
        self::assertEquals("Il campo cognome non rispetta il formato",$result);
    }
    public function testRegistrazionePazienteCognomeNotOk(){
        $result=AreaInformativaControl::savePaz("RSSSDR80A01F839S","Marg","","1980-12-31","marco@gmail.it","1234567890","marcocampione","Via strada","diploma","nessuno",2,null);
        self::assertEquals("Il campo cognome è vuoto",$result);
    }
    public function testRegistrazionePazienteLCfNotOk(){
        $result=AreaInformativaControl::savePaz("RSSSDR80A01F839SCCC","marco","campione","1980-12-31","marco@gmail.it","1234567890","marcocampione","Via strada","diploma","nessuno",2,null);
        self::assertEquals("Il campo codice fiscale non rispetta la lunghezza",$result);
    }
    public function testRegistrazionePazienteFEmailNotOk(){
        $result=AreaInformativaControl::savePaz("RSSSDR80A01F839S","marco","campione","1980-12-31","marcogmail.it","1234567890","marcocampione","Via strada","diploma","nessuno",2,null);
        self::assertEquals("Il campo email non rispetta il formato",$result);
    }
    public function testRegistrazionePazienteFIndirizzoNotOk(){
        $result=AreaInformativaControl::savePaz("RSSSDR80A01F839S","marco","campione","1980-12-31","marco@gmail.it","1234567890","marcocampione","Via strada@","diploma","nessuno",2,null);
        self::assertEquals("Il campo indirizzo non rispetta il formato",$result);
    }
    public function testRegistrazionePazienteRDifficoltaNotOk(){
        $result=AreaInformativaControl::savePaz("RSSSDR80A01F839S","marco","campione","1980-12-31","marco@gmail.it","1234567890","marcocampione","Via strada","diploma","nessuno",9,null);
        self::assertEquals("Il campo difficoltà cura non rispetta il formato",$result);
    }
    public function testRegistrazionePazienteVDifficoltaNotOk(){
        $result=AreaInformativaControl::savePaz("RSSSDR80A01F839S","marco","campione","1980-12-31","marco@gmail.it","1234567890","marcocampione","Via strada","diploma","nessuno",null,null);
        self::assertEquals("Il campo difficoltà cura è vuoto",$result);
    }
    public function testRegistrazionePazienteOk(){
        $result=AreaInformativaControl::savePaz("RSSSDR80A01F839S","marco","campione","1980-12-31","marco@gmail.it","1234567890","marcocampione","Via strada","diploma","nessuno",2,null);
        self::assertEquals(true,$result);
    }
}
