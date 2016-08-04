<?php
namespace App\Repository\Code\Tests;

class AssignThreeSingleQuoteConcatCodeTest extends TestInterface
{
    public function getDescription()
    {
        return 'Assign message to variable with single quotes and code concatenated with three variables';
    }

    public function run($loop)
    {
        $this->start($loop);

        ob_start();

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = 'Lorem '.$i.' ipsum '.$i.' dolor '.$i.' amet';
        }

        ob_end_clean();

        return $this->end();
    }
}
