<?php
namespace App\Command;

use App\App\Command;
use App\Repository\Code\Test;

class TestsLoad extends CommandInterface
{
    public function run()
    {
        $command = new Command;

        foreach (Test::getAllNames() as $test) {
            $command->execute('test-load', array($test));
        }
    }
}
