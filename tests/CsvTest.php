<?php

use PHPUnit\Framework\TestCase;
use Bera\Csv\Csv;
use Bera\Csv\Exceptions\BadFileNameException;

class CsvTest extends TestCase
{
    private $csv;

    protected function setUp(): void
    {
        $this->csv = new Csv (__DIR__, 'test.csv');
    }

    public function testIfBadFileNameExceptionisThrown()
    {
        $this->expectException(BadFileNameException::class);
        $this->csv = new Csv(__DIR__, 'test.cs');
    }

    public function testIfHeaderIsNotAnArray()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->csv->addHeader('header');
    }

    public function testIfDataIsNotAnArray()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->csv->addData('data');
    }

}