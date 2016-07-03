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
        $loop = $this->getLoop($loop);

        $this->start($loop);

        $values = new SplFixedArray($loop);

        for ($i = 0; $i < $loop; $i++) {
            $values[$i] = $i;
        }

        return $this->end();
    }
}
