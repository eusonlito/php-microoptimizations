<?php
namespace App\Controller;

use App\Database\Model;

class Index extends Controller
{
    public function indexController()
    {
        return $this->page('body', 'index.index');
    }

    public function aboutController()
    {
        return $this->page('body', 'index.about');
    }
}
