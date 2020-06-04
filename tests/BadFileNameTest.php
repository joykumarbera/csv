<?php

use PHPUnit\Framework\TestCase;
use Bera\Csv\Csv;
use Bera\Csv\Exceptions\BadFileNameException;

class BadFileNameTest extends TestCase
{
    public function testIfBadFileNameExceptionisThrown()
    {
        $this->expectException(BadFileNameException::class);
        $csv = Csv::Init(__DIR__, 'test.c');
    }
}