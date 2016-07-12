<?php
namespace App\Repository\Code\Tests;

class JsonEncodeArrayTest extends TestInterface
{
    public function getDescription()
    {
        return 'Encode an array as string using json_encode';
    }

    public function run($loop)
    {
        $values = $this->getRangeStrings(100);

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = json_encode($values);
        }

        return $this->end();
    }
}
