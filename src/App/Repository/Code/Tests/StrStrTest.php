<?php
namespace App\Repository\Code\Tests;

class StrStrTest extends TestInterface
{
    public function getDescription()
    {
        return 'Find a string into a text using strstr';
    }

    public function run($loop)
    {
        $text = $this->getTextLarge();

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = strstr($text, 'Lorem ipsum');
        }

        return $this->end();
    }
}
