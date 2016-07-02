<?php
namespace App\Repository\Code\Tests;

class IsFileNonExistingTest extends TestInterface
{
    public function getDescription()
    {
        return 'Check if file (non existing) exists with is_file';
    }

    public function run($loop)
    {
        unlink($file = $this->getTempFile());

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            is_file($file);

            clearstatcache();
        }

        return $this->end();
    }
}
