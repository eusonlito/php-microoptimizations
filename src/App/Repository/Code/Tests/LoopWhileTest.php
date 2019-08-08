<?php
namespace App\Repository\Code\Tests;

class LoopWhileTest extends TestInterface
{
    public function getDescription()
    {
        return 'Create loop with while';
    }

    public function run($loop)
    {
        $values = $this->getRange($loop);

        $this->start($loop);

        while ($key = key($values)) {
            $values[$key]++;

            next($values);
        }

        return $this->end();
    }
}
