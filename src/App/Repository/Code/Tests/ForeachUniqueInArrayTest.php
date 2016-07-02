<?php
namespace App\Repository\Code\Tests;

class ForeachUniqueInArrayTest extends TestInterface
{
    public function getDescription()
    {
        return 'Create an array without duplicates from a range using foreach, checking existing with in_array and keys as values';
    }

    public function run($loop)
    {
        $this->start($loop);

        $values = array();

        foreach (range(range(1, $this->loop, 3), range(1, $this->loop, 2)) as $value) {
            if (!in_array($value, $values)) {
                $values[] = $value;
            }
        }

        return $this->end();
    }
}
