<?php
namespace App\Repository\Code\Tests;

class ForeachUniqueEmptyTest extends TestInterface
{
    public function getDescription()
    {
        return 'Create an array without duplicates from a range using foreach, checking existing with empty and keys as values';
    }

    public function run($loop)
    {
        $this->start($loop);

        $values = array();

        foreach (range(range(1, $this->loop, 3), range(1, $this->loop, 2)) as $value) {
            if (empty($values[$value])) {
                $values[$value] = true;
            }
        }

        $values = array_keys($values);

        return $this->end();
    }
}
