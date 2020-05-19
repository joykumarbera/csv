<?php

use PHPUnit\Framework\TestCase;
use Bera\Csv\Core\FileHandler;

class FileHandlerTest extends TestCase
{
    public function testForOpenFile()
    {
        $file_handler = new FileHandler;
        $file_handler->openFileInWriteMode('test.txt');
        $this->assertIsResource($file_handler->getFileResource());
    }

    public function testForCloseFile()
    {
        $file_handler = new FileHandler;
        $file_handler->openFileInWriteMode('test.txt');
        $file_handler->closeFile();
        $this->assertIsNotResource($file_handler->getFileResource());
    }
}