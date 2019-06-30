<?php

declare(strict_types=1);

namespace App\Command;

use App\BeerMenu\Infrastructure\Resetter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ResetDatabaseCommand extends Command
{
    protected static $defaultName = 'app:reset-db';
    private Resetter $resetter;

    public function __construct(Resetter $resetter)
    {

        parent::__construct();
        $this->resetter = $resetter;
    }

    protected function configure()
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->resetter->reset();

        $output->writeln('Database is clear now ');
    }
}
