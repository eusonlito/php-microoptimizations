<?php
namespace App\Repository\Code\Tests;

class SprintfTest extends TestInterface
{
    public function getDescription()
    {
        return 'Assign message to variable with one parameter using sprintf';
    }

    public function run($loop)
    {
        $this->start($loop);

        ob_start();

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = sprintf('Lorem %s ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada, nisl sit amet congue blandit', $i);
        }

        ob_end_clean();

        return $this->end();
    }
}
