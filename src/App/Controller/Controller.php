<?php
namespace App\Controller;

use App\Router\Router;
use App\Database\Model;

abstract class Controller
{
    public function __construct(Router $router)
    {
        meta()->set('title', 'PHP benchmarks and optimizations');

        template()->share(array(
            'ROUTE' => $router->getRoute(),
            'TESTS' => Model\Test::all()
        ));
    }

    public function getClass($name)
    {
        return new $name;
    }

    protected function page($name, $file, array $parameters = array())
    {
        return $this->template($name, 'pages.'.$file, $parameters);
    }

    protected function content($file, array $parameters = array())
    {
        $this->page('body', explode('.', $file)[0].'.layout');

        return $this->page('content', $file, $parameters);
    }

    protected function template($name, $file, array $parameters = array())
    {
        return template()->set($name, $file, $parameters);
    }

    protected function error404()
    {
        return $this->page('body', 'error.404', array(
            'title' => '404 - Not Found',
            'message' => 'Our site is currently unable to handle this request'
        ));
    }
}
