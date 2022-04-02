<?php

namespace Divido;

use Divido\ResourceReader\ResourceFactory;

class Config
{
    private static $instance;

    protected $items = [];

    private function __construct()
    {
        $this->init();
    }

    /**
     * Create a singleton instance of the class
     *
     * @return $this
     */
    public static function getInstance(): self
    {
        if(is_null(self::$instance))
        {
            self::$instance = new Config();
        }

        return self::$instance;
    }

    /**
     * Init function to read all configuration files
     * and load them in the system to use
     */
    private function init()
    {
        $dir = __DIR__ . '/../fixtures';
        // read and load configuration files
        $files = scandir($dir, 0);
        $count = count($files);

        for ($i = 2; $i < $count; $i++) {
            $reader = ResourceFactory::getInstance($dir . '/' . $files[$i]);
            $_items  = $reader->getItems();

            if(!empty($_items)) {
                $this->items = array_merge($this->items, $_items);
            }

        }
    }

    /**
     * Read a configuration variable using dot separated path
     * variable
     *
     * @param string $key
     * @return array|mixed|null
     */
    public function get(string $key)
    {
        $array = $this->items;

        foreach (explode('.', $key) as $segment) {
            if (!empty($array) && isset($array[$segment])) {
                $array = $array[$segment];
            } else {
                return null;
            }
        }

        return $array;
    }
}
