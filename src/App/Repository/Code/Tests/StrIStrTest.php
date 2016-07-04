<?php
namespace App\Repository\Code\Tests;

class StrIStrTest extends TestInterface
{
    public function getDescription()
    {
        return 'Find a string into a text using stristr (case insensitive)';
    }

    public function run($loop)
    {
        $text = $this->getTextLarge();

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = stristr($text, 'lorem ipsum');
        }

        return $this->end();
    }
}
