<?php
namespace App\Repository\Code\Tests;

class IssetMultipleTest extends TestInterface
{
    public function getDescription()
    {
        return 'Check if multiple elements exists into array with isset';
    }

    public function run($loop)
    {
        $values = array_flip($this->getRange($loop));

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = isset($values[$i], $values[$i - 1], $values[$i + 1]);
        }

        return $this->end();
    }
}
