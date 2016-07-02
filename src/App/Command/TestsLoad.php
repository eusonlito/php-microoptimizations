<?php
namespace App\Command;

use App\Database\DB;
use App\Repository\Code\Test;

class TestsLoad extends CommandInterface
{
    private $loops = array(10000, 100000);

    public function run()
    {
        $current = array();

        foreach (DB::table('test')->select()->run() as $test) {
            $current[$test->code] = $test;
        }

        foreach (Test::getAll() as $test) {
            $test = new Test($test);

            foreach ($this->loops as $loop) {
                $test->run($loop);
            }

            d($test->getStats());
        }
    }
}
