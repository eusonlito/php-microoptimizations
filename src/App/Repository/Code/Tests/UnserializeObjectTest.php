<?php
namespace App\Repository\Code\Tests;

class UnserializeObjectTest extends TestInterface
{
    public function getDescription()
    {
        return 'Decode a string as object using unserialize';
    }

    public function run($loop)
    {
        $encoded = serialize($this);

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = unserialize($encoded);
        }

        return $this->end();
    }
}
