<?php

declare(strict_types=1);

namespace API\Plants;

use Maccath\GrowVeg\API\Plants\Plant;
use Maccath\GrowVeg\Plants\Plant as PlantIface;
use PHPUnit\Framework\TestCase;

class PlantTest extends TestCase
{
    private Plant $mint;
    private Plant $parsley;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mint = new Plant('Mint', 'Mentha', true);
        $this->parsley = new Plant('Parsley', 'Petroselinum crispum', false);
    }

    public function testExists(): void
    {
        $this->assertInstanceOf(PlantIface::class, $this->mint);
    }

    public function testGetName(): void
    {
        $this->assertSame('Mint', $this->mint->getName());
        $this->assertSame('Parsley', $this->parsley->getName());
    }

    public function testGetLatinName(): void
    {
        $this->assertSame('Mentha', $this->mint->getLatinName());
        $this->assertSame('Petroselinum crispum', $this->parsley->getLatinName());
    }

    public function testPerennial(): void
    {
        $this->assertTrue($this->mint->isPerennial());
        $this->assertFalse($this->parsley->isPerennial());
    }
}
