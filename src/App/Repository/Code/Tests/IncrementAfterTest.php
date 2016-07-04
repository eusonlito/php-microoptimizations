<?php
namespace App\Repository\Code\Tests;

class IncrementAfterTest extends TestInterface
{
    public function getDescription()
    {
        return 'Increment after var ($i++)';
    }

    public function run($loop)
    {
        $this->start($loop);

        $value = 0;

        for ($i = 0; $i < $this->loop; ++$i) {
            $value++;
        }

        return $this->end();
    }
}
