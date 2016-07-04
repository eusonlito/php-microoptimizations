<?php
namespace App\Command;

use App\Repository\Code;
use App\Database\Model;

class TestLoad extends CommandInterface
{
    public function run($test)
    {
        $testDB = Model\Test::byName($test);
        $test = Code\Test::getObject($test);

        if (empty($testDB)) {
            $this->insert($test);
        } else {
            $this->update($testDB, $test);
        }
    }

    private function insert($new)
    {
        $this->info(__('Inserted test %s', $new->getName()));

        $id = Model\Test::insert(array(
            'name' => $new->getName(),
            'description' => $new->getDescription()
        ));

        Model\Test::byId($id);
    }

    private function update($current, $new)
    {
        if ($this->isUpdated($current, $new)) {
            return;
        }

        $this->info(__('Updated test %s', $new->getName()));

        Model\Test::update(array(
            'id' => $current->id,
            'name' => $new->getName(),
            'description' => $new->getDescription()
        ));
    }

    private function isUpdated($current, $new)
    {
        return ($new->getName() === $current->name) && ($new->getDescription() === $current->description);
    }
}
