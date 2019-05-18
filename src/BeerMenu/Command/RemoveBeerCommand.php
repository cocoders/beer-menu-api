<?php

declare(strict_types=1);

namespace App\BeerMenu\Command;

use App\BeerMenu\Model\Beers;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RemoveBeerCommand extends Command
{
    /**
     * @var Beers
     */
    private $beers;

    public function __construct(Beers $beers)
    {
        parent::__construct();
        $this->beers = $beers;
    }

    protected function configure()
    {
        $this
            ->setName('app:remove:beer')
            ->setDescription('Remove beer')
            ->addArgument('beerName', InputArgument::REQUIRED, 'Please give beer name')
        ;
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        $beerName = $input->getArgument('beerName');
        $this->beers->stockOut(ucfirst(strtolower($beerName)));
    }
}
