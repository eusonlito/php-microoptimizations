<?php
namespace App\Command;

use App\Repository\Code;
use App\Database\Model;

class TestsRun extends CommandInterface
{
    private $loops = array(10000, 100000, 1000000);

    public function run()
    {
        $date = date('Y-m-d');

        foreach (Code\Test::getAll() as $test) {
            $testDB = Model\Test::byName($test);

            if (empty($testDB)) {
                continue;
            }

            $test = new Code\Test($test);

            foreach ($this->loops as $loop) {
                $test->run($loop);
            }

            $stats = $test->getStats();

            foreach ($stats['stats'] as $stat) {
                Model\Result::insert(array(
                    'date' => $date,
                    'loop' => $stat['loop'],
                    'version' => $stats['php'],
                    'time' => $stat['time'],
                    'memory' => $stat['memory'],
                    'test_id' => $testDB->id
                ));
            }
        }
    }
}
