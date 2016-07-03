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
        $values = $this->getRangeStrings($loop);

        $this->start($loop);

        $unique = array();

        foreach ($values as $value) {
            if (empty($values[$value])) {
                $unique[$value] = true;
            }
        }

        $unique = array_keys($unique);

        return $this->end();
    }
}
