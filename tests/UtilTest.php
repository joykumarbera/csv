<?php

use PHPUnit\Framework\TestCase;
use Bera\Csv\Helpers\Util;

class UtilTest extends TestCase
{
    public function testForFileIsCsv()
    {
        $this->assertNotFalse(Util::checkIfCsvFile('test.csv'));
    }

    public function testForFileNotIsCsv()
    {
        $this->assertFalse(Util::checkIfCsvFile('test.cv'));
    }

    public function testForCheckFunctionReturnTypeIsBool()
    {
        $this->assertIsBool(Util::checkIfCsvFile('test.cv'));
    }
}