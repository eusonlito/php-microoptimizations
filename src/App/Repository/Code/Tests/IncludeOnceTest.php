<?php
namespace App\Repository\Code\Tests;

class IncludeOnceTest extends TestInterface
{
    public function getDescription()
    {
        return 'Include file with include_once';
    }

    public function run($loop)
    {
        $file = $this->getTempFile();

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            include_once $file;

            clearstatcache();
        }

        unlink($file);

        return $this->end();
    }
}
