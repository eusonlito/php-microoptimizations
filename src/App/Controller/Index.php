<?php
namespace App\Controller;

use App\Database\Model;

class Index extends Controller
{
    public function index()
    {
        return $this->page('body', 'index.index');
    }
}
