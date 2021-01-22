<?php

include 'storage/SchedaAssessmentFocalizzato.php';

use PHPUnit\Framework\TestCase;

class SchedaAssessmentFocalizzatoTest extends TestCase
{

    public function test__construct()
    {
        $sc = new SchedaAssessmentFocalizzato(1,"2021-12-12",5,4,"Scheda Assessment Focalizzato");
        self::assertNotNull($sc);
    }

    public function testGetIdScheda()
    {
        $sc = new SchedaAssessmentFocalizzato(1,"2021-12-12",5,4,"Scheda Assessment Focalizzato");
        self::assertEquals(1, $sc->getIdScheda());
    }

    public function testSetTipo()
    {
        $sc = new SchedaAssessmentFocalizzato(1,"2021-12-12",5,4,"Scheda Assessment Focalizzato");
        $sc ->setTipo("Scheda Assessment Focalizzato");
        self::assertEquals("Scheda Assessment Focalizzato", $sc->getTipo());
    }

    public function testGetNEpisodi()
    {
        $sc = new SchedaAssessmentFocalizzato(1,"2021-12-12",5,4,"Scheda Assessment Focalizzato");
        self::assertEquals(5, $sc->getNEpisodi());
    }

    public function testGetData()
    {
        $sc = new SchedaAssessmentFocalizzato(1,"2021-12-12",5,4,"Scheda Assessment Focalizzato");
        self::assertEquals("2021-12-12", $sc->getData());
    }

    public function testSetIdScheda()
    {
        $sc = new SchedaAssessmentFocalizzato(1,"2021-12-12",5,4,"Scheda Assessment Focalizzato");
        $sc ->setIdScheda(2);
        self::assertEquals(2, $sc->getIdScheda());
    }

    public function testSetNEpisodi()
    {
        $sc = new SchedaAssessmentFocalizzato(1,"2021-12-12",5,4,"Scheda Assessment Focalizzato");
        $sc ->setNEpisodi(10);
        self::assertEquals(10, $sc->getNEpisodi());
    }

    public function testGetIdTerapia()
    {
        $sc = new SchedaAssessmentFocalizzato(1,"2021-12-12",5,4,"Scheda Assessment Focalizzato");
        self::assertEquals(4, $sc->getIdTerapia());
    }

    public function testSetIdTerapia()
    {
        $sc = new SchedaAssessmentFocalizzato(1,"2021-12-12",5,4,"Scheda Assessment Focalizzato");
        $sc ->setIdTerapia(3);
        self::assertEquals(3, $sc->getIdTerapia());
    }

    public function testSetData()
    {
        $sc = new SchedaAssessmentFocalizzato(1,"2021-12-12",5,4,"Scheda Assessment Focalizzato");
        $sc ->setData("2021-12-11");
        self::assertEquals("2021-12-11", $sc->getData());
    }

    public function testGetTipo()
    {
        $sc = new SchedaAssessmentFocalizzato(1,"2021-12-12",5,4,"Scheda Assessment Focalizzato");
        self::assertEquals("Scheda Assessment Focalizzato", $sc->getTipo());
    }
}
