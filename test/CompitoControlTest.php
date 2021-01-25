<?php

include '../applicationLogic/CompitoControl.php';
include '../storage/Compito.php';
include '../storage/DatabaseInterface.php';
include '../plugins/libArray/FunArray.php';


use PHPUnit\Framework\TestCase;

  $currDate = date("Y-m-d");

class CompitoControlTest extends TestCase
{


        public function testAddCompLTitNotOk()
        {

                $result = CompitoControl::addComp
            (
                                                "2021-01-23",
                                                "TitoloOoooooooooooooooooooo",
                                                "desc",
                                                "",
                                                "",
                                                "BNCSDR80A01F839Y",
                                                "PPPFNC89A01H703E"
            );

            self::assertEquals("Il campo titolo non rispetta la lunghezza", $result);

        }

           public function testAddCompFTitNotOk()
           {
                $result = CompitoControl::addComp
            (
                                                "2021-01-23",
                                                "Titol@",
                                                "desc",
                                                "",
                                                "",
                                                "BNCSDR80A01F839Y",
                                                "PPPFNC89A01H703E"
            );

            self::assertEquals("Il campo titolo non rispetta il formato", $result);
           }

           public function testAddCompFDescNotOk()
           {
                $result = CompitoControl::addComp
            (
                                                "2021-01-23",
                                                "Titolo",
                                                "Descrizion$",
                                                "",
                                                "",
                                                "BNCSDR80A01F839Y",
                                                "PPPFNC89A01H703E"
            );

            self::assertEquals("Il campo descrizione non rispetta il formato", $result);
           }

           public function testAddCompOk()
           {
                $result = CompitoControl::addComp
            (
                                                "2021-01-23",
                                                "Titolo",
                                                "Descrizione1",
                                                "",
                                                "",
                                                "BNCSDR80A01F839Y",
                                                "PPPFNC89A01H703E"
            );

            self::assertEquals(true, $result);
           }

           public function testCorrCompFNotOk()
           {
                $result = CompitoControl::corrComp
            (
                                                1,
                                                0,
                                                "Correzion@"
            );

            self::assertEquals("Il campo correzione non rispetta il formato", $result);
           }

           public function testDoCompFSvolgNotOk()
           {
                $result = CompitoControl::doComp
            (
                                                1,
                                                "Svolgiment#"

            );

            self::assertEquals("Il campo svolgimento non rispetta il formato", $result);
           }

    public function testDoCompOk()
    {
        $result = CompitoControl::doComp
        (
            1,
            "Svolgimento1"

        );

        self::assertEquals(true, $result);
    }


}

