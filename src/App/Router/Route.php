<?php
namespace App\Router;

use App\Exception;

class Route
{
    private static $routes;

    private static function load()
    {
        if (isset($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) === 'on')) {
            self::$routes['connection_scheme'] = 'https';
        } else {
            self::$routes['connection_scheme'] = 'http';
        }

        self::$routes['server_name'] = getenv('SERVER_NAME');
        self::$routes['document_root'] = rtrim(getenv('DOCUMENT_ROOT'), '/');
        self::$routes['base_path'] = APP_BASE_PATH;
        self::$routes['libs_path'] = APP_LIBS_PATH;
        self::$routes['public_path'] = APP_BASE_PATH.'/public';
        self::$routes['storage_path'] = APP_BASE_PATH.'/storage';
        self::$routes['config_path'] = APP_BASE_PATH.'/config';
        self::$routes['template_path'] = APP_BASE_PATH.'/src/templates';

        self::$routes['public_url_path'] = preg_replace('|^'.self::$routes['document_root'].'|i', '', self::$routes['public_path']) ?: '/';
        self::$routes['public_url'] = rtrim(self::$routes['connection_scheme'].'://'.getenv('SERVER_NAME').self::$routes['public_url_path'], '/');
    }

    public static function __callStatic($name, array $arguments)
    {
        if (strpos($name, 'get') !== 0) {
            throw new Exception\BadFunctionCallException('Please, callme with getRouteName');
        }

        if (empty(self::$routes)) {
            self::load();
        }

        $route = ltrim(strtolower(preg_replace('/[A-Z]/', '_$0', str_replace('get', '', $name))), '_');

        if (!array_key_exists($route, self::$routes)) {
            throw new Exception\BadFunctionCallException(__('Route %s not exists', $route));
        }

        return self::$routes[$route].implode('', $arguments);
    }
}
