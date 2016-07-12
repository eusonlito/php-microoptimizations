<?php
namespace App\Repository\Code\Tests;

class JsonDecodeArrayTest extends TestInterface
{
    public function getDescription()
    {
        return 'Decode a string as array using json_decode';
    }

    public function run($loop)
    {
        $encoded = json_encode($this->getRangeStrings(100));

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = json_decode($encoded);
        }

        return $this->end();
    }
}
