<?php
namespace App\Command;

use App\App\Command;
use App\Repository\Code\Test;

class ResultsGenerate extends CommandInterface
{
    public function run()
    {
        foreach (Test::getAllNames() as $test) {
            $command = new Command;
            $command->execute('result-generate', array($test));
        }
    }
}
