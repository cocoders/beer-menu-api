<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @When barman doda nowe piwa:
     * @Given że barman dodał piwa:
     */
    public function barmanDodaNowePiwa(TableNode $table)
    {
        throw new PendingException();
    }

    /**
     * @When barman stwierdzi, że piwo :arg1 się skończyło
     */
    public function barmanStwierdziZePiwoSieSkonczylo($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then klient powinien zobaczyć :beerCount piwo
     * @Then klient powinien zobaczyć :beerCount piwa
     */
    public function klientPowinienZobaczycPiwo(int $beerCount)
    {
        throw new PendingException();
    }
}
