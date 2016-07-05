<?php
namespace App\Repository\Code\Tests;

class StrReplaceMultipleTest extends TestInterface
{
    public function getDescription()
    {
        return 'Replace multiples strings in a text with str_replace';
    }

    public function run($loop)
    {
        $text = $this->getTextLarge();

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = str_replace(array("\n", " "), ', ', $text);
        }

        return $this->end();
    }
}
