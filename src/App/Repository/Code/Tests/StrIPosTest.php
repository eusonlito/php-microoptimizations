<?php
namespace App\Repository\Code\Tests;

class StrIPosTest extends TestInterface
{
    public function getDescription()
    {
        return 'Find a string into a text using stripos (case insensitive)';
    }

    public function run($loop)
    {
        $text = $this->getTextLarge();

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = (stripos($text, 'lorem ipsum') !== false);
        }

        return $this->end();
    }
}
