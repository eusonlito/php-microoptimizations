<?php
namespace App\Database\Model;

use App\Database\DB;
use App\Router\Router;

class StatCompare
{
    public static function topPairs($limit)
    {
        return DB::select('
            SELECT `t1`.`name` `t1_name`, `t2`.`name` `t2_name`
            FROM `stat_compare` `st`, `test` `t1`, `test` `t2`
            WHERE (
                `t1`.`id` = `st`.`test_id_1`
                AND `t2`.`id` = `st`.`test_id_2`
            )
            ORDER BY `st`.`visits` DESC
            LIMIT :limit;
        ', array('limit' => $limit));
    }

    public static function addVisit($test_id_1, $test_id_2)
    {
        $data = array(
            'test_id_1' => $test_id_1,
            'test_id_2' => $test_id_2,
            'ip' => Router::getClientIp()
        );

        $exists = DB::selectOne('
            SELECT `id` FROM `stat_compare`
            WHERE (
                `ip` = :ip
                AND `test_id_1` = :test_id_1
                AND `test_id_2` = :test_id_2
            )
            LIMIT 1;
        ', $data);

        if ($exists) {
            return;
        }

        DB::insert('
            INSERT OR IGNORE INTO `stat_compare`
            (`test_id_1`, `test_id_2`, `ip`)
            VALUES
            (:test_id_1, :test_id_2, :ip);
        ', $data);

        return DB::update('
            UPDATE `stat_compare`
            SET
                `visits` = `visits` + 1
                , `ip` = :ip
            WHERE (
                `test_id_1` = :test_id_1
                AND `test_id_2` = :test_id_2
            );
        ', $data);
    }
}
