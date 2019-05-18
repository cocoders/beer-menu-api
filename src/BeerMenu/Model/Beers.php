<?php

declare(strict_types=1);

namespace App\BeerMenu\Model;

interface Beers
{
    public function inStock(Beer $beer): void;
    public function stockOut(string $beerName): void;
}
