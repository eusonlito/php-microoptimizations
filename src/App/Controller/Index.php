<?php
namespace App\Controller;

use App\Database\DB;
use App\Repository\Code;

class Index extends Controller
{
    public function index()
    {
        return self::page('body', 'index.index', array(
            'tests' => DB::table('test')->select()->orderBy('name ASC')->run()
        ));
    }
}
