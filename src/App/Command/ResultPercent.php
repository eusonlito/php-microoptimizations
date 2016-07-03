<?php
namespace App\Command;

use App\Database\Model\Test;
use App\Database\Model\Result;

class ResultPercent extends CommandInterface
{
    public function run($test, $date)
    {
        $this->info(__('Calculate percents for test %s', $test->name));

        $rows = array();

        foreach (Result::byTest($test->id) as $row) {
            if ($row->date === $date) {
                $rows[$row->date.'|'.$row->loop]['results'][] = $row;
            }
        }

        foreach ($rows as $row) {
            $fast = min(array_map(function($value) {
                return $value->time;
            }, $row['results']));

            foreach ($row['results'] as $result) {
                Result::update(array(
                    'id' => $result->id,
                    'date' => $result->date,
                    'loop' => $result->loop,
                    'version' => $result->version,
                    'time' => $result->time,
                    'memory' => $result->memory,
                    'percent' => round(($result->time * 100) / $fast)
                ));
            }
        }
    }
}
