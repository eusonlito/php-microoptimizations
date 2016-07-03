<?php
namespace App\Repository\Code\Tests;

class DateStrtotimeTest extends TestInterface
{
    public function getDescription()
    {
        return 'Generate a date from date string with strtotime and date';
    }

    public function run($loop)
    {
        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = date('Y-m-d', strtotime('2016-07-01 23:59:59'));
        }

        return $this->end();
    }
}
