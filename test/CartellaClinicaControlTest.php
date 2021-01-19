<?php


use PHPUnit\Framework\TestCase;


class CartellaClinicaControlTest extends TestCase
{


    /*public function testSaveCartellaClinica()
    {

    }*/

    /*public function testGetCartellaClinica()
    {

    }*/

   /*public function testUpdateCartellaClinica()
    {

    }*/

    public function testVisualizzaCartellaClinicaSuccess(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://localhost/psymeet-c12/applicationLogic/gestioneCartellaClinica.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_COOKIE=> session_name()."="."sessione;"."codiceFiscale=RSSMRC80R12H703U;"."tipo=professionista;",
            CURLOPT_POSTFIELDS => array('codFiscalePaz' => 'NSTFNC94M23H703G','azione' => 'visualizza'),
        ));
        $response = curl_exec($curl);
        self::assertStringContainsStringIgnoringCase("Dati cartella",$response,"no");
        curl_close($curl);

    }

}
