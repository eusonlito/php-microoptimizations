<?php
namespace App\Repository\Code\Tests;

class SprintfThreeTest extends TestInterface
{
    public function getDescription()
    {
        return 'Assign message to variable with three parameters using sprintf';
    }

    public function run($loop)
    {
        $this->start($loop);

        ob_start();

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = sprintf('Lorem %s ipsum %s dolor %s amet', $i, $i, $i);
        }

        ob_end_clean();

        return $this->end();
    }
}
