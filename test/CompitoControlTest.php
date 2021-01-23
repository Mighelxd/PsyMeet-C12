<?php

include '../applicationLogic/CompitoControl.php';
include '../storage/Compito.php';
include '../storage/DatabaseInterface.php';

use PHPUnit\Framework\TestCase;

class CompitoControlTest extends TestCase
{

    public function testAddCompDataNotCor()
    {

            $result = CompitoControl::addComp
            (
                                                "2021-01-18",
                                                "tit",
                                                "desc",
                                                "",
                                                "",
                                                "BNCSDR80A01F839Y",
                                                "PPPFNC89A01H703E"
            );

            self::assertEquals("La dataaaa inserita non è quella corrente", $result);




    }
    /*
        public function testAddCompLTitNotOk()
        {

        }

        public function testAddCompFTitNotOk()
        {

        }

        public function testAddCompFDescNotOk()
        {

        }

        public function testAddCompOk()
        {

        }

        public function testCorrComp()
        {

        }

        public function testDoComp()
        {

        }

    */
}

