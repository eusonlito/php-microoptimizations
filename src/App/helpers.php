<?php
use App\Config\Config;
use App\Input\Input;
use App\Log\Dump;
use App\Router\Route;
use App\Template\Html;
use App\Template\Meta;
use App\Template\Packer;
use App\Template\Template;

function __($text)
{
    if (func_num_args() === 1) {
        return $text;
    }

    $args = array_slice(func_get_args(), 1);

    return vsprintf($text, is_array($args[0]) ? $args[0] : $args);
}

function d($title, $message = null, $trace = null)
{
    Dump::debug($title, $message, $trace);
}

function dd($title, $message = null, $trace = null)
{
    die(d($title, $message, $trace));
}

function camelCase($string)
{
    return preg_replace_callback('/\-(.)/', function ($matches) {
        return strtoupper($matches[1]);
    }, strtolower($string));
}

function template()
{
    return Template::getInstance();
}

function asset($file)
{
    return Route::getPublicUrl('/storage/assets/'.ltrim($file, '/'));
}

function route($path)
{
    return Route::getPublicUrl($path);
}

function input($name = null, $value = null)
{
    return (func_num_args() === 2) ? Input::set($name, $value) : Input::get($name);
}

function meta()
{
    return Meta::getInstance();
}

function packer()
{
    return Packer::getInstance();
}

function config($name = null, $value = null)
{
    return (func_num_args() === 2) ? Config::set($name, $value) : Config::get($name);
}

function redirect($url)
{
    die(header('Location: '.$url));
}
