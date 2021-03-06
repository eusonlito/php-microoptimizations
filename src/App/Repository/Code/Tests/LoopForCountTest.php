<?php
namespace App\Repository\Code\Tests;

class LoopForCountTest extends TestInterface
{
    public function getDescription()
    {
        return 'Create loop with for and count values in each iteration';
    }

    public function run($loop)
    {
        $values = $this->getRange($loop);

        $this->start($loop);

        for ($i = 0; $i < count($values); $i++) {
            $values[$i]++;
        }

        return $this->end();
    }
}
