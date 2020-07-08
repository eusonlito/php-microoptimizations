<?php
namespace App\Repository\Code\Tests;

class ArrayAssociativeTest extends TestInterface
{
    public function getDescription()
    {
        return 'Generate an associative array from variables';
    }

    public function run($loop)
    {
        $this->start($loop);

        $one = uniqid();
        $two = uniqid();
        $three = uniqid();
        $four = uniqid();

        for ($i = 0; $i < $this->loop; ++$i) {
            $data = array(
                'one' => $one,
                'two' => $two,
                'three' => $three,
                'four' => $four
            );
        }

        return $this->end();
    }
}
