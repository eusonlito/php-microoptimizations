<?php
namespace App\Repository\Code\Tests;

class AssignSingleQuoteConcatCodeTest extends TestInterface
{
    public function getDescription()
    {
        return 'Assign message to variable with single quotes and code concatenated with quotes';
    }

    public function run($loop)
    {
        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = 'Lorem '.$i.' ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada, nisl sit amet congue blandit';
        }

        return $this->end();
    }
}
