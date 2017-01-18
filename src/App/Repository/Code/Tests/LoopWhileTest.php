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

        while (list($key) = each($values)) {
            $values[$key]++;
        }

        return $this->end();
    }
}
