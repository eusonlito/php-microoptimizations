<?php
namespace App\Repository\Code\Tests;

class SubstrExtensionTest extends TestInterface
{
    public function getDescription()
    {
        return 'Obtain filename extension with substr/strrchr';
    }

    public function run($loop)
    {
        $this->start($loop);

        $file = '/tmp/'.uniqid().'.jpg';

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = strtolower(substr(strrchr($file, '.'), 1));
        }

        return $this->end();
    }
}
