<?php
namespace App\Repository\Code\Tests;

class ClassCallSelfTest extends TestInterface
{
    private static $value = null;

    public function getDescription()
    {
        return 'Call a static class method using self';
    }

    public function run($loop)
    {
        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = self::demo();
        }

        return $this->end();
    }

    private static function demo()
    {
        return self::$value;
    }
}
