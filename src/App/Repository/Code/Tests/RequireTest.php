<?php
namespace App\Repository\Code\Tests;

class RequireTest extends TestInterface
{
    public function getDescription()
    {
        return 'Include file with require';
    }

    public function run($loop)
    {
        $file = $this->getTempFile();

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            require $file;

            clearstatcache();
        }

        unlink($file);

        return $this->end();
    }
}
