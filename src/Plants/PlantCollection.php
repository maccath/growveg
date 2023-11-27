<?php

declare(strict_types=1);

namespace Maccath\GrowVeg\Plants;

use Ramsey\Collection\AbstractCollection;

final class PlantCollection extends AbstractCollection
{
    public function getType(): string
    {
        return Plant::class;
    }
}
