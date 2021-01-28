<?php


use PHPUnit\Framework\TestCase;

class CartellaClinicaControlTest extends TestCase
{

    public function testAddCartellaClinicaFFarmaciNotOk(){
        $date=date("Y-m-d");
        $result=CartellaClinicaControl::saveCartellaClinica(-1,$date,"2","3","Patologia","abc@@@","RSSMRC80R12H703U","NSTFNC94M23H703G");
        self::assertEquals("Il campo Farmaci/Psicofarmaci non rispetta il formato",$result);
    }
    public function testAddCartellaClinicaLUmoreNotOk(){
        $date=date("Y-m-d");
        $result=CartellaClinicaControl::saveCartellaClinica(-1,$date,"11","3","Patologia","Farmaco","RSSMRC80R12H703U","NSTFNC94M23H703G");
        self::assertEquals("Il campo Qualità Umore non rispetta la lunghezza",$result);
    }
    public function testAddCartellaClinicaFUmoreNotOk(){
        $date=date("Y-m-d");
        $result=CartellaClinicaControl::saveCartellaClinica(-1,$date,"7","3","Patologia","Farmaco","RSSMRC80R12H703U","NSTFNC94M23H703G");
        self::assertEquals("Il campo Qualità Umore non rispetta il formato",$result);
    }
    public function testAddCartellaClinicaFPatologieNotOk(){
        $date=date("Y-m-d");
        $result=CartellaClinicaControl::saveCartellaClinica(-1,$date,"2","3","abc@@@","Farmaco","RSSMRC80R12H703U","NSTFNC94M23H703G");
        self::assertEquals("Il campo Patologie pregresse non rispetta il formato",$result);
    }
    public function testAddCartellaClinicaLRelazioniNotOk(){
        $date=date("Y-m-d");
        $result=CartellaClinicaControl::saveCartellaClinica(-1,$date,"2","33","Patologia","Farmaco","RSSMRC80R12H703U","NSTFNC94M23H703G");
        self::assertEquals("Il campo Qualità relazioni affettive non rispetta la lunghezza",$result);
    }
    public function testAddCartellaClinicaFRelazioniNotOk(){
        $date=date("Y-m-d");
        $result=CartellaClinicaControl::saveCartellaClinica(-1,$date,"2","7","Patologia","Farmaco","RSSMRC80R12H703U","NSTFNC94M23H703G");
        self::assertEquals("Il campo Qualità relazioni affettive non rispetta il formato",$result);
    }
    public function testAddCartellaClinicaOk(){
        $date=date("Y-m-d");
        $result=CartellaClinicaControl::saveCartellaClinica(-1,$date,"2","3","Patologia","Farmaco","RSSMRC80R12H703U","NSTFNC94M23H703G");
        self::assertEquals(true,$result);
    }
    public function testUpdateCartellaClinicaFFarmaciNotOk(){
        $cartellaClinicaOld= new CartellaClinica(1,'2020-01-21','3','3','NA','NA','RSSMRC80R12H703U','NSTFNC94M23H703G');
        $date=date("Y-m-d");
        $result=CartellaClinicaControl::updateCartellaClinica(-1,$date,"2","3","Patologia","abc@@@","RSSMRC80R12H703U","NSTFNC94M23H703G");
        self::assertEquals("Il campo Farmaci/Psicofarmaci non rispetta il formato",$result);
    }
    public function testUpdateCartellaClinicaLUmoreNotOk(){
        $cartellaClinicaOld= new CartellaClinica(1,'2020-01-21','3','3','NA','NA','RSSMRC80R12H703U','NSTFNC94M23H703G');
        $date=date("Y-m-d");
        $result=CartellaClinicaControl::updateCartellaClinica(-1,$date,"11","3","Patologia","Farmaco","RSSMRC80R12H703U","NSTFNC94M23H703G");
        self::assertEquals("Il campo Qualità Umore non rispetta la lunghezza",$result);
    }
    public function testUpdateCartellaClinicaFUmoreNotOk(){
        $cartellaClinicaOld= new CartellaClinica(1,'2020-01-21','3','3','NA','NA','RSSMRC80R12H703U','NSTFNC94M23H703G');
        $date=date("Y-m-d");
        $result=CartellaClinicaControl::updateCartellaClinica(-1,$date,"7","3","Patologia","Farmaco","RSSMRC80R12H703U","NSTFNC94M23H703G");
        self::assertEquals("Il campo Qualità Umore non rispetta il formato",$result);
    }
    public function testUpdateCartellaClinicaFPatologieNotOk(){
        $cartellaClinicaOld= new CartellaClinica(1,'2020-01-21','3','3','NA','NA','RSSMRC80R12H703U','NSTFNC94M23H703G');
        $date=date("Y-m-d");
        $result=CartellaClinicaControl::updateCartellaClinica(-1,$date,"2","3","abc@@@","Farmaco","RSSMRC80R12H703U","NSTFNC94M23H703G");
        self::assertEquals("Il campo Patologie pregresse non rispetta il formato",$result);
    }
    public function testUpdateCartellaClinicaLRelazioniNotOk(){
        $cartellaClinicaOld= new CartellaClinica(1,'2020-01-21','3','3','NA','NA','RSSMRC80R12H703U','NSTFNC94M23H703G');
        $date=date("Y-m-d");
        $result=CartellaClinicaControl::updateCartellaClinica(-1,$date,"2","33","Patologia","Farmaco","RSSMRC80R12H703U","NSTFNC94M23H703G");
        self::assertEquals("Il campo Qualità relazioni affettive non rispetta la lunghezza",$result);
    }
    public function testUpdateCartellaClinicaFRelazioniNotOk(){
        $cartellaClinicaOld= new CartellaClinica(1,'2020-01-21','3','3','NA','NA','RSSMRC80R12H703U','NSTFNC94M23H703G');
        $date=date("Y-m-d");
        $result=CartellaClinicaControl::updateCartellaClinica(-1,$date,"2","7","Patologia","Farmaco","RSSMRC80R12H703U","NSTFNC94M23H703G");
        self::assertEquals("Il campo Qualità relazioni affettive non rispetta il formato",$result);
    }
    public function testUpdateCartellaClinicaOk(){
        $cartellaClinicaOld= new CartellaClinica(1,'2020-01-21','3','3','NA','NA','RSSMRC80R12H703U','NSTFNC94M23H703G');
        $date=date("Y-m-d");
        CartellaClinicaControl::updateCartellaClinica(-1,$date,"2","3","Patologia","Farmaco","RSSMRC80R12H703U","NSTFNC94M23H703G");
        $result2=CartellaClinicaControl::getCartellaClinica("NSTFNC94M23H703G","RSSMRC80R12H703U");
        self::assertEquals(2,$result2->getQualitaUmore());
    }
}
