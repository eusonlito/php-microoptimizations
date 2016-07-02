<?php
namespace App\Command;

use App\Repository\Code\Test;

class TestsRun extends CommandInterface
{
    private $loops = array(10000, 100000);

    public function run()
    {
        foreach (Test::getAll() as $test) {
            $test = new Test($test);

            foreach ($this->loops as $loop) {
                $test->run($loop);
            }

            d($test->getStats());
        }
    }
}
