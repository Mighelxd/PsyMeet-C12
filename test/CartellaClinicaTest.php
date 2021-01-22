<?php


use PHPUnit\Framework\TestCase;

class CartellaClinicaTest extends TestCase
{
    public function testCartellaClinicaSuccesso(){
        $this->assertInstanceOf(CartellaClinica::class,new CartellaClinica(-1,"2020-19-01",5,5,"asd","asd","1234567890123456","1234567890123456"));
    }
    public function  testCartellaClinicaErrore1(){
        try{
            $cartellaClinica = new CartellaClinica(-1,"2020-19-01",5,5,"asd","asd","123456789012345","1234567890123456");
        }
        catch (Exception $e){
            $this->assertEquals($e->getMessage(),"Codice fiscale professionista non valido!");
        }
    }
    public function  testCartellaClinicaErrore2(){
        try{
            $cartellaClinica = new CartellaClinica(-1,"2020-19-01",5,5,"asd","asd","123456789012345","1234567890123456");
        }
        catch (Exception $e){
            $this->assertEquals($e->getMessage(),"Codice fiscale professionista non valido!");
        }
    }

}
