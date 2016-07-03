<?php
namespace App\Command;

use Exception;
use App\App\Command;
use App\Repository\Code\Test;

class ResultsGenerate extends CommandInterface
{
    public function run()
    {
        foreach (Test::getAllNames() as $test) {
            $command = new Command;

            try {
                $command->execute('result-generate', array($test));
            } catch (Exception $e) {
                d($e->getMessage());
            }
        }
    }
}
