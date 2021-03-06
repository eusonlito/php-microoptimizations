<?php
namespace App\Repository\Code\Tests;

class IssetTest extends TestInterface
{
    public function getDescription()
    {
        return 'Check if element exists into array with isset';
    }

    public function run($loop)
    {
        $values = array_flip($this->getRange($loop));

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = isset($values[$i]);
        }

        return $this->end();
    }
}
