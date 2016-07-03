<?php
namespace App\Command;

use Exception;
use App\App\Command;
use App\Repository\Code\Test;

class ResultsGenerate extends CommandInterface
{
    public function run()
    {
        $debug = config('app');
        $debug = $debug['debug'];

        foreach (Test::getAllNames() as $test) {
            $command = new Command;

            try {
                $command->execute('result-generate', array($test));
            } catch (Exception $e) {
                $function = $debug ? 'dd' : 'd';
                $function(array(
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'message' => $e->getMessage()
                ));
            }
        }
    }
}
