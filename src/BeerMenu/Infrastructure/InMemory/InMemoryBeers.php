<?php

declare(strict_types=1);

namespace App\BeerMenu\Infrastructure\InMemory;

use App\BeerMenu\Infrastructure\Resetter;
use App\BeerMenu\Model\Beer;
use App\BeerMenu\Model\Beers;
use App\BeerMenu\Query\CurrentMenuQuery;

class InMemoryBeers implements Beers, CurrentMenuQuery, Resetter
{
    private array $beers = [];

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

    public function reset(): void
    {
        $this->beers = [];
    }
}
