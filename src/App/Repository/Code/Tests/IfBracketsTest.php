<?php
namespace App\Repository\Code\Tests;

class IfBracketsTest extends TestInterface
{
    public function getDescription()
    {
        return 'Create a if with brackets';
    }

    public function run($loop)
    {
        $this->start($loop);

        $value = 0;

        for ($i = 0; $i < $this->loop; ++$i) {
            if ($value === $i) {
                $value = $i;
            }
        }

        return $this->end();
    }
}
