<?php


use PHPUnit\Framework\TestCase;
include "../plugins/libArray/FunArray.php";
include "../storage/DatabaseInterface.php";
include "../storage/Appuntamento.php";
include "../applicationLogic/AppuntamentoControlF.php";
class AppuntamentoControlFTest extends TestCase
{
    public function testAddAppCfFailureLengthMax()
    {
        $dataCurr = date("Y-m-d");
        $res = AppuntamentoControlF::addApp($dataCurr,'10:00:00','descrizione1','RSSMRC80R12H703U','AAAAAAAAAAAAAAAAA');
        self::assertEquals('Il campo Codice fiscale paziente non rispetta la lunghezza',$res);
    }

    public function testAddAppCfFailureLengthMin()
    {
        $dataCurr = date("Y-m-d");
        $res = AppuntamentoControlF::addApp($dataCurr,'10:00:00','descrizione1','RSSMRC80R12H703U','AAAA');
        self::assertEquals('Il campo Codice fiscale paziente non rispetta la lunghezza',$res);
    }

    public function testAddAppCfFailureFormato()
    {
        $dataCurr = date("Y-m-d");
        $res = AppuntamentoControlF::addApp($dataCurr,'10:00:00','descrizione1','RSSMRC80R12H703U','AAAAAAAAAAAAAAA@');
        self::assertEquals('Il campo Codice fiscale paziente non rispetta il formato',$res);
    }

    public function testAddAppOraFailureFormato()
    {
        $dataCurr = date("Y-m-d");
        $res = AppuntamentoControlF::addApp($dataCurr,'10:011','descrizione1','RSSMRC80R12H703U','AAAAAAAAAAAAAAAA');
        self::assertEquals('Il campo Orario non rispetta il formato',$res);
    }

    public function testAddAppDescFailureFormato()
    {
        $dataCurr = date("Y-m-d");
        $res = AppuntamentoControlF::addApp($dataCurr,'10:01:00','@','RSSMRC80R12H703U','AAAAAAAAAAAAAAAA');
        self::assertEquals('Il campo Descrizione non rispetta il formato',$res);
    }

    public function testAddAppSuccess()
    {
        $dataCurr = date("Y-m-d");
        $res = AppuntamentoControlF::addApp($dataCurr,'10:01:00','AAA','RSSMRC80R12H703U','NSTFNC94M23H703G');
        self::assertEquals(true,$res);
    }
    /*Modifica*/
    public function testModAppCfFailureLengthMax()
    {
        $dataCurr = date("Y-m-d");
        $res = AppuntamentoControlF::modApp('5',$dataCurr,'10:00:00','Descrizione1','RSSMRC80R12H703U','NSTFNC94M23H703GA',$dataCurr,'10:01:00','AAA','NSTFNC94M23H703G');
        self::assertEquals('Il campo Codice fiscale paziente non rispetta la lunghezza',$res);
    }

    public function testModAppCfFailureLengthMin()
    {
        $dataCurr = date("Y-m-d");
        $res = AppuntamentoControlF::modApp('5',$dataCurr,'10:00:00','Descrizione1','RSSMRC80R12H703U','NSTF',$dataCurr,'10:01:00','AAA','NSTFNC94M23H703G');
        self::assertEquals('Il campo Codice fiscale paziente non rispetta la lunghezza',$res);
    }

    public function testModAppCfFailureFormato()
    {
        $dataCurr = date("Y-m-d");
        $res = AppuntamentoControlF::modApp('5',$dataCurr,'10:00:00','Descrizione1','RSSMRC80R12H703U','NSTFNC94M23H703@',$dataCurr,'10:01:00','AAA','NSTFNC94M23H703G');
        self::assertEquals('Il campo Codice fiscale paziente non rispetta il formato',$res);
    }

    public function testModAppOraFailureFormato()
    {
        $dataCurr = date("Y-m-d");
        $res = AppuntamentoControlF::modApp('5',$dataCurr,'10:011','Descrizione1','RSSMRC80R12H703U','NSTFNC94M23H703G',$dataCurr,'10:01:00','AAA','NSTFNC94M23H703G');
        self::assertEquals('Il campo Orario non rispetta il formato',$res);
    }

    public function testModAppDescFailureFormato()
    {
        $dataCurr = date("Y-m-d");
        $res = AppuntamentoControlF::modApp('5',$dataCurr,'10:00:00','@','RSSMRC80R12H703U','NSTFNC94M23H703G',$dataCurr,'10:01:00','AAA','NSTFNC94M23H703G');
        self::assertEquals('Il campo Descrizione non rispetta il formato',$res);
    }

    public function testModAppSuccess()
    {
        $dataCurr = date("Y-m-d");
        $res = AppuntamentoControlF::modApp('5',$dataCurr,'10:00:00','Descrizione1','RSSMRC80R12H703U','NSTFNC94M23H703G',$dataCurr,'10:01:00','AAA','NSTFNC94M23H703G');
        self::assertEquals(true,$res);
    }
}
