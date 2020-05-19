<?php

namespace Bera\Csv;

use Bera\Csv\Helpers\Util;
use Bera\Csv\Exceptions\BadFileNameException;
use Bera\Csv\Core\CsvGenerator;
use Bera\Csv\Core\FileHandler;

class Csv 
{
    /**
     * @var array $header
     */
    private $header;

    /**
     * @var array $data
     */
    private $data;

    /**
     * @var string $path
     */
    private $path;

    /**
     * @var string $file_name
     */
    private $file_name;

    /**
     * @var object $file_handler
     */
    private $file_handler;

    /**
     * @var object $csv_generator
     */
    private $csv_generator;

    /**
     * class constructor
     * 
     * @param string $file_name
     */
    public function __construct($path, $file_name)
    {
        $this->file_handler = new FileHandler;
        $this->csv_generator = new CsvGenerator;
        $this->setFileName($path, $file_name);
    }

    /**
     * set a file path and name
     * 
     * @param string $path
     * @param string $file_name
     */
    private function setFileName($path, $file_name)
    {
        if(!Util::checkIfCsvFile(
                $this->file_handler->getFullFilePath($path, $file_name)
            )
        )
        throw new BadFileNameException( $file_name .' not a csv file type');

        if(is_dir($this->path))
            $this->file_handler->createNewDir($this->path);

        if(!is_writable($this->path))
            $this->file_handler->makeDirWritable($this->path);
        
        $this->path = $path;
        $this->file_name = $file_name;
    }

    /**
     * add csv header
     * 
     * @param array $header
     */
    public function addHeader($header)
    {
        if(!is_array($header))
            throw new \InvalidArgumentException('header must be an array');
        $this->header = $header;
    }

    /**
     * add csv data
     * 
     * @param array $data
     */
    public function addData($data)
    {
        if(!is_array($data))
            throw new \InvalidArgumentException('data must be an array');
        $this->data = $data;
    }

    /**
     * generate a csv file
     */
    public function generate()
    {

        $this->file_handler->openFileInWriteMode(
            $this->file_handler->getFullFilePath($this->path, $this->file_name)
        );
        $this->csv_generator->attachHeader($this->file_handler->getFileResource(),$this->header);
        $this->csv_generator->generate(
            $this->file_handler->getFileResource(),
            $this->data
        );
        $this->file_handler->closeFile($this->file_handler->getFileResource());
    }
}