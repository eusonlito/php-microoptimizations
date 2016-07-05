<?php
namespace App\Repository\Code\Tests;

class ArrayWalkClosureDefinedTest extends TestInterface
{
    public function getDescription()
    {
        return 'Update array values using array_walk and previous defined closure function';
    }

    public function run($loop)
    {
        $values = $this->getRange($loop);

        $closure = function(&$value) {
            $value++;
        };

        $this->start($loop);

        array_walk($values, $closure);

        return $this->end();
    }
}
