<?php

declare(strict_types=1);

namespace App\BeerMenu\Infrastructure\Firestore;

use App\BeerMenu\Model\Beer;
use App\BeerMenu\Model\Beers as BeersInterface;
use Google\Cloud\Firestore\FirestoreClient;

class Beers implements BeersInterface
{
    public function inStock(Beer $beer): void
    {
        $firestore = new FirestoreClient();

        $docRef = $firestore->collection('beers')->document($beer->name());
        $docRef->set([
            'name' => $beer->name(),
            'description' => $beer->description(),
        ]);
    }

    public function stockOut(string $beerName): void
    {
        $firestore = new FirestoreClient();

        $docRef = $firestore->collection('beers')->document($beerName);
        $docRef->delete();
    }
}
