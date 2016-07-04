<?php
namespace App\Repository\Code\Tests;

use stdClass;

class FillObjectTest extends TestInterface
{
    public function getDescription()
    {
        return 'Fill an object with for';
    }

    public function run($loop)
    {
        $this->start($loop);

        $values = new stdClass;

        for ($i = 0; $i < $this->loop; $i++) {
            $values->$i = $i;
        }

        return $this->end();
    }
}
