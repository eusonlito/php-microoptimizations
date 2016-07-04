<?php
namespace App\Repository\Code\Tests;

class FillArrayMergeTest extends TestInterface
{
    protected $loopLimit = 10000;

    public function getDescription()
    {
        return 'Fill an array with array_merge';
    }

    public function run($loop)
    {
        $this->start($loop);

        $values = array();

        for ($i = 0; $i < $this->loop; $i++) {
            $values = array_merge($values, array($i));
        }

        return $this->end();
    }
}
