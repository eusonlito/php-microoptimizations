<?php
namespace App\Repository\Code\Tests;

class CamelCasePregReplaceTest extends TestInterface
{
    protected $loopLimit = 100000;

    public function getDescription()
    {
        return 'Create a camelCase string using preg_replace_callback';
    }

    public function run($loop)
    {
        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            preg_replace_callback('/[^a-zA-Z0-9]+([a-zA-Z0-9])/', function($matches) {
                return ucfirst($matches[1]);
            }, strtolower('id_company_user_'.$i));
        }

        return $this->end();
    }
}
