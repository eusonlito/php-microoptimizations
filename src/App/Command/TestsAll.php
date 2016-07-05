<?php
namespace App\Command;

use App\App\Command;
use App\Database\Model\Test;

class TestsAll extends CommandInterface
{
    public function run()
    {
        $command = new Command;

        $command->execute('tests-load');
        $command->execute('tests-clean');

        foreach (Test::all() as $test) {
            $command->execute('result-generate', array($test));
            $command->execute('result-average', array($test));
            $command->execute('result-average-percent', array($test));
        }
    }
}
