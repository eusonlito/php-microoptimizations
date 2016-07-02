<?php
namespace App\Processor;

use App\Router\Router;

abstract class Processor
{
    protected function check()
    {
        return ($_SERVER['REQUEST_METHOD'] === 'POST');
    }
}
