<?php

namespace Divido\ResourceReader;

class ResourceFactoryTest extends \Codeception\Test\Unit
{
    public function testGetInstanceReturnsAReaderInstance(): void
    {
        $instance = ResourceFactory::getInstance("dummyfile.json");
        $this->assertInstanceOf(ResourceReaderInterface::class, $instance);
    }


    public function testGetInstanceThrowsExceptionForInvalidFileType(): void
    {
        $this->expectException(\Exception::class);
        ResourceFactory::getInstance("dummyfile.txt");
    }
}