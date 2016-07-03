<?php
namespace App\Command;

use App\Database\Model;
use App\Repository\Code;

class TestsLoad extends CommandInterface
{
    private $loops = array(10000, 100000);

    public function run()
    {
        $current = array();

        foreach (Model\Test::all() as $test) {
            $current[$test->name] = $test;
        }

        foreach (Code\Test::getAllObjects() as $test) {
            if (isset($current[$test->getName()])) {
                $this->update($current[$test->getName()], $test);
            } else {
                $this->insert($test);
            }
        }
    }

    private function insert($new)
    {
        Model\Test::insert(array(
            'name' => $new->getName(),
            'description' => $new->getDescription()
        ));
    }

    private function update($current, $new)
    {
        Model\Test::update(array(
            'id' => $current->id,
            'name' => $new->getName(),
            'description' => $new->getDescription()
        ));
    }
}
