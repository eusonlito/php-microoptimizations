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
        $this->start($loop);

        $file = '/tmp/'.uniqid().'.jpg';

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = explode('.', $file);
            $value = strtolower(end($value));
        }

        return $this->end();
    }
}
