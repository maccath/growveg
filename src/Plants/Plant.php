<?php

declare(strict_types=1);

namespace Maccath\GrowVeg\Plants;

interface Plant
{
    public function getName(): string;

    public function getLatinName(): string;

    public function isPerennial(): bool;
}
