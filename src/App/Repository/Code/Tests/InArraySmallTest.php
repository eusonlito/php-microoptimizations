<?php
namespace App\Repository\Code\Tests;

class InArraySmallTest extends TestInterface
{
    public function getDescription()
    {
        return 'Check if value is in array with few elements';
    }

    public function run($loop)
    {
        $values = $this->getRangeStrings($loop);
        $uniques = array_slice($values, rand(0, count($values) - 10), 5);

        $this->start($loop);

        foreach ($values as $value) {
            $value = in_array($value, $uniques);
        }

        return $this->end();
    }
}
