<?php

declare(strict_types=1);

namespace App\BeerMenu\Infrastructure\InMemory;

use App\BeerMenu\Model\Beer;
use App\BeerMenu\Model\Beers;
use App\BeerMenu\Query\CurrentMenuQuery;

class InMemoryBeers implements Beers, CurrentMenuQuery
{
    private $beers = [];

    public function inStock(Beer $beer): void
    {
        $this->beers[$beer->name()] = $beer;
    }

    public function count(): int
    {
        return count($this->beers);
    }

    public function stockOut(string $beerName): void
    {
        unset($this->beers[$beerName]);
    }
}
