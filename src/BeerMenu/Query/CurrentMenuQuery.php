<?php

declare(strict_types=1);

namespace App\BeerMenu\Query;

interface CurrentMenuQuery
{
    public function count(): int;
}
