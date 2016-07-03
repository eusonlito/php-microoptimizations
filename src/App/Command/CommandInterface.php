<?php
namespace App\Command;

abstract class CommandInterface
{
    public function info($title, $message = null)
    {
        echo "\n".'['.date('Y-m-d H:i:s').'] '.$title;

        if ($message) {
            echo "\n"; print_r($message);
        }
    }
}
