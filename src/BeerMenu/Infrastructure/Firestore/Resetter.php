<?php

declare(strict_types=1);

namespace App\BeerMenu\Infrastructure\Firestore;

use App\BeerMenu\Infrastructure\Resetter as ResetterInterface;
use Google\Cloud\Firestore\FirestoreClient;

final class Resetter implements ResetterInterface
{
    public function reset(): void
    {
        $firebase = new FirestoreClient();

        $documents = $firebase->collection('beers')->documents();
        foreach ($documents as $document) {
            $document->reference()->delete();
        }
    }
}
