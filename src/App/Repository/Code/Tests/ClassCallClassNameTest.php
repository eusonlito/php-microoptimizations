<?php
namespace App\Repository\Code\Tests;

class ClassCallClassNameTest extends TestInterface
{
    private static $value = null;

    public function getDescription()
    {
        return 'Call a static class method using class name';
    }

    public function run($loop)
    {
        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = ClassCallClassNameTest::demo();
        }

        return $this->end();
    }

    private static function demo()
    {
        return ClassCallClassNameTest::$value;
    }
}
