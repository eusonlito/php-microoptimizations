<?php
namespace App\Repository\Code\Tests;

class EchoSingleQuoteTest extends TestInterface
{
    public function getDescription()
    {
        return 'Echo message with single quotes';
    }

    public function run($loop)
    {
        $this->start($loop);

        ob_start();

        for ($i = 0; $i < $this->loop; ++$i) {
            echo 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada, nisl sit amet congue blandit';
        }

        ob_end_clean();

        return $this->end();
    }
}
