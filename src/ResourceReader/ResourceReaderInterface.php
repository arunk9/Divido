<?php

namespace Divido\ResourceReader;

interface ResourceReaderInterface
{
    /**
     * This method reads config items from a file
     * @return array
     */
    public function getItems(): array;
}