<?php

namespace App\Tests\Behat;

use App\BeerMenu\Model\Beer;
use App\BeerMenu\Model\Beers;
use App\BeerMenu\Query\CurrentMenuQuery;
use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $beers;
    private $currentMenuQuery;

    public function __construct(
        Beers $beers,
        CurrentMenuQuery $currentMenuQuery
    )
    {
        $this->beers = $beers;
        $this->currentMenuQuery = $currentMenuQuery;
    }

    /**
     * @When barman doda nowe piwa:
     * @Given że barman dodał piwa:
     */
    public function barmanDodaNowePiwa(TableNode $table)
    {
        foreach ($table as $row) {
            $this->beers->inStock(new Beer(
                $row['nazwa'],
                $row['opis']
            ));
        }
    }

    /**
     * @When barman stwierdzi, że piwo :beerName się skończyło
     */
    public function barmanStwierdziZePiwoSieSkonczylo(string $beerName)
    {
        $this->beers->stockOut($beerName);
    }

    /**
     * @Then klient powinien zobaczyć :beerCount piwo
     * @Then klient powinien zobaczyć :beerCount piwa
     */
    public function klientPowinienZobaczycPiwo(int $beerCount)
    {
        $currentBeerCount = $this->currentMenuQuery->count();

        if ($beerCount !== $currentBeerCount) {
            throw new \Exception("Wrong beer count: should be $beerCount but there is $currentBeerCount");
        }
    }
}
