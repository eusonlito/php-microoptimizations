<?php
namespace App\Repository\Code\Tests;

class LoopForeachValueTest extends TestInterface
{
    public function getDescription()
    {
        return 'Create loop with foreach (only value)';
    }

    public function run($loop)
    {
        $values = $this->getRangeStrings($loop);

        $this->start($loop);

        foreach ($values as $value);

        return $this->end();
    }
}
