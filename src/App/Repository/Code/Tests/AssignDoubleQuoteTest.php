<?php
namespace App\Repository\Code\Tests;

class AssignDoubleQuoteTest extends TestInterface
{
    public function getDescription()
    {
        return 'Assign message to variable with double quotes';
    }

    public function run($loop)
    {
        $this->start($loop);

        ob_start();

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada, nisl sit amet congue blandit";
        }

        ob_end_clean();

        return $this->end();
    }
}
