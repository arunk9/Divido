<?php

namespace Divido;

class ConfigTest extends \Codeception\Test\Unit
{
    public function testGetInstanceReturnsConfigInstance(): void
    {
        $instance = Config::getInstance();
        $this->assertInstanceOf(Config::class, $instance);
    }

    public function testGetReturnsConfigItemFromFixturesFolder(): void
    {
        $instance = Config::getInstance();
        $this->assertEquals(
            [
                'redis' => [
                    'host' => '127.0.0.1',
                    'port' => 6379
                ]
            ],
            $instance->get('cache')
        );

        $this->assertEquals(
            'divido',
            $instance->get('database.username')
        );
    }
}