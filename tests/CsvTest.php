<?php

use PHPUnit\Framework\TestCase;
use Bera\Csv\Csv;
use Bera\Csv\Exceptions\BadFileNameException;

class CsvTest extends TestCase
{
    private $csv;

    protected function setUp(): void
    {
        $this->csv = Csv::Init(__DIR__, 'test.csv');
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