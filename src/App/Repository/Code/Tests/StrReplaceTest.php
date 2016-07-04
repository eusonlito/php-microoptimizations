<?php
namespace App\Repository\Code\Tests;

class StrReplaceTest extends TestInterface
{
    public function getDescription()
    {
        return 'Replace a text with str_replace';
    }

    public function run($loop)
    {
        $text = $this->getTextLarge();

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = str_replace('Lorem ipsum', 'Ipsum lorem', $text);
        }

        return $this->end();
    }
}
