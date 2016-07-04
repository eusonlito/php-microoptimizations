<?php
namespace App\Repository\Code\Tests;

class ClassCallStaticTest extends TestInterface
{
    private static $value = null;

    public function getDescription()
    {
        return 'Call a static class method using static';
    }

    public function run($loop)
    {
        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = static::demo();
        }

        return $this->end();
    }

    private static function demo()
    {
        return static::$value;
    }
}
