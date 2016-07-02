<?php
namespace App\Repository\Code\Tests;

class NotIssetTest extends TestInterface
{
    public function getDescription()
    {
        return 'Check if element not exists into array with isset';
    }

    public function run($loop)
    {
        $values = array_flip(range(1, $this->getLoop($loop), 3));

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            !isset($values[$i]);
        }

        return $this->end();
    }
}
