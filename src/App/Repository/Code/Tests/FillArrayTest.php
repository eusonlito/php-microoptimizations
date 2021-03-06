<?php
namespace App\Repository\Code\Tests;

class FillArrayTest extends TestInterface
{
    public function getDescription()
    {
        return 'Fill an array with for';
    }

    public function run($loop)
    {
        $this->start($loop);

        $values = array();

        for ($i = 0; $i < $this->loop; $i++) {
            $values[] = $i;
        }

        return $this->end();
    }
}
