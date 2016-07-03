<?php
namespace App\Database\Model;

use App\Database\DB;

class StatCompare
{
    public static function addVisit($test_id_1, $test_id_2)
    {
        DB::insert('
            INSERT OR IGNORE INTO `stat_compare`
            (`test_id_1`, `test_id_2`)
            VALUES
            (:test_id_1, :test_id_2);
        ', array(
            'test_id_1' => $test_id_1,
            'test_id_2' => $test_id_2
        ));

        return DB::update('
            UPDATE `stat_compare`
            SET `visits` = `visits` + 1
            WHERE (
                `test_id_1` = :test_id_1
                AND `test_id_2` = :test_id_2
            );
        ', array(
            'test_id_1' => $test_id_1,
            'test_id_2' => $test_id_2
        ));
    }
}
