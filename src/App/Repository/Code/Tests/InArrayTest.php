<?php
namespace App\Repository\Code\Tests;

class InArrayTest extends TestInterface
{
    public function getDescription()
    {
        return 'Check if value is in array';
    }

    public function run($loop)
    {
        $values = $this->getRangeStrings($loop);
        $uniques = array_slice($values, 0, count($values) / 2);

        $this->start($loop);

        foreach ($values as $value) {
            $value = in_array($value, $uniques);
        }

        return $this->end();
    }
}
