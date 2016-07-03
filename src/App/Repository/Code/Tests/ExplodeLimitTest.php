<?php
namespace App\Repository\Code\Tests;

class ExplodeLimitTest extends TestInterface
{
    public function getDescription()
    {
        return 'Split a string with explode (limit) and get the first element';
    }

    public function run($loop)
    {
        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = explode(' ', '2016-07-01 23:59:59', 2);
            $value = $value[0];
        }

        return $this->end();
    }
}
