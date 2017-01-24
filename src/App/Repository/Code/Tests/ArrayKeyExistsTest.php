<?php
namespace App\Repository\Code\Tests;

class ArrayKeyExistsTest extends TestInterface
{
    public function getDescription()
    {
        return 'Check if element exists into array with array_key_exists';
    }

    public function run($loop)
    {
        $values = array_flip($this->getRange($loop));

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = array_key_exists($i, $values);
        }

        return $this->end();
    }
}
