<?php



use PHPUnit\Framework\TestCase;

class ProfessionistaTest extends TestCase
{

    public function testSetPassword()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        $prof -> setPassword("npx767Hb");
        self::assertEquals("npx767Hb", $prof->getPassword());
    }

    public function testSetPubblicazione()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        $prof -> setPubblicazione("nuova pblcz up");
        self::assertEquals("nuova pblcz up", $prof->getPubblicazioni());
    }

    public function testGetTelefono()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        self::assertEquals("0825553647", $prof->getTelefono());
    }

    public function testGetEmail()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        self::assertEquals("mceru@live.it", $prof->getEmail());
    }

    public function testSetPec()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        $prof -> setPec("nuova PEC");
        self::assertEquals("nuova PEC", $prof->getPec());
    }

    public function testGetPartitaIva()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        self::assertEquals("PartitaIVA9", $prof->getPartitaIva());
    }

    public function testGetCognome()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        self::assertEquals("cerullo", $prof->getCognome());
    }

    public function testGetPubblicazioni()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        self::assertEquals("prima pub", $prof->getPubblicazioni());
    }

    public function test__construct()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        self::assertNotNull($prof);
    }

    public function testSetDataNascita()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        $prof -> setDataNascita("1997-10-21");
        self::assertEquals("1997-10-21", $prof->getDataNascita());
    }

    public function testGetCfProf()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        self::assertEquals("RSSSDR80A01F839S", $prof->getCfProf());
    }

    public function testGetPolizzaRc()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        self::assertEquals("tipo polizza", $prof->getPolizzaRc());
    }

    public function testGetTitoloStudio()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        self::assertEquals("titolo studio", $prof->getTitoloStudio());
    }

    public function testSetTelefono()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        $prof -> setTelefono("0825637648");
        self::assertEquals("0825637648", $prof->getTelefono());
    }

    public function testSetIndirizzoStudio()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        $prof -> setIndirizzoStudio("via nuovo ind 34");
        self::assertEquals("via nuovo ind 34", $prof->getIndirizzoStudio());
    }

    public function testGetSpecializzazione()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        self::assertEquals("specializzazione", $prof->getSpecializzazione());
    }

    public function testGetPec()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        self::assertEquals("PEC", $prof->getPec());
    }

    public function testSetCognome()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        $prof -> setCognome("cerz");
        self::assertEquals("cerz", $prof->getCognome());
    }

    public function testGetCellulare()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        self::assertEquals("3336748663", $prof->getCellulare());
    }

    public function testSetEsperienze()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        $prof -> setEsperienze("new exp");
        self::assertEquals("new exp", $prof->getEsperienze());
    }

    public function testGetPassword()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        self::assertEquals("px43Ma", $prof->getPassword());
    }

    public function testGetNIscrizioneAlbo()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        self::assertEquals("A345", $prof->getNIscrizioneAlbo());
    }

    public function testSetPolizzaRc()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        $prof -> setPolizzaRc("new polizza");
        self::assertEquals("new polizza", $prof->getPolizzaRc());
    }

    public function testSetCfProf()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        $prof -> setCfProf("RSSSDR80A01F839T");
        self::assertEquals("RSSSDR80A01F839T", $prof->getCfProf());
    }

    public function testSetPartitaIva()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        $prof -> setPartitaIva("partitaiva8");
        self::assertEquals("partitaiva8", $prof->getPartitaIva());
    }

    public function testSetNIscrizioneAlbo()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        $prof -> setNIscrizioneAlbo("A78");
        self::assertEquals("A78", $prof->getNIscrizioneAlbo());
    }

    public function testGetEsperienze()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        self::assertEquals("exp", $prof->getEsperienze());
    }

    public function testSetEmail()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        $prof -> setEmail("newem@live.it");
        self::assertEquals("newem@live.it", $prof->getEmail());
    }

    public function testGetNome()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        self::assertEquals("mary", $prof->getNome());
    }


    public function testSetNome()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        $prof -> setNome("maria");
        self::assertEquals("maria", $prof->getNome());
    }

    public function testSetSpecializzazione()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        $prof -> setSpecializzazione("new spec");
        self::assertEquals("new spec", $prof->getSpecializzazione());
    }

    public function testGetIndirizzoStudio()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        self::assertEquals("via studio 56", $prof->getIndirizzoStudio());
    }



    public function testSetTitoloStudio()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        $prof -> setTitoloStudio("new tit");
        self::assertEquals("new tit", $prof->getTitoloStudio());
    }

    public function testGetDataNascita()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        self::assertEquals("1997-10-02", $prof->getDataNascita());
    }

    public function testSetCellulare()
    {
        $prof = new Professionista("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mceru@live.it","0825553647","3336748663","px43Ma","via studio 56","exp","prima pub","titolo studio","A345","PartitaIVA9","PEC","specializzazione","tipo polizza",".png");
        $prof -> setCellulare("3334445678");
        self::assertEquals("3334445678", $prof->getCellulare());
    }
}
