<?php
namespace App\Repository\Code\Tests;

class ClassVarMagicGetTest extends TestInterface
{
    private $undefined = array('value' => true);

    public function getDescription()
    {
        return 'Call a non existing class variable and catch it with magic method __get';
    }

    public function run($loop)
    {
        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = $this->value;
        }

        return $this->end();
    }

    public function __get($name)
    {
        return $this->undefined[$name];
    }
}
