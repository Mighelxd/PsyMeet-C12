<?php

include "../applicationLogic/SeduteControl.php";
include "../storage/SchedaFollowUp.php";
include "../storage/DatabaseInterface.php";

use PHPUnit\Framework\TestCase;

class SchedaFollowUpControlTest extends TestCase
{
    public function testAddSFURicNotCor()
    {
        $result = SeduteControl::addSFU
        (
            date("Y-m-d"),
            "",
            "AAA",
            "1",
            "Scheda Follow Up"
        );
        self::assertEquals("Il campo Ricadute è vuoto.", $result);
    }

    public function testAddSFURicNotForm()
    {
        $result = SeduteControl::addSFU
        (
            date("Y-m-d"),
            "AAAAAAAAAAAAAA$",
            "AAA",
            "1",
            "Scheda Follow Up"
        );
        self::assertEquals("Il campo Ricadute non rispetta il formato", $result);
    }

    public function testAddSFUEPNotCor()
    {
        $result = SeduteControl::addSFU
        (
            date("Y-m-d"),
            "AAAAAAAAAAAAAA",
            "",
            "1",
            "Scheda Follow Up"
        );
        self::assertEquals("Il campo Esiti positivi è vuoto", $result);
    }
    public function testAddSFUEPNotForm()
    {
        $result = SeduteControl::addSFU
        (
            date("Y-m-d"),
            "AAAAAAAAAAAAAA",
            "AAAAAAAAAAAAAA$$",
            "1",
            "Scheda Follow Up"
        );
        self::assertEquals("Il campo Esiti positivi non rispetta il formato", $result);
    }

    public function testAddSFUSucc()
    {
        $result = SeduteControl::addSFU
        (
            date("Y-m-d"),
            "AAAAAAAAAAAAAA",
            "AAAAAAAAAAAAAA",
            "1",
            "Scheda Follow Up"
        );
        self::assertEquals(true, $result);
    }

    public function testModSFURicNotCor()
    {
        $result = SeduteControl::modSFU
        (
            "",
            "",
            ""
        );
        self::assertEquals(true, $result);
    }
}
