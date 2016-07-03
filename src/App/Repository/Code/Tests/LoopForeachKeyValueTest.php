<?php
namespace App\Repository\Code\Tests;

class LoopForeachKeyValueTest extends TestInterface
{
    public function getDescription()
    {
        return 'Create loop with foreach (key and value)';
    }

    public function run($loop)
    {
        $values = $this->getRangeStrings($loop);

        $this->start($loop);

        foreach ($values as $key => $value);

        return $this->end();
    }
}
