<?php
namespace App\Repository\Code\Tests;

class SerializeArrayTest extends TestInterface
{
    public function getDescription()
    {
        return 'Encode an array as string using serialize';
    }

    public function run($loop)
    {
        $values = $this->getRangeStrings(100);

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = serialize($values);
        }

        return $this->end();
    }
}
