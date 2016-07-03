<?php
namespace App\Repository\Code\Tests;

class ForeachUniqueTest extends TestInterface
{
    public function getDescription()
    {
        return 'Create an array without duplicates from a range using foreach and keys as values';
    }

    public function run($loop)
    {
        $values = $this->getRangeStrings($loop);

        $this->start($loop);

        $unique = array();

        foreach ($values as $value) {
            $unique[$value] = true;
        }

        $unique = array_keys($unique);

        return $this->end();
    }
}
