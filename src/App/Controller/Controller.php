<?php
namespace App\Controller;

use Exception as BaseException;
use App\Exception;
use App\Router\Router;
use App\Template\Template;

abstract class Controller
{
    public function __construct(Router $router)
    {
        meta()->set('title', 'PHP micro-optimizations');

        template()->share(array(
            'ROUTE' => $router->getRoute()
        ));
    }

    public static function getClass($name)
    {
        return new $name;
    }

    protected static function page($name, $file, array $parameters = array())
    {
        return self::template($name, 'pages.'.$file, $parameters);
    }

    protected static function content($file, array $parameters = array())
    {
        self::page('body', explode('.', $file)[0].'.layout');

        return self::page('content', $file, $parameters);
    }

    protected static function template($name, $file, array $parameters = array())
    {
        return template()->set($name, $file, $parameters);
    }

    protected static function error($layout, $message)
    {
        self::page('body', $layout.'.layout');

        return self::template('content', 'molecules.error', array(
            'message' => $message
        ));
    }
}
