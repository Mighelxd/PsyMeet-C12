<?php


use PHPUnit\Framework\TestCase;

class SchedaAssGenTest extends TestCase
{
    public function testAddSchGenAutoregAPEmpty()
    {
        $sassg = SeduteControl::addSchGen
        (
            "2021-01-24",
            "",
            "Aan 1",
            "Cà.ap1",
            "Ca,n",
            "smap",
            "sman",
            "sap",
            "san",
            "1",
            "Scheda Assessment Generalizzato"
        );

        self::assertEquals("Il campo Autoregolazione-Aspetti Positivi è vuoto", $sassg);
    }

    public function testAddSchGenAutoregAPfNotOk()
    {
        $sassg = SeduteControl::addSchGen
        (
            "2021-01-24",
            "Autoreg#ap",
            "Aan 1",
            "Cà.ap1",
            "Ca,n",
            "smap",
            "sman",
            "sap",
            "san",
            "1",
            "Scheda Assessment Generalizzato"
        );

        self::assertEquals("Il campo Autoregolazione-Aspetti Positivi non rispetta il formato", $sassg);
    }

    public function testAddSchGenAutoregANEmpty()
    {
        $sassg = SeduteControl::addSchGen
        (
            "2021-01-24",
            "Autoreg ap",
            "",
            "Cà.ap1",
            "Ca,n",
            "smap",
            "sman",
            "sap",
            "san",
            "1",
            "Scheda Assessment Generalizzato"
        );

        self::assertEquals("Il campo Autoregolazione-Aspetti Negativi è vuoto", $sassg);
    }

    public function testAddSchGenAutoregANfNotOk()
    {
        $sassg = SeduteControl::addSchGen
        (
            "2021-01-24",
            "Autoreg ap",
            "@",
            "cap",
            "can",
            "aaaa",
            "aaaaa",
            "aaa",
            "aaaaa",
            "1",
            "Scheda Assessment Generalizzato"
        );

        self::assertEquals("Il campo Autoregolazione-Aspetti Negativi non rispetta il formato", $sassg);
    }

    public function testAddSchGenCogAPEmpty()
    {
        $sassg = SeduteControl::addSchGen
        (
            "2021-01-24",
            "Atutoreg ap",
            "Auto neg",
            "",
            "Ca,n",
            "smap",
            "sman",
            "sap",
            "san",
            "1",
            "Scheda Assessment Generalizzato"
        );

        self::assertEquals("Il campo Cognitive-Aspetti Positivi è vuoto", $sassg);
    }

    public function testAddSchGenCogANfNotOk()
    {
        $sassg = SeduteControl::addSchGen
        (
            "2021-01-24",
            "Autoreg ap",
            "Auto neg",
            "cap",
            "Ca,n@",
            "smap",
            "sman",
            "sap",
            "san",
            "1",
            "Scheda Assessment Generalizzato"
        );

        self::assertEquals("Il campo Cognitive-Aspetti Negativi non rispetta il formato", $sassg);
    }

    public function testAddSchGenSmAPEmpty()
    {
        $sassg = SeduteControl::addSchGen
        (
            "2021-01-24",
            "Autoreg ap",
            "Auto neg",
            "cap",
            "Ca,n",
            "",
            "sman",
            "sap",
            "san",
            "1",
            "Scheda Assessment Generalizzato"
        );

        self::assertEquals("Il campo Self Management-Aspetti Positivi è vuoto", $sassg);
    }

    public function testAddSchGenSmANfNotOk()
    {
        $sassg = SeduteControl::addSchGen
        (
            "2021-01-24",
            "Autoreg ap",
            "Auto neg",
            "cap",
            "Ca,n",
            "smap",
            "Sman.#",
            "sap",
            "san",
            "1",
            "Scheda Assessment Generalizzato"
        );

        self::assertEquals("Il campo Self Management-Aspetti Negativi non rispetta il formato", $sassg);
    }

    public function testAddSchGenSapEmpty()
    {
        $sassg = SeduteControl::addSchGen
        (
            "2021-01-24",
            "Autoreg ap",
            "Auto neg",
            "cap",
            "Ca,n",
            "smap",
            "Sman.",
            "",
            "san",
            "1",
            "Scheda Assessment Generalizzato"
        );

        self::assertEquals("Il campo Sociali-Aspetti Positivi è vuoto", $sassg);
    }

    public function testAddSchGenSanFNotOk()
    {
        $sassg = SeduteControl::addSchGen
        (
            "2021-01-24",
            "Autoreg ap",
            "Auto neg",
            "cap",
            "Ca,n",
            "smap",
            "Sman.",
            "sap4",
            "san@",
            "1",
            "Scheda Assessment Generalizzato"
        );

        self::assertEquals("Il campo Sociali-Aspetti Negativi non rispetta il formato", $sassg);
    }

