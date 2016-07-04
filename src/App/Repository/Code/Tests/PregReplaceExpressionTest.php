<?php
namespace App\Repository\Code\Tests;

class PregReplaceExpressionTest extends TestInterface
{
    public function getDescription()
    {
        return 'Replace a text with preg_replace and a regular expression';
    }

    public function run($loop)
    {
        $text = $this->getTextLarge();

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = preg_replace('/([Lorem]+) ([ipsum]+)/', '$1 $2', $text);
        }

        return $this->end();
    }
}
