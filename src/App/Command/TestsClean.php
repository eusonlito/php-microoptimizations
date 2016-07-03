<?php
namespace App\Command;

use App\App\Command;
use App\Database\Model\Test;

class TestsClean extends CommandInterface
{
    public function run()
    {
        $command = new Command;

        foreach (Test::all() as $test) {
            $command->execute('test-clean', array($test->name));
        }
    }
}
