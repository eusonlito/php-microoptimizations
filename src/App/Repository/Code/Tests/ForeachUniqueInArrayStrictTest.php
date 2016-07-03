<?php
namespace App\Repository\Code\Tests;

class ForeachUniqueInArrayStrictTest extends TestInterface
{
    public function getDescription()
    {
        return 'Create an array without duplicates from a range using foreach, checking existing with in_array (strict) and keys as values';
    }

    public function run($loop)
    {
        $values = $this->getRangeStrings($loop);

        $this->start($loop);

        $unique = array();

        foreach ($values as $value) {
            if (!in_array($value, $unique, true)) {
                $unique[] = $value;
            }
        }

        return $this->end();
    }
}
