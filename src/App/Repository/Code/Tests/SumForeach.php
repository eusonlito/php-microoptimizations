<?php
namespace App\Repository\Code\Tests;

class SumForeach extends TestInterface
{
    public function getDescription()
    {
        return 'Create loop with foreach (key/value) and sum value';
    }

    public function run($loop)
    {
        $values = $this->getRange($loop);

        $this->start($loop);

        foreach ($values as $key => $value) {
            $values[$key]++;
        }

        return $this->end();
    }
}
