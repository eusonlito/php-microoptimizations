<?php
namespace App\Repository\Code\Tests;

class EchoDoubleQuoteTest extends TestInterface
{
    public function getDescription()
    {
        return 'Echo message with double quotes';
    }

    public function run($loop)
    {
        $this->start($loop);

        ob_start();

        for ($i = 0; $i < $this->loop; ++$i) {
            echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada, nisl sit amet congue blandit";
        }

        ob_end_clean();

        return $this->end();
    }
}
