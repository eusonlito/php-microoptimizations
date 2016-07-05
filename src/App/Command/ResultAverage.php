<?php
namespace App\Command;

use App\Database\Model;

class ResultAverage extends CommandInterface
{
    public function run($test)
    {
        $test = $this->getTest($test);

        $this->info(__('Calculate averages for test %s', $test->name));

        $rows = array();

        foreach (Model\Result::byTest($test->id) as $row) {
            $rows[$row->loop.'|'.$row->version][] = (array)$row;
        }

        foreach ($rows as $row) {
            Model\ResultAverage::insertUpdate(array(
                'loop' => $row[0]['loop'],
                'version' => $row[0]['version'],
                'time' => (array_sum(array_column($row, 'time')) / count($row)),
                'memory' => (array_sum(array_column($row, 'memory')) / count($row)),
                'test_id' => $test->id
            ));
        }
    }
}
