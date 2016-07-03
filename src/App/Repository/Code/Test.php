<?php
namespace App\Repository\Code;

use App\App\Check;

class Test
{
    /**
     * @var array
     */
    private static $names = array();

    public static function getAllNames()
    {
        if (self::$names) {
            return self::$names;
        }

        foreach (glob(__DIR__.'/Tests/*.php') as $file) {
            $file = preg_replace('/\.php$/', '', basename($file));

            if (substr($file, -4) === 'Test') {
                self::$names[] = $file;
            }
        }

        return self::$names;
    }

    public static function getAllObjects()
    {
        $tests = array();

        foreach (self::getAllNames() as $test) {
            $tests[$test] = self::getObject($test);
        }

        return $tests;
    }

    public static function getObject($test)
    {
        $test = Check::getClass(__NAMESPACE__.'\\Tests', $test);

        return new $test;
    }
}
