<?php

declare(strict_types=1);

namespace Maccath\GrowVeg\Tests\Plants;

use Maccath\GrowVeg\Plants\Plant;
use Maccath\GrowVeg\Plants\PlantCollection;
use PHPUnit\Framework\TestCase;
use Ramsey\Collection\CollectionInterface;

class PlantCollectionTest extends TestCase
{
    public function testExists(): void
    {
        $collection = new PlantCollection();

        $this->assertInstanceOf(CollectionInterface::class, $collection);
        $this->assertSame(Plant::class, $collection->getType());
    }
}
