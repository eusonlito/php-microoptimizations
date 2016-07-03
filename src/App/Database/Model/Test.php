<?php
namespace App\Database\Model;

use App\Database\DB;

class Test
{
    public static function all()
    {
        return DB::select('
            SELECT * FROM `test` ORDER BY `name`;
        ');
    }

    public static function byId($id)
    {
        return DB::selectOne('
            SELECT * FROM `test` WHERE `id` = :id LIMIT 1;
        ', array('id' => $id));
    }

    public static function byName($name)
    {
        return DB::selectOne('
            SELECT * FROM `test` WHERE `name` = :name LIMIT 1;
        ', array('name' => $name));
    }

    public static function insert($data)
    {
        return DB::insert('
            INSERT INTO `test`
            (`name`, `description`)
            VALUES
            (:name, :description);
        ', $data);
    }

    public static function update(array $data)
    {
        return DB::update('
            UPDATE `test`
            SET
                `name` = :name
                , `description` = :description
            WHERE id = :id;
        ', $data);
    }

    public static function deleteById($id)
    {
        return DB::delete('
            DELETE FROM `test` WHERE `id` = :id;
        ', array('id' => $id));
    }

    public static function deleteByName($name)
    {
        return DB::delete('
            DELETE FROM `test` WHERE `name` = :name;
        ', array('name' => $name));
    }
}
