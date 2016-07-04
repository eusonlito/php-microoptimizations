<?php
namespace App\Repository\Code\Tests;

class IfJoinedTest extends TestInterface
{
    public function getDescription()
    {
        return 'Create a joined if';
    }

    public function run($loop)
    {
        $this->start($loop);

        $value1 = true;
        $value2 = false;

        for ($i = 0; $i < $this->loop; ++$i) {
            if (($value1 === true) && ($value2 === true)) {
                $value = $i;
            }
        }

        return $this->end();
    }
}
