<?php
namespace App\Repository\Code\Tests;

class JsonEncodeObjectTest extends TestInterface
{
    public function getDescription()
    {
        return 'Encode an object as string using json_encode';
    }

    public function run($loop)
    {
        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = json_encode($this);
        }

        return $this->end();
    }
}
