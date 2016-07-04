<?php
namespace App\Repository\Code\Tests;

use stdClass;

class IncrementObjectTest extends TestInterface
{
    public function getDescription()
    {
        return 'Increment an object variable';
    }

    public function run($loop)
    {
        $this->start($loop);

        $object = new stdClass;
        $object->counter = 0;

        for ($i = 0; $i < $this->loop; ++$i) {
            $object->counter++;
        }

        return $this->end();
    }
}
