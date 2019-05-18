<?php

declare(strict_types=1);

namespace App\BeerMenu\Infrastructure;

interface Resetter
{
    public function reset(): void;
}
