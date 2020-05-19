<?php

namespace Bera\Csv\Core;

use Bera\Csv\Interfaces\CsvGeneratorInterface;

class CsvGenerator implements CsvGeneratorInterface
{
    /**
     * generate csv files
     * 
     * @param resource $file_resource
     * @param array $header
     * @param array $data
     */
    public function generate($file_resource, $data)
    {
        foreach($data as $row)
        {
            $this->writeCsv($file_resource,$row);
        }
    }

    /**
     * attach csv header
     * 
     * @param resource $file_resource
     * @param array $data
     */
    public function attachHeader($file_resource, $data)
    {
        $this->writeCsv($file_resource,$data);
    }

    /**
     * @param resource $file_resource
     * @param array $data
     */
    private function writeCsv($file_resource, $data)
    {
        \fputcsv($file_resource, $data);
    }
}