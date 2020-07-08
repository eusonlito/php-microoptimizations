<?php
namespace App\Repository\Code\Tests;

class CompactTest extends TestInterface
{
    public function getDescription()
    {
        return 'Generate an associative array with compact';
    }

    public function run($loop)
    {
        $this->start($loop);

        $one = uniqid();
        $two = uniqid();
        $three = uniqid();
        $four = uniqid();

        for ($i = 0; $i < $this->loop; ++$i) {
            $data = compact('one', 'two', 'three', 'four');
        }

        return $this->end();
    }
}
