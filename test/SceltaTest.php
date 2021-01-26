<?php



use PHPUnit\Framework\TestCase;

class SceltaTest extends TestCase
{

    public function testGetIdPacchetto()
    {
        $scelta = new Scelta(1,"RSSSDR80A01F839S",2);
        self::assertEquals(2, $scelta->getIdPacchetto());
    }


    public function test__construct()
    {
        $scelta = new Scelta(1,"RSSSDR80A01F839S",2);
        self::assertNotNull($scelta);
    }

    public function testGetIdScelta()
    {
        $scelta = new Scelta(1,"RSSSDR80A01F839S",2);
        self::assertEquals(1, $scelta->getIdScelta());
    }


}
