<?php
namespace App\App;

use App\Middleware;

class Command
{
    public function __construct()
    {
        $cli = new Middleware\Cli;
        $cli->handler();
    }

    public function execute($command, $arguments = array())
    {
        if (empty($command)) {
            dd('Command not valid');
        }

        $class = Check::getClass('App\\Command', ucfirst(camelCase(basename($command))));
        $class = new $class;

        return call_user_func_array(array($class, 'run'), $arguments);
    }
}
