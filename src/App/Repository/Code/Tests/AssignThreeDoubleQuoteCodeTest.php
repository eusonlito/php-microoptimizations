<?php
namespace App\Repository\Code\Tests;

class AssignThreeDoubleQuoteCodeTest extends TestInterface
{
    public function getDescription()
    {
        return 'Assign message to variable with double quotes and code with three variables into quotes';
    }

    public function run($loop)
    {
        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = "Lorem $i ipsum $i dolor $i amet";
        }

        return $this->end();
    }
}
