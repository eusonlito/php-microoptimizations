<?php
namespace App\Repository\Code\Tests;

class PregSplitLargeTest extends TestInterface
{
    public function getDescription()
    {
        return 'Split a large string with preg_split and get the first element';
    }

    public function run($loop)
    {
        $text = $this->getTextLarge();

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = preg_split('/\s/', $text);
            $value = $value[0];
        }

        return $this->end();
    }
}
