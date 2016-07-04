<?php
namespace App\Repository\Code\Tests;

class StrIReplaceTest extends TestInterface
{
    public function getDescription()
    {
        return 'Replace a text with str_ireplace (case insensitive)';
    }

    public function run($loop)
    {
        $text = $this->getTextLarge();

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = str_ireplace('lorem ipsum', 'Ipsum Lorem', $text);
        }

        return $this->end();
    }
}
