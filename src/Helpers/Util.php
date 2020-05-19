<?php

namespace Bera\Csv\Helpers;

class Util
{
    /**
     * check if file type is csv or not
     * 
     * @param string $file_name
     * @return bool
     */
    public static function checkIfCsvFile($file_name)
    {
        $file_ext = \pathinfo($file_name,PATHINFO_EXTENSION);
        if($file_ext != 'csv')
            return false;
        return true;
    }

}