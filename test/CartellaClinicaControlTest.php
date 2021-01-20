<?php


use PHPUnit\Framework\TestCase;
include "storage/Paziente.php";
include "storage/CartellaClinica.php";
include "applicationLogic/CartellaClinicaControl.php";
class CartellaClinicaControlTest extends TestCase
{

   /* public function testGetCartellaClinica()
    {

    }*/

    public function testSaveCartellaClinicaFail1()
    {
        $date=date("Y-m-d");
        $result=CartellaClinicaControl::saveCartellaClinica(-1,$date,"ciao","5","ciao","ciao","RSSMRC80R12H703U","NSTFNC94M23H703G");
        self::assertEquals("Valore qualit. umore non corretto!",$result);
    }

    /*public function testUpdateCartellaClinica()
    {

    }*/
}
