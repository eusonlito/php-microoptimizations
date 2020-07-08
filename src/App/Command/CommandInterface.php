<?php
namespace App\Command;

use Exception;
use App\Database\Model\Test;

abstract class CommandInterface
{
    public function info($title, $message = null)
    {
        echo "\n".'['.date('Y-m-d H:i:s').'] '.$title;

        if ($message) {
            echo "\n"; print_r($message);
        }
    }

    protected function getTest($name)
    {
        if (is_object($name)) {
            return $name;
        }

        if ($test = Test::byName($name)) {
            return $test;
        }

        throw new Exception(sprintf('Tests %s not exists', $name));
    }
}
