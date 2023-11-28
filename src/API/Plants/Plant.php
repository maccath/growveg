<?php

declare(strict_types=1);

namespace Maccath\GrowVeg\API\Plants;

use Maccath\GrowVeg\Plants\Plant as PlantIface;

final readonly class Plant implements PlantIface
{
    public function __construct(
        private string $name,
        private string $latinName,
        private bool $perennial,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLatinName(): string
    {
        return $this->latinName;
    }

    public function isPerennial(): bool
    {
        return $this->perennial;
    }
}
