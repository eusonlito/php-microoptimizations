<?php
namespace App\App;

class Controller
{
    private static $namespace = 'App\\Controller';

    public static function run($app)
    {
        $class = Check::getClass(self::$namespace, $app->router->getController());
        $class = new $class($app->router);

        $method = Check::getMethod($class, $app->router->getMethod());

        return call_user_func_array(array($class, $method), $app->router->getArguments());
    }
}
