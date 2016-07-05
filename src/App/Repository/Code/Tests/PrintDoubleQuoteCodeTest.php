<?php
namespace App\Repository\Code\Tests;

class PrintDoubleQuoteCodeTest extends TestInterface
{
    public function getDescription()
    {
        return 'Print message with double quotes and code into quotes';
    }

    public function run($loop)
    {
        $this->start($loop);

        ob_start();

        for ($i = 0; $i < $this->loop; ++$i) {
            print "Lorem $i ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada, nisl sit amet congue blandit";
        }

        ob_end_clean();

        return $this->end();
    }
}
