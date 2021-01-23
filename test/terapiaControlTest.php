<?php

include "../storage/Terapia.php";
include "../applicationLogic/terapiaControl.php";
include "../storage/DatabaseInterface.php";
include "../plugins/libArray/FunArray.php";

use PHPUnit\Framework\TestCase;

class terapiaControlTest extends TestCase
{



    public function testAddTerDescrNotCor()
    {
        $result = terapiaControl::addTer
        (
            date("Y-m-d"),
            "",
            "RSSMRC80R12H703U",
            "NSTFNC94M23H703G"
        );

        self::assertEquals("Il campo descrizione è vuoto.", $result);

    }

    public function testAddTerSuss()
    {
        $result = terapiaControl::addTer
        (
            date("Y-m-d"),
            "AAA",
            "RSSMRC80R12H703U",
            "NSTFNC94M23H703G"
        );

        self::assertEquals(true, $result);
    }


    public function testModTerDescrNotCor()
    {
        $result = terapiaControl::modTerr
        (
            1,
            ""
        );
        self::assertEquals("Il campo descrizione è vuoto.", $result);
    }

    public function testModTer()
    {
        $result = terapiaControl::modTerr
        (
            1,
            "AAA"
        );
        self::assertEquals(true, $result);
    }

    }
