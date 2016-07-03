<?php
namespace App\Repository\Code\Tests;

class NotEmptyTest extends TestInterface
{
    public function getDescription()
    {
        return 'Check if element not exists into array with empty';
    }

    public function run($loop)
    {
        $values = array_flip($this->getRangeStrings($loop));

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            !empty($values[$i]);
        }

        return $this->end();
    }
}
