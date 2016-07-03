<?php
namespace App\Database;

use PDO;

class DB
{
    private static $pdo;

    private static function pdo()
    {
        if (self::$pdo) {
            return self::$pdo;
        }

        $config = config('database');

        self::$pdo = new PDO($config['dsn']);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        return self::$pdo;
    }

    public static function select($query, array $data = array())
    {
        $query = self::pdo()->prepare($query);

        $query->execute($data);

        return $query->fetchAll();
    }

    public static function selectOne($query, array $data = array())
    {
        $query = self::pdo()->prepare($query);

        $query->execute($data);

        return $query->fetch();
    }

    public static function insert($query, array $data)
    {
        self::pdo()->prepare($query)->execute($data);

        return self::pdo()->lastInsertId();
    }

    public static function update($query, array $data)
    {
        return self::pdo()->prepare($query)->execute($data);
    }

    public static function delete($query, array $data)
    {
        return self::pdo()->prepare($query)->execute($data);
    }
}
