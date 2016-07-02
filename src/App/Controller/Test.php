<?php
namespace App\Controller;

use App\Repository\Code;

class Test extends Controller
{
    public function detail($code)
    {
        try {
            $test = Code\Test::get($code);
        } catch (Exception $e) {
            return;
        }

        return self::page('body', 'test.detail', array(
            'test' => $test
        ));
    }
}
