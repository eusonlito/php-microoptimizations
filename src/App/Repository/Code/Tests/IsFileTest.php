<?php
namespace App\Repository\Code\Tests;

class IsFileTest extends TestInterface
{
    public function getDescription()
    {
        return 'Check if file (existing) exists with is_file';
    }

    public function run($loop)
    {
        $file = $this->getTempFile();

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            is_file($file);

            clearstatcache();
        }

        unlink($file);

        return $this->end();
    }
}
