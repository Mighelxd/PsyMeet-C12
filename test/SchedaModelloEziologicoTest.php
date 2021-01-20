<?php


use PHPUnit\Framework\TestCase;
include 'storage/SchedaModelloEziologico.php';

class SchedaModelloEziologicoTest extends TestCase
{

    public function testSetFattoriCausativi()
    {
        $sag = new SchedaModelloEziologico(1, "2021-01-20", "Fattori Causativi funziona", "saddsad", "asdsa", "asdas", 1, "Scheda Modello Eziologico");
        $sag->setFattoriCausativi("Fattori Causativi funziona");
        self::assertEquals("Fattori Causativi funziona", $sag->getFattoriCausativi());

    }

    public function testSetData()
    {
    $sag = new SchedaModelloEziologico(1, "2021-01-20", "Fattori Causativi", "saddsad", "asdsa", "asdas", 1, "Scheda Modello Eziologico");
    $sag->setData("2021-01-20");
    self::assertEquals("2021-01-20",$sag->getData());
    }

    public function testGetFattoriCausativi()
    {
        $sag = new SchedaModelloEziologico(1, "2021-01-20", "Get Fattori Causativi", "saddsad", "asdsa", "asdas", 1, "Scheda Modello Eziologico");
        self::assertEquals("Get Fattori Causativi", $sag->getFattoriCausativi());
    }

    public function testGetIdScheda()
    {
        $sag = new SchedaModelloEziologico(1, "2021-01-20", "Fattori Causativi funziona", "saddsad", "asdsa", "asdas", 1, "Scheda Modello Eziologico");
        self::assertEquals(1, $sag->getIdScheda());
    }

    public function testGetFattoriPrecipitanti()
    {
        $sag = new SchedaModelloEziologico(1, "2021-01-20", "Fattori Causativi funziona", "Fattori Precipitanti", "asdsa", "asdas", 1, "Scheda Modello Eziologico");
        self::assertEquals("Fattori Precipitanti", $sag->getFattoriPrecipitanti());
    }

    public function testGetFattoriMantenimento()
    {
        $sag = new SchedaModelloEziologico(1, "2021-01-20", "Fattori Causativi funziona", "Fattori Precipitanti", "Fattori Mantenimento", "asdas", 1, "Scheda Modello Eziologico");
        self::assertEquals("Fattori Mantenimento", $sag->getFattoriMantenimento());
    }

    public function testSetFattoriMantenimento()
    {
        $sag = new SchedaModelloEziologico(1, "2021-01-20", "Fattori Causativi", "saddsad", "Fattori Mantenimento", "asdas", 1, "Scheda Modello Eziologico");
        $sag->setFattoriMantenimento("Fattori Mantenimento");
        self::assertEquals("Fattori Mantenimento",$sag->getFattoriMantenimento());
    }

    public function testSetFattoriPrecipitanti()
    {
        $sag = new SchedaModelloEziologico(1, "2021-01-20", "Fattori Causativi", "Fattori Precipitanti", "asdsa", "asdas", 1, "Scheda Modello Eziologico");
        $sag->setFattoriPrecipitanti("Fattori Precipitanti");
        self::assertEquals("Fattori Precipitanti",$sag->getFattoriPrecipitanti());
    }

    public function testGetIdTerapia()
    {
        $sag = new SchedaModelloEziologico(1, "2021-01-20", "Fattori Causativi funziona", "Fattori Precipitanti", "Fattori Mantenimento", "asdas", 1, "Scheda Modello Eziologico");
        self::assertEquals(1, $sag->getIdTerapia());
    }

    public function testSetIdTerapia()
    {
        $sag = new SchedaModelloEziologico(1, "2021-01-20", "Fattori Causativi", "Fattori Precipitanti", "asdsa", "asdas", 1, "Scheda Modello Eziologico");
        $sag->setIdTerapia(1);
        self::assertEquals(1,$sag->getIdTerapia());
    }

    public function testGetData()
    {
        $sag = new SchedaModelloEziologico(1, "2021-01-20", "Fattori Causativi funziona", "Fattori Precipitanti", "Fattori Mantenimento", "asdas", 1, "Scheda Modello Eziologico");
        self::assertEquals("2021-01-20", $sag->getData());
    }

    public function testGetRelazioneFinale()
    {
        $sag = new SchedaModelloEziologico(1, "2021-01-20", "Fattori Causativi funziona", "Fattori Precipitanti", "Fattori Mantenimento", "Relazione Finale", 1, "Scheda Modello Eziologico");
        self::assertEquals("Relazione Finale", $sag->getRelazioneFinale());
    }

    public function testSetRelazioneFinale()
    {
        $sag = new SchedaModelloEziologico(1, "2021-01-20", "Fattori Causativi", "Fattori Precipitanti", "asdsa", "Relazione Finale", 1, "Scheda Modello Eziologico");
        $sag->setRelazioneFinale("Relazione Finale");
        self::assertEquals("Relazione Finale",$sag->getRelazioneFinale());
    }

    public function testSetIdScheda()
    {
        $sag = new SchedaModelloEziologico(1, "2021-01-20", "Fattori Causativi", "Fattori Precipitanti", "asdsa", "Relazione Finale", 1, "Scheda Modello Eziologico");
        $sag->setIdScheda(1);
        self::assertEquals(1,$sag->getIdScheda());
    }

    public function testGetTipo()
    {
        $sag = new SchedaModelloEziologico(1, "2021-01-20", "Fattori Causativi funziona", "Fattori Precipitanti", "Fattori Mantenimento", "Relazione Finale", 1, "Scheda Modello Eziologico");
        self::assertEquals("Scheda Modello Eziologico", $sag->getTipo());
    }

    public function testSetTipo()
    {
        $sag = new SchedaModelloEziologico(1, "2021-01-20", "Fattori Causativi", "Fattori Precipitanti", "asdsa", "Relazione Finale", 1, "Scheda Modello Eziologico");
        $sag->setTipo("Scheda Modello Eziologico");
        self::assertEquals("Scheda Modello Eziologico",$sag->getTipo());
    }

}
