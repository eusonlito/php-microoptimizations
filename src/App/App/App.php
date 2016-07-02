<?php
namespace App\App;

use App\Exception;
use App\Router\Router;

class App
{
    public $router;

    public function router($route)
    {
        $this->router = new Router($route);

        return $this;
    }

    public function middleware()
    {
        foreach (config('middleware') as $name => $settings) {
            Middleware::run($this, $name, $settings);
        }

        return $this;
    }

    public function controller()
    {
        Controller::run($this);

        return $this;
    }

    public function show($layout)
    {
        template()->show($layout);

        return $this;
    }
}
