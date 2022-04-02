<?php

namespace Divido\ResourceReader;

class JsonResourceReaderTest extends \Codeception\Test\Unit
{

    public function testGetItemsReturnsConfigItemsFromAValidJsonFile()
    {
        $file_path = __DIR__ . '/../../../fixtures/config.json';
        $instance = new JsonResourceReader($file_path);
        $expected_result = json_decode(
            file_get_contents($file_path),
            true
        );
        $this->assertEquals($expected_result, $instance->getItems());
    }

    public function testGetItemsReturnsEmptyConfigItemsFromAInvalidJsonFile()
    {
        $file_path = __DIR__ . '/../../../fixtures/config.invalid.json';
        $instance = new JsonResourceReader($file_path);
        $this->assertEmpty($instance->getItems());
    }
}