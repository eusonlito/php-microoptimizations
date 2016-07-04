<?php
namespace App\Repository\Code\Tests;

use SplFixedArray;

class FillArrayFixedTest extends TestInterface
{
    public function getDescription()
    {
        return 'Fill an fixed array with for';
    }

    public function run($loop)
    {
        $this->start($loop);

        $values = new SplFixedArray($this->loop);

        for ($i = 0; $i < $this->loop; $i++) {
            $values[$i] = $i;
        }

        return $this->end();
    }
}
