<?php
namespace App\Middleware;

use App\Router\Route;

class HtmlCache
{
    public function handler($app)
    {
        if (input('cache') === 'false') {
            return;
        }

        $route = str_replace(Route::getPublicUrlPath(), '', $app->router->getUrl());

        if (!preg_match('#^[a-zA-Z/]+$#', $route)) {
            return;
        }

        $file = Route::getStoragePath('/cache/html'.$route);

        if (is_file($file)) {
            die(file_get_contents($file));
        }
    }
}
