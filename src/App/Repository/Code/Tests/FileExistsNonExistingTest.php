<?php
namespace App\Repository\Code\Tests;

class FileExistsNonExistingTest extends TestInterface
{
    public function getDescription()
    {
        return 'Check if file (non existing) exists with file_exists';
    }

    public function run($loop)
    {
        unlink($file = $this->getTempFile());

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            file_exists($file);

            clearstatcache();
        }

        return $this->end();
    }
}
