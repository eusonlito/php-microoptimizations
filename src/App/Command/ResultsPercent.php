<?php
namespace App\Command;

use App\App\Command;
use App\Database\Model\Test;

class ResultsPercent extends CommandInterface
{
    public function run()
    {
        $date = date('Y-m-d');

        foreach (Test::all() as $test) {
            $command = new Command;
            $command->execute('result-percent', array($test, $date));
        }
    }
}
