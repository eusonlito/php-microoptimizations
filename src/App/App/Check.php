<?php
namespace App\App;

use App\Exception;

class Check
{
    public static function getClass($namespace, $name)
    {
        $class = $namespace.'\\'.$name;

        if (!class_exists($class)) {
            throw new Exception\NotFoundException(__('Class "%s" not exists', $class));
        }

        return $class;
    }

    public static function getMethod($class, $method)
    {
        if (!method_exists($class, $method)) {
            throw new Exception\NotFoundException(__('Method "%s" in Class "%s" not exists', $method, get_class($class)));
        }

        return $method;
    }
}
