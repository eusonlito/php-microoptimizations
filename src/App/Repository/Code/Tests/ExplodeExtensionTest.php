<?php
namespace App\Repository\Code\Tests;

class ExplodeExtensionTest extends TestInterface
{
    public function getDescription()
    {
        return 'Obtain file extension with explode';
    }

    public function run($loop)
    {
        $file = '/tmp/'.uniqid().'.jpg';

        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $ext = explode('.', $file);
            $value = strtolower(end($ext));
        }

        return $this->end();
    }
}
