<?php
namespace App\Repository\Code\Tests;

class ExplodeLargeTest extends TestInterface
{
    public function getDescription()
    {
        return 'Split a large string with explode and get the first element';
    }

    public function run($loop)
    {
        $text = $this->getTextLarge();

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = explode(' ', $text);
            $value = $value[0];
        }

        return $this->end();
    }
}
