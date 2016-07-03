<?php
namespace App\Repository\Code\Tests;

class IncludeTest extends TestInterface
{
    public function getDescription()
    {
        return 'Include file with include';
    }

    public function run($loop)
    {
        $file = $this->getTempFile();

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            clearstatcache();
            include $file;
        }

        unlink($file);

        return $this->end();
    }
}
