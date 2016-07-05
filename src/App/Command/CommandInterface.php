<?php
namespace App\Command;

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

    protected function getTest($test)
    {
        return is_object($test) ? $test : Test::byName($test);
    }
}
