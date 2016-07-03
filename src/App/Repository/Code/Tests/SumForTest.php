<?php
namespace App\Repository\Code\Tests;

class SumForTest extends TestInterface
{
    public function getDescription()
    {
        return 'Create loop with for and sum value';
    }

    public function run($loop)
    {
        $values = $this->getRange($loop);

        $this->start($loop);

        $count = count($values);

        for ($i = 0; $i < $count; $i++) {
            $values[$i]++;
        }

        return $this->end();
    }
}
