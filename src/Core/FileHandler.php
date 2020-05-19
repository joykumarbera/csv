<?php

namespace Bera\Csv\Core;

use Bera\Csv\Interfaces\FileHandlerInterface;

class FileHandler implements FileHandlerInterface
{
    /**
     * @var resource $file_resource
     */
    private $file_resource;

    /**
     * open a file in write mode 
     * 
     * @param string $file_path
     */
    public function openFileInWriteMode($file_path)
    {
        $this->file_resource = fopen($file_path,'w');
    }

    /**
     * close a file 
     */
    public function closeFile()
    {
        if(!is_null($this->file_resource))
        {
            fclose($this->file_resource);
            $this->file_resource = null;
        }
    }

    /**
     * get a file resource
     * 
     * @return resource 
     */
    public function getFileResource()
    {
        return $this->file_resource;
    }

    /**
     * @param string $path
     * @param string $file_name
     */
    public function getFullFilePath($path, $file_name)
    {
        return $path . DIRECTORY_SEPARATOR . $file_name;
    }

    /**
     * make a directory writable
     * 
     * @param string $path
     */
    public function makeDirWritable($path)
    {
        if(is_dir($path))
            chomd($path,0755);
    }

    /**
     * create a new directory
     * 
     * @param string $path
     */
    public function createNewDir($path)
    {
        if ( !file_exists( $path ) && !is_dir( $path ) )
            return mkdir( $path );
        else 
            return false;
    }
}

