<?php
namespace App\Repository\Code\Tests;

class PathinfoExtensionTest extends TestInterface
{
    public function getDescription()
    {
        return 'Obtain filename extension with pathinfo';
    }

    public function run($loop)
    {
        $this->start($loop);

        $file = '/tmp/'.uniqid().'.jpg';

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        }

        return $this->end();
    }
}
