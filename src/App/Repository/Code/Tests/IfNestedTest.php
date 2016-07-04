<?php
namespace App\Repository\Code\Tests;

class IfNestedTest extends TestInterface
{
    public function getDescription()
    {
        return 'Create a double if (nested)';
    }

    public function run($loop)
    {
        $this->start($loop);

        $value1 = true;
        $value2 = false;

        for ($i = 0; $i < $this->loop; ++$i) {
            if ($value1 === true) {
                if ($value2 === true) {
                    $value = $i;
                }
            }
        }

        return $this->end();
    }
}
