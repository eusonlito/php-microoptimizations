<?php
namespace App\Database\Model;

use App\Database\DB;

class Result
{
    public static function all()
    {
        return DB::select('
            SELECT * FROM `result`;
        ');
    }

    public static function byTest($test_id)
    {
        return DB::select('
            SELECT * FROM `result`
            WHERE `test_id` = :test_id
            ORDER BY `date` DESC, `loop` ASC, `version` DESC;
        ', array('test_id' => $test_id));
    }

    public static function insert($data)
    {
        return DB::insert('
            INSERT OR IGNORE INTO `result`
            (`date`, `loop`, `version`, `time`, `memory`, `test_id`)
            VALUES
            (:date, :loop, :version, :time, :memory, :test_id);
        ', $data);
    }
}
