<?php
namespace App\Repository\Code\Tests;

class SumForeachReference extends TestInterface
{
    public function getDescription()
    {
        return 'Create loop with foreach and value as reference and sum value';
    }

    public function run($loop)
    {
        $values = $this->getRange($loop);

        $this->start($loop);

        foreach ($values as &$value) {
            $value++;
        }

        return $this->end();
    }
}
