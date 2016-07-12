<?php
namespace App\Repository\Code\Tests;

class SerializeObjectTest extends TestInterface
{
    public function getDescription()
    {
        return 'Encode an object as string using serialize';
    }

    public function run($loop)
    {
        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = serialize($this);
        }

        return $this->end();
    }
}
