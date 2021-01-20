<?php


use PHPUnit\Framework\TestCase;

include 'storage/SchedaFollowUp.php';

class SchedaFollowUpTest extends TestCase
{

    public function testSetRicadute()
    {
        $schedafollowup= new SchedaFollowUp(1, "2021-01-20", "aaaa", "bbbb", "1", "Scheda Follow Up");
        $schedafollowup -> setRicadute("ricadute updated");
        self::assertEquals("ricadute updated", $schedafollowup->getRicadute());
    }

    public function testGetRicadute()
    {
        {
            $schedafollowup = new SchedaFollowUp(1, "2021-01-20", "aaaa", "aaaa", "1", "Scheda Follow Up");
            self::assertEquals("aaaa",$schedafollowup->getRicadute());
        }
    }

    public function testSetEsitiPositivi()
    {
        $schedafollowup= new SchedaFollowUp(1, "2021-01-20", "aaaa", "bbbb", "1", "Scheda Follow Up");
        $schedafollowup -> setEsitiPositivi("esiti positivi updated");
        self::assertEquals("esiti positivi updated", $schedafollowup->getEsitiPositivi());
    }

    public function testGetEsitiPositivi()
    {
        $schedafollowup = new SchedaFollowUp(1, "2021-01-20", "aaaa", "bbbb", "1", "Scheda Follow Up");
        self::assertEquals("bbb",$schedafollowup->getEsitiPositivi());
    }
}
