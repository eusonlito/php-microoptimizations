<?php
namespace App\Repository\Code\Tests;

class UnserializeArrayTest extends TestInterface
{
    public function getDescription()
    {
        return 'Decode a string as array using unserialize';
    }

    public function run($loop)
    {
        $encoded = serialize($this->getRangeStrings(100));

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = unserialize($encoded);
        }

        return $this->end();
    }
}
