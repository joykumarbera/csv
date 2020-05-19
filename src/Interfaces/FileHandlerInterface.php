<?php
 
namespace Bera\Csv\Interfaces;

interface FileHandlerInterface
{
    /**
     * open a file resource by file name
     * 
     * @param string $file
     */
    public function openFileInWriteMode($file);

    public function closeFile();
}