<?php



use PHPUnit\Framework\TestCase;

class PazienteTest extends TestCase
{

    public function testGetNome()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        self::assertEquals("mary", $paz->getNome());
    }

    public function testGetCognome()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        self::assertEquals("cerullo", $paz->getCognome());
    }

    public function testGetIndirizzo()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        self::assertEquals("via ind 4", $paz->getIndirizzo());
    }

    public function testSetCognome()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        $paz->setCognome("cerulli");
        self::assertEquals("cerulli", $paz->getCognome());
    }

    public function testSetNome()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        $paz->setNome("maria");
        self::assertEquals("maria", $paz->getNome());
    }

    public function testSetDataNascita()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        $paz->setDataNascita("1990-12-12");
        self::assertEquals("1990-12-12", $paz->getDataNascita());
    }

    public function testSetEmail()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        $paz->setEmail("mc3aa@live.it");
        self::assertEquals("mc3aa@live.it", $paz->getEmail());
    }

    public function testSetTelefono()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        $paz->setTelefono("3335557889");
        self::assertEquals("3335557889", $paz->getTelefono());
    }

    public function testSetVideo()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        $paz->setVideo(".mp4");
        self::assertEquals(".mp4", $paz->getVideo());
    }

    public function testGetDifficolCura()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        self::assertEquals(5, $paz->getDifficolCura());
    }

    public function testSetDifficolCura()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        $paz->setDifficolCura(2);
        self::assertEquals(2, $paz->getDifficolCura());
    }

    public function testSetLavoro()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        $paz->setLavoro("lavoro up");
        self::assertEquals("lavoro up", $paz->getLavoro());
    }

    public function test__construct()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        self::assertNotNull($paz);
    }

    public function testGetDataNascita()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        self::assertEquals("1997-10-02", $paz->getDataNascita());
    }

    public function testSetCf()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        $paz->setCf("RSBCDR80A01F839S");
        self::assertEquals("RSBCDR80A01F839S", $paz->getCf());
    }

    public function testGetPassword()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        self::assertEquals("marycer", $paz->getPassword());
    }

    public function testGetLavoro()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        self::assertEquals("3334445667", $paz->getTelefono());
    }

    public function testSetPassword()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        $paz->setPassword("mary888cH");
        self::assertEquals("mary888cH", $paz->getPassword());
    }

    public function testGetTelefono()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        self::assertEquals("3334445667", $paz->getTelefono());
    }

    public function testSetIndirizzo()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        $paz->setIndirizzo("via roma 14");
        self::assertEquals("via roma 14", $paz->getIndirizzo());
    }

    public function testGetEmail()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        self::assertEquals("mcer@gmail.com", $paz->getEmail());
    }

    public function testSetIstruzione()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        $paz->setIstruzione("istruzione up");
        self::assertEquals("istruzione up", $paz->getIstruzione());
    }

    public function testGetCf()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        self::assertEquals("RSSSDR80A01F839S", $paz->getCf());
    }

    public function testGetIstruzione()
    {
        $paz = new Paziente("RSSSDR80A01F839S","mary","cerullo","1997-10-02","mcer@gmail.com","3334445667","marycer","via ind 4","istruzione","lavoro",5,".png",".mp4");
        self::assertEquals("istruzione", $paz->getIstruzione());
    }
}
