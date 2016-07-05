<?php
namespace App\Repository\Code\Tests;

class ArrayMapClosureTest extends TestInterface
{
    public function getDescription()
    {
        return 'Update array values using array_map and closure function';
    }

    public function run($loop)
    {
        $values = $this->getRange($loop);

        $this->start($loop);

        $values = array_map(function($value) {
            return $value + 1;
        }, $values);

        return $this->end();
    }
}
