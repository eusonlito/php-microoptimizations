<?php
namespace App\Controller;

use App\Database\Model;
use App\Repository;

class Index extends Controller
{
    public function indexController()
    {
        return $this->page('body', 'index.index', array(
            'top' => Model\StatCompare::topPairs(15),
            'common' => Repository\TestComparison::get()
        ));
    }

    public function aboutController()
    {
        return $this->page('body', 'index.about');
    }
}
