<?php
namespace App\Repository\Code\Tests;

class ArrayUniqueTest extends TestInterface
{
    public function getDescription()
    {
        return 'Create an array without duplicates from a range using array_unique';
    }

    public function run($loop)
    {
        $values = $this->getRangeStrings($loop);

        $this->start($loop);

        $values = array_unique($values);

        return $this->end();
    }
}
