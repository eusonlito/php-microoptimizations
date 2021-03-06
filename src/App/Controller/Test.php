<?php
namespace App\Controller;

use App\Repository\Code;
use App\Database\Model;
use App\Router\Bot;

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
            'results' => Model\Helper\Result::versionSort(Model\ResultAverage::byTest($test->id)),
            'source' => Code\Test::getObject($test->name)->getSource()
        );
    }

    public function detailController($code)
    {
        $data = $this->getData($code);

        if (empty($data)) {
            return $this->error404();
        }

        meta()->set('title', $data['test']->name.' - '.meta()->get('title'));

        if (!Bot::isBot()) {
            Model\Test::addVisit($data['test']->id);
        }

        return $this->page('body', 'test.detail', $data);
    }

    public function compareController($code1, $code2)
    {
        $data1 = $this->getData($code1);
        $data2 = $this->getData($code2);

        if (empty($data1) || empty($data2)) {
            return $this->error404();
        }

        meta()->set('title', $data1['test']->name.' vs '.$data2['test']->name.' - '.meta()->get('title'));

        list($data1['results'], $data2['results']) = Model\Helper\Result::compare($data1['results'], $data2['results']);

        if (!Bot::isBot()) {
            Model\StatCompare::addVisit($data1['test']->id, $data2['test']->id);
        }

        return $this->page('body', 'test.compare', array(
            'test1' => $data1,
            'test2' => $data2
        ));
    }
}
