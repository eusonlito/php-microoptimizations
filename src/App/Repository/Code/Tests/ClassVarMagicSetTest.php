<?php
namespace App\Repository\Code\Tests;

class ClassVarMagicSetTest extends TestInterface
{
    private $undefined = array();

    public function getDescription()
    {
        return 'Set a non existing class variable and catch it with magic method __set';
    }

    public function run($loop)
    {
        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $this->value = $i;
        }

        return $this->end();
    }

    public function __set($name, $value)
    {
        $this->undefined[$name] = $value;
    }
}
