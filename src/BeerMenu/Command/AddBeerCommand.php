<?php

declare(strict_types=1);

namespace App\BeerMenu\Command;

use App\BeerMenu\Model\Beer;
use App\BeerMenu\Model\Beers;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddBeerCommand extends Command
{
    private Beers $beers;
    private array $availableBeers = [];

    public function __construct(Beers $beers)
    {
        parent::__construct();
        $this->beers = $beers;

        $this->availableBeers = [
            'california' => new Beer(
                'California',
                'California, czyli AIPA w naszym wykonaniu, jest małym amerykańskim snem zamkniętym pod kapslem. To kaskada cytrusowych, kwiatowych aromatów z lekką nutą żywiczności i słodowości, która przeniesie Cię na zachodnie wybrzeże jednego z najpiękniejszych stanów USA. Chmielona amerykańskimi odmianami chmielu, gwarantuje wyraźną, dobrze zbalansowaną i niezalegającą goryczkę.'
            ),
            'harry' => new Beer(
                'Harry',
                'Harry wyjechał na studia do USA. Jako anglik pijał herbatę earl grey, ale musiał się dostosować do amerykanów, którzy bardziej niż herbatę, lubią piwo. Specjalnie dla Harry`ego uwarzyliśmy lekkie, jasne piwo o niskiej goryczy i wyraźnym, ale nie dominującym charakterze herbaty earl-grey.'
            ),
            'nonsens_pils' => new Beer(
                'Nonsens Pils',
                'Klasyczny pils z małym twistem w postaci herbaty earl grey. Uwarzony dla Pubu Nonsens w Gdyni.'
            )
        ];
    }

    protected function configure()
    {
        $this
            ->setName('app:add:beer')
            ->setDescription('Add beer')
            ->addArgument('beerName', InputArgument::REQUIRED, 'Please give beer name')
        ;
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        $beerName = $input->getArgument('beerName');
        if (isset($this->availableBeers[$beerName])) {
            $this->beers->inStock($this->availableBeers[strtolower($beerName)]);
        }
    }
}
