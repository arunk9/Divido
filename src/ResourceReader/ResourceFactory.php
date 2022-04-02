<?php

namespace Divido\ResourceReader;

class ResourceFactory
{
    /**
     * Get a resource reader instance based on the file type
     *
     * @param string $file
     * @return ResourceReaderInterface
     * @throws \Exception
     */
    public static function getInstance(string $file): ResourceReaderInterface
    {
        $ext = pathinfo($file, PATHINFO_EXTENSION);

        // Create a config file reader instance based on the file type
        // for now we have only json file reader
        // in future we can extend to other file type
        switch($ext) {
            case 'json':
                return new JsonResourceReader($file);
            default:
                throw new \Exception("Not a valid file type");
        }
    }
}