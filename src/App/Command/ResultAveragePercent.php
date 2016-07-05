<?php
namespace App\Command;

use App\Database\Model;

class ResultAveragePercent extends CommandInterface
{
    public function run($test)
    {
        $test = $this->getTest($test);

        $this->info(__('Calculate averages percent for test %s', $test->name));

        $rows = array();

        foreach (Model\ResultAverage::byTest($test->id) as $row) {
            $rows[$row->loop]['results'][] = $row;
        }

        foreach ($rows as $row) {
            $fast = min(array_map(function($value) {
                return $value->time;
            }, $row['results']));

            foreach ($row['results'] as $result) {
                Model\ResultAverage::updatePercent(array(
                    'percent' => round(($result->time * 100) / $fast),
                    'loop' => $result->loop,
                    'version' => $result->version,
                    'test_id' => $test->id
                ));
            }
        }
    }
}
