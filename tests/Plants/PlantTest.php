<?php

declare(strict_types=1);

namespace Plants;

use Maccath\GrowVeg\Plants\Plant;
use PHPUnit\Framework\TestCase;

class PlantTest extends TestCase
{
    public function testExists(): void
    {
        $this->assertTrue(interface_exists(Plant::class));
    }
}
