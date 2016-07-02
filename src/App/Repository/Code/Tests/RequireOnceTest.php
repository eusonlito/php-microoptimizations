<?php
namespace App\Repository\Code\Tests;

class RequireOnceTest extends TestInterface
{
    public function getDescription()
    {
        return 'Include file with require_once';
    }

    public function run($loop)
    {
        $file = $this->getTempFile();

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            require_once $file;

            clearstatcache();
        }

        unlink($file);

        return $this->end();
    }
}
