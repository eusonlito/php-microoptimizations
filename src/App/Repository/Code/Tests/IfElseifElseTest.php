<?php
namespace App\Repository\Code\Tests;

class IfElseifElseTest extends TestInterface
{
    public function getDescription()
    {
        return 'Create a multiple if/elseif/else conditions';
    }

    public function run($loop)
    {
        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            if ($i === 'a') {
                $value = 'a';
            } elseif ($i === 'b') {
                $value = 'b';
            } elseif ($i === 3) {
                $value = 3;
            } else {
                $value = $i;
            }
        }

        return $this->end();
    }
}
