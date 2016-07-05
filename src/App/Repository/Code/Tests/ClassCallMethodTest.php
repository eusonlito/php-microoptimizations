<?php
namespace App\Repository\Code\Tests;

class ClassCallMethodTest extends TestInterface
{
    private $value = null;

    public function getDescription()
    {
        return 'Call a regular class method using this';
    }

    public function run($loop)
    {
        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = $this->demo();
        }

        return $this->end();
    }

    private function demo()
    {
        return $this->value;
    }
}
