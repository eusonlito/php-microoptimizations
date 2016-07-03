<?php
namespace App\Repository\Code\Tests;

class CamelCaseStringsTest extends TestInterface
{
    public function getDescription()
    {
        return 'Create a camelCase string using lcfirst/str_replace/uc_words';
    }

    public function run($loop)
    {
        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = lcfirst(str_replace(' ', '', ucwords(str_replace(array('-', '_'), ' ', 'id_company_user_'.$i))));
        }

        return $this->end();
    }
}
