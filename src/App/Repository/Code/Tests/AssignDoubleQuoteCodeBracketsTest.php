<?php
namespace App\Repository\Code\Tests;

class AssignDoubleQuoteCodeBracketsTest extends TestInterface
{
    public function getDescription()
    {
        return 'Assign message to variable with double quotes and code into quotes with brackets';
    }

    public function run($loop)
    {
        $this->start($loop);

        ob_start();

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = "Lorem {$i} ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada, nisl sit amet congue blandit";
        }

        ob_end_clean();

        return $this->end();
    }
}
