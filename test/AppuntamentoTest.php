<?php



use PHPUnit\Framework\TestCase;

class AppuntamentoTest extends TestCase
{

    public function testGetDesc()
    {
        $app = new Appuntamento(1, "2022-01-20","12:30","desc","RSSMRC80R12H703U","NSTFNC94M23H703G");
        self::assertEquals("desc", $app->getDesc());
    }

    public function testGetCfPaz()
    {
        $app = new Appuntamento(1, "2022-01-20","12:30","desc","RSSMRC80R12H703U","NSTFNC94M23H703G");
        self::assertEquals("NSTFNC94M23H703G", $app->getCfPaz());
    }

    public function testGetData()
    {
        $app = new Appuntamento(1, "2022-01-20","12:30","desc","RSSMRC80R12H703U","NSTFNC94M23H703G");
        self::assertEquals("2022-01-20", $app->getData());
    }

    public function testSetCfProf()
    {
        $app = new Appuntamento(1, "2022-01-20","12:30","desc","RSSMRC80R12H703U","NSTFNC94M23H703G");
        $app ->setCfProf("BNCMRC80R12H703U");
        self::assertEquals("BNCMRC80R12H703U", $app->getCfProf());
    }

    public function testSetDesc()
    {
        $app = new Appuntamento(1, "2022-01-20","12:30","desc","RSSMRC80R12H703U","NSTFNC94M23H703G");
        $app ->setDesc("desc updated");
        self::assertEquals("desc updated", $app->getDesc());
    }

    public function testSetId()
    {
        $app = new Appuntamento(1, "2022-01-20","12:30","desc","RSSMRC80R12H703U","NSTFNC94M23H703G");
        $app -> setId(2);
        self::assertEquals(2, $app->getId());
    }

    public function testGetId()
    {
        $app = new Appuntamento(1, "2022-01-20","12:30","desc","RSSMRC80R12H703U","NSTFNC94M23H703G");
        self::assertEquals(1, $app->getId());
    }

    public function testSetData()
    {
        $app = new Appuntamento(1, "2022-01-20","12:30","desc","RSSMRC80R12H703U","NSTFNC94M23H703G");
        $app -> setData("2023-03-12");
        self::assertEquals("2023-03-12", $app->getData());
    }

    public function testGetOra()
    {
        $app = new Appuntamento(1, "2022-01-20","12:30","desc","RSSMRC80R12H703U","NSTFNC94M23H703G");
        self::assertEquals("12:30", $app->getOra());
    }

    public function testGetCfProf()
    {
        $app = new Appuntamento(1, "2022-01-20","12:30","desc","RSSMRC80R12H703U","NSTFNC94M23H703G");
        self::assertEquals("RSSMRC80R12H703U", $app->getCfProf());
    }

    public function test__construct()
    {
        $app = new Appuntamento(1, "2022-01-20","12:30","desc","RSSMRC80R12H703U","NSTFNC94M23H703G");
        self::assertNotNull($app);
    }

    public function testSetOra()
    {
        $app = new Appuntamento(1, "2022-01-20","12:30","desc","RSSMRC80R12H703U","NSTFNC94M23H703G");
        $app -> setOra("15:00");
        self::assertEquals("15:00", $app->getOra());
    }

    public function testSetCfPaz()
    {
        $app = new Appuntamento(1, "2022-01-20","12:30","desc","RSSMRC80R12H703U","NSTFNC94M23H703G");
        $app -> setCfPaz("RSSMRC80R12H703B");
        self::assertEquals("RSSMRC80R12H703B", $app->getCfPaz());
    }
}
