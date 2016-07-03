<?php
namespace App\Command;

use App\Repository\Code;
use App\Database\Model;

class TestClean extends CommandInterface
{
    public function run($test)
    {
        if (in_array($test, Code\Test::getAllNames(), true)) {
            return;
        }

        $this->info(__('Deleted test %s', $test));

        Model\Test::deleteByName($test);
    }
}
