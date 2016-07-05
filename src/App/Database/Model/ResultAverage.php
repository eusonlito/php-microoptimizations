<?php
namespace App\Database\Model;

use App\Database\DB;

class ResultAverage
{
    public static function byTest($test_id)
    {
        return DB::select('
            SELECT * FROM `result_average`
            WHERE `test_id` = :test_id
            ORDER BY `loop` ASC, `percent` ASC;
        ', array('test_id' => $test_id));
    }

    public static function insertUpdate(array $data)
    {
        DB::insert('
            INSERT OR IGNORE INTO `result_average`
            (`loop`, `version`, `time`, `memory`, `test_id`)
            VALUES
            (:loop, :version, :time, :memory, :test_id);
        ', $data);

        return DB::update('
            UPDATE `result_average`
            SET
                `time` = :time
                , `memory` = :memory
            WHERE (
                `loop` = :loop
                AND `version` = :version
                AND `test_id` = :test_id
            );
        ', array(
            'time' => $data['time'],
            'memory' => $data['memory'],
            'loop' => $data['loop'],
            'version' => $data['version'],
            'test_id' => $data['test_id'],
        ));
    }

    public static function updatePercent(array $data)
    {
        return DB::update('
            UPDATE `result_average`
            SET `percent` = :percent
            WHERE (
                `loop` = :loop
                AND `version` = :version
                AND `test_id` = :test_id
            );
        ', $data);
    }
}
