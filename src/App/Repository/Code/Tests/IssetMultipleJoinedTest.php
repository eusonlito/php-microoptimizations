<?php
namespace App\Repository\Code\Tests;

class IssetMultipleJoinedTest extends TestInterface
{
    public function getDescription()
    {
        return 'Check if multiple elements exists into array with multiple isset';
    }

    public function run($loop)
    {
        $values = array_flip($this->getRange($loop));

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = isset($values[$i]) && isset($values[$i - 1]) && isset($values[$i + 1]);
        }

        return $this->end();
    }
}
