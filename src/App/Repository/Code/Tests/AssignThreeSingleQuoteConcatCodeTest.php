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

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = 'Lorem '.$i.' ipsum '.$i.' dolor '.$i.' amet';
        }

        return $this->end();
    }
}
