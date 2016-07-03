<?php
namespace App\Repository\Code\Tests;

class LoopForTest extends TestInterface
{
    public function getDescription()
    {
        return 'Create loop with for';
    }

    public function run($loop)
    {
        $values = $this->getRangeStrings($loop);

        $this->start($loop);

        $count = count($values);

        for ($key = 0; $key < $count; $key++) {
            $value = $values[$key];
        }

        return $this->end();
    }
}
