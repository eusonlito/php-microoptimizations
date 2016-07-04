<?php
namespace App\Repository\Code\Tests;

class StrPosTest extends TestInterface
{
    public function getDescription()
    {
        return 'Find a string into a text using strpos';
    }

    public function run($loop)
    {
        $text = $this->getTextLarge();

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = (strpos($text, 'Lorem ipsum') !== false);
        }

        return $this->end();
    }
}
