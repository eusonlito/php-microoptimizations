<?php
namespace App\Repository\Code\Tests;

class FillArrayPushTest extends TestInterface
{
    public function getDescription()
    {
        return 'Fill an array with array_push';
    }

    public function run($loop)
    {
        $this->start($loop);

        $values = array();

        for ($i = 0; $i < $this->loop; $i++) {
            array_push($values, $i);
        }

        return $this->end();
    }
}
