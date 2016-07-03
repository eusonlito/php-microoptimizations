<?php
namespace App\Command;

use App\Repository\Code;
use App\Database\Model;

class ResultGenerate extends CommandInterface
{
    private $loops = array(10000, 100000);

    public function run($test)
    {
        foreach ($this->loops as $loop) {
            $this->loop($test, $loop);
        }
    }

    private function loop($test, $loop)
    {
        $test = Code\Test::getObject($test);
        $stats = $test->run($loop);

        Model\Result::insert(array(
            'date' => date('Y-m-d'),
            'loop' => $stats['loop'],
            'version' => $stats['php'],
            'time' => $stats['time'],
            'memory' => $stats['memory'],
            'test_id' => Model\Test::byName($test->getName())->id
        ));

        $this->info(__('Test %s stats (%s)', $test->getName(), $loop), $stats);
    }
}
