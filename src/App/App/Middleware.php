<?php
namespace App\App;

class Middleware
{
    private static $namespace = 'App\\Middleware';

    public static function run($app, $name, $settings)
    {
        $class = Check::getClass(self::$namespace, $name);

        $class = new $class;
        $class->handler($app, $settings);
    }
}
