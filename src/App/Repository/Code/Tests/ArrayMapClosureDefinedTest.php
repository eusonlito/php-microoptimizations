<?php
namespace App\Repository\Code\Tests;

class ArrayMapClosureDefinedTest extends TestInterface
{
    public function getDescription()
    {
        return 'Update array values using array_map and previous defined closure function';
    }

    public function run($loop)
    {
        $values = $this->getRange($loop);

        $closure = function($value) {
            return $value + 1;
        };

        $this->start($loop);

        $values = array_map($closure, $values);

        return $this->end();
    }
}
