<?php

declare(strict_types=1);

namespace App\BeerMenu\Infrastructure\Firestore;

use App\BeerMenu\Query\CurrentMenuQuery as CurrentMenuQueryInterface;
use Google\Cloud\Firestore\FirestoreClient;

class CurrentMenuQuery implements CurrentMenuQueryInterface
{
    public function count(): int
    {
        $firestore = new FirestoreClient();

        return $firestore->collection('beers')->documents()->size();
    }
}
