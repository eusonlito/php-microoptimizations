<?php
namespace App\Repository\Code\Tests;

class FileExistsTest extends TestInterface
{
    public function getDescription()
    {
        return 'Check if file (existing) exists with file_exists';
    }

    public function run($loop)
    {
        $file = $this->getTempFile();

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            file_exists($file);

            clearstatcache();
        }

        unlink($file);

        return $this->end();
    }
}
