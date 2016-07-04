<?php
namespace App\Repository\Code\Tests;

use stdClass;

class IncrementLocalToObjectTest extends TestInterface
{
    public function getDescription()
    {
        return 'Increment a local variable and asing value to object at end';
    }

    public function run($loop)
    {
        $this->start($loop);

        $counter = 0;

        for ($i = 0; $i < $this->loop; ++$i) {
            $counter++;
        }

        $object = new stdClass;
        $object->counter = $counter;

        return $this->end();
    }
}
