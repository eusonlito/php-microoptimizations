<?php
namespace App\Repository\Code\Tests;

class StrtrTest extends TestInterface
{
    public function getDescription()
    {
        return 'Replace a text with strtr';
    }

    public function run($loop)
    {
        $text = $this->getTextLarge();

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = strtr($text, array('Lorem ipsum' => 'Ipsum lorem'));
        }

        return $this->end();
    }
}
