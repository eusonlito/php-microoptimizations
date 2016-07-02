<?php
namespace App\Database;

use PDO;
use SimpleCrud\SimpleCrud;

class DB
{
    private static $db;

    public static function table($table)
    {
        if (empty(self::$db)) {
            self::$db = self::load();
        }

        return self::$db->$table;
    }

    private static function load()
    {
        $config = config('database');

        return new SimpleCrud(new PDO($config['dsn']));
    }
}
