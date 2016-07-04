<?php
namespace App\Repository\Code\Tests;

class SwitchTest extends TestInterface
{
    public function getDescription()
    {
        return 'Create a switch with multiple case conditions';
    }

    public function run($loop)
    {
        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            switch ($i) {
                case 'a':
                    $value = 'a';
                    break;

                case 'b':
                    $value = 'b';
                    break;

                case 3:
                    $value = 3;
                    break;

                default:
                    $value = $i;
                    break;
            }
        }

        return $this->end();
    }
}