    public function testAddSchGenOk()
    {
        $sassg = SeduteControl::addSchGen
        (
            "2021-01-24",
            "Autoreg ap",
            "Auto neg",
            "cap",
            "Ca,n",
            "smap",
            "Sman.",
            "sap4",
            "San",
            "1",
            "Scheda Assessment Generalizzato"
        );

        self::assertEquals(true, $sassg);
    }

    public function testModSchGenAutoregAPisEmpty() {
        $sassg = SeduteControl::modSchGen(
            "",
            "Aan1",
            "Cà.ap1",
            "Ca,n",
            "smap",
            "sman",
            "sap",
            "san",
            "1"
        );

        self::assertEquals("Il campo Autoregolazione-Aspetti Positivi è vuoto",$sassg);
    }

    public function testModSchGenAutoregAPfNotOk() {
        $sassg = SeduteControl::modSchGen(
            "Autoreg#ap",
            "Aan1",
            "Cà.ap1",
            "Ca,n",
            "smap",
            "sman",
            "sap",
            "san",
            "1"
        );

        self::assertEquals("Il campo Autoregolazione-Aspetti Positivi non rispetta il formato",$sassg);
    }

    public function testModSchGenAutoregANisEpmpty() {
        $sassg = SeduteControl::modSchGen(
            "Autoreg ap",
            "",
            "Cà.ap1",
            "Ca,n",
            "smap",
            "sman",
            "sap",
            "san",
            "1"
        );

        self::assertEquals("Il campo Autoregolazione-Aspetti Negativi è vuoto",$sassg);
    }

    public function testModSchGenAutoregANfNotOk() {
        $sassg = SeduteControl::modSchGen(
            "Autoreg ap",
            "@",
            "cap",
            "can",
            "aaaa",
            "aaaaa",
            "aaa",
            "aaaaa",
            "1"
        );

        self::assertEquals("Il campo Autoregolazione-Aspetti Negativi non rispetta il formato",$sassg);
    }

    public function testModSchGenCogAPisEmpty() {
        $sassg = SeduteControl::modSchGen(
            "Autoreg ap",
            "Auto neg",
            "",
            "Ca,n",
            "smap2",
            "sman",
            "sap",
            "san",
            "1"
        );

        self::assertEquals("Il campo Cognitive-Aspetti Positivi è vuoto",$sassg);
    }

    public function testModSchGenCogANfNotOk() {
        $sassg = SeduteControl::modSchGen(
            "Autoreg ap",
            "Auto neg",
            "cap",
            "Ca,n@",
            "smap2",
            "sman",
            "sap",
            "san",
            "1"
        );

        self::assertEquals("Il campo Cognitive-Aspetti Negativi non rispetta il formato",$sassg);
    }

    public function testModSchGenSmApisEmpty() {
        $sassg = SeduteControl::modSchGen(
            "Autoreg ap",
            "Auto neg",
            "cap",
            "Ca,n",
            "",
            "sman",
            "sap",
            "san",
            "1"
        );

        self::assertEquals("Il campo Self Management-Aspetti Positivi è vuoto",$sassg);
    }

    public function testModSchGenSmAnFnotOk() {
        $sassg = SeduteControl::modSchGen(
            "Autoreg ap",
            "Auto neg",
            "cap",
            "Ca,n",
            "smap",
            "Sman.#",
            "sap",
            "san",
            "1"
        );

        self::assertEquals("Il campo Self Management-Aspetti Negativi non rispetta il formato",$sassg);
    }

    public function testModSchGenSocAPisEmpty() {
        $sassg = SeduteControl::modSchGen(
            "Autoreg ap",
            "Auto neg",
            "cap",
            "Ca,n",
            "smap",
            "Sman.",
            "",
            "san",
            "1"
        );

        self::assertEquals("Il campo Sociali-Aspetti Positivi è vuoto",$sassg);
    }

    public function testModSchGenSocANfNotOk() {
        $sassg = SeduteControl::modSchGen(
            "Autoreg ap",
            "Auto neg",
            "cap",
            "Ca,n",
            "smap",
            "Sman.",
            "sap4",
            "San@",
            "1"
        );

        self::assertEquals("Il campo Sociali-Aspetti Negativi non rispetta il formato",$sassg);
    }

    public function testModSchGenOk() {
        $sassg = SeduteControl::modSchGen(
            "Autoreg ap",
            "Auto neg",
            "cap",
            "Ca,n",
            "smap",
            "Sman.",
            "sap4",
            "San",
            "1"
        );

        self::assertEquals(true,$sassg);
    }



}
