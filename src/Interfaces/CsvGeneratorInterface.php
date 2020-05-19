<?php

namespace Bera\Csv\Interfaces;

interface CsvGeneratorInterface
{
    /**
     * generate csv files
     * 
     * @param resource $file_resource
     * @param array $header
     * @param array $data
     */
    public function generate($file_resource, $data);

    /**
     * attach a csv header
     * 
     * @param resource $file_resource
     * @param array $header
     */
    public function attachHeader($file_resource, $header);
}