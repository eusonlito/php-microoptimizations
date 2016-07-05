<?php
namespace App\Router;

class Router
{
    private $url;
    private $parsed;

    public function __construct($url)
    {
        $this->url = $url;
        $this->parsed = $this->parseUrl($url);

        return $this;
    }

    public function getMethod()
    {
        return $this->parsed['method'];
    }

    public function getController()
    {
        return $this->parsed['controller'];
    }

    public function getArguments()
    {
        return $this->parsed['arguments'];
    }

    public function getRoute()
    {
        return strtolower($this->parsed['controller'].'-'.$this->parsed['method']);
    }

    public static function getClientIP()
    {
        return !empty($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP']
            : !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR']
            : !empty($_SERVER['HTTP_X_FORWARDED']) ? $_SERVER['HTTP_X_FORWARDED']
            : !empty($_SERVER['HTTP_FORWARDED_FOR']) ? $_SERVER['HTTP_FORWARDED_FOR']
            : !empty($_SERVER['HTTP_FORWARDED']) ? $_SERVER['HTTP_FORWARDED']
            : !empty($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR']
            : 'UNKNOWN';
    }

    private function parseUrl($url)
    {
        $base = parse_url(Route::getPublicUrl());
        $base['path'] = isset($base['path']) ? $base['path'] : '';

        $url = parse_url($url);

        $path = array_filter(explode('/', str_replace($base['path'], '', $url['path'])));

        $url['controller'] = $this->parseController(array_shift($path));
        $url['method'] = $this->parseMethod(array_shift($path));
        $url['arguments'] = $path;
        $url['query'] = isset($url['query']) ? $url['query'] : '';

        parse_str($url['query'], $url['query']);

        return $url;
    }

    private function parseController($controller)
    {
        return ucfirst(camelCase($controller ?: 'index'));
    }

    private function parseMethod($method)
    {
        return camelCase($method ?: 'index').'Controller';
    }
}
