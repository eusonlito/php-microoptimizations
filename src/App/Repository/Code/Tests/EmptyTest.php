<?php
namespace App\Repository\Code\Tests;

class EmptyTest extends TestInterface
{
    public function getDescription()
    {
        return 'Check if element exists into array with empty';
    }

    public function run($loop)
    {
        $values = array_flip($this->getRange($loop));

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            empty($values[$i]);
        }

        return $this->end();
    }
}
