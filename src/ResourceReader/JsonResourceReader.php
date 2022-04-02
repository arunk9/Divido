<?php

namespace Divido\ResourceReader;

class JsonResourceReader implements ResourceReaderInterface
{
    protected $file;

    /**
     * @param string $file
     */
    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     * This method reads config items from a file
     *
     * @return array
     */
    public function getItems(): array
    {
        $json_items = file_get_contents($this->file);

        // validate if is valid json
        if ($this->_isJson($json_items)) {
            return json_decode($json_items, true);
        }

        return [];
    }

    /**
     * Method to validate if string is a valid json
     *
     * @param string|null $string
     * @return bool
     */
    private function _isJson(?string $string): bool
    {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }
}