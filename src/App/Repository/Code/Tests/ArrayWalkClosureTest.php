<?php
namespace App\Repository\Code\Tests;

class ArrayWalkClosureTest extends TestInterface
{
    public function getDescription()
    {
        return 'Update array values using array_walk and closure function';
    }

    public function run($loop)
    {
        $values = $this->getRange($loop);

        $this->start($loop);

        array_walk($values, function(&$value) {
            $value++;
        });

        return $this->end();
    }
}
