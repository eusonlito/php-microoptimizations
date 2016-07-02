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
        $this->start($loop);

        array_unique(range(range(1, $this->loop, 3), range(1, $this->loop, 2)));

        return $this->end();
    }
}
