<?php
namespace App\Repository\Code\Tests;

class SumForeachArrayKeysTest extends TestInterface
{
    public function getDescription()
    {
        return 'Create loop with foreach array_keys and sum value';
    }

    public function run($loop)
    {
        $values = $this->getRange($loop);

        $this->start($loop);

        foreach (array_keys($values) as $key) {
            $values[$key]++;
        }

        return $this->end();
    }
}
