<?php
namespace App\Controller;

use App\Repository\Code;
use App\Database\Model;

class Test extends Controller
{
    private function getData($code)
    {
        $test = Model\Test::byName($code);

        if (empty($test)) {
            return;
        }

        return array(
            'test' => $test,
            'results' => Model\Result::byTest($test->id),
            'source' => Code\Test::getObject($test->name)->getSource()
        );
    }

    public function detail($code)
    {
        $data = $this->getData($code);

        if (empty($data)) {
            return $this->error404();
        }

        return $this->page('body', 'test.detail', $data);
    }

    public function compare($code1, $code2)
    {
        $data1 = $this->getData($code1);
        $data2 = $this->getData($code2);

        if (empty($data1) || empty($data2)) {
            return $this->error404();
        }

        return $this->page('body', 'test.compare', array(
            'test1' => $data1,
            'test2' => $data2
        ));
    }
}
