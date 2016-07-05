<?php
namespace App\Command;

use App\App\Command;
use App\Database\Model\Test;

class ResultsAverage extends CommandInterface
{
    public function run()
    {
        foreach (Test::all() as $test) {
            $command = new Command;
            $command->execute('result-average', array($test));
        }
    }
}
