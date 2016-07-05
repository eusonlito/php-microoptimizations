<?php
namespace App\Controller;

use App\Database\Model;

class Index extends Controller
{
    public function indexController()
    {
        return $this->page('body', 'index.index', array(
            'top' => Model\StatCompare::topPairs(10)
        ));
    }

    public function aboutController()
    {
        return $this->page('body', 'index.about');
    }
}
