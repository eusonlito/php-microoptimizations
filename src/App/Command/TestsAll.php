<?php
namespace App\Command;

use App\App\Command;
use App\Repository\Code\Test;

class TestsAll extends CommandInterface
{
    public function run()
    {
        $command = new Command;

        $command->execute('tests-load');
        $command->execute('tests-clean');

        $command->execute('results-generate');
        $command->execute('results-percent');
    }
}
