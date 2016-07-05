<?php
namespace App\Repository\Code\Tests;

class ClassCallMagicTest extends TestInterface
{
    private $value = null;

    public function getDescription()
    {
        return 'Call a non existing class method and catch it with magic method __call';
    }

    public function run($loop)
    {
        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = $this->demo();
        }

        return $this->end();
    }

    public function __call($name , $arguments)
    {
        return $this->value;
    }
}
