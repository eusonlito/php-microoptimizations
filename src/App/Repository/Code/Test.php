<?php
namespace App\Repository\Code;

use App\App\Check;
use App\Exception;

class Test
{
    /**
     * @var array
     */
    private static $tests = array();

    /**
     * @var string
     */
    private $name;

    /**
     * @var object
     */
    private $test;

    /**
     * @var array
     */
    private $stats = array();

    public static function getAll()
    {
        if (self::$tests) {
            return self::$tests;
        }

        foreach (glob(__DIR__.'/Tests/*.php') as $file) {
            $file = preg_replace('/\.php$/', '', basename($file));

            if (substr($file, -4) === 'Test') {
                self::$tests[] = $file;
            }
        }

        return self::$tests;
    }

    public static function get($test = null)
    {
        return self::loadTest($test);
    }

    public static function getAllObjects()
    {
        $tests = array();

        foreach (self::getAll() as $test) {
            $tests[$test] = self::loadTest($test);
        }

        return $tests;
    }

    public function __construct($test)
    {
        $this->checkTest($test);

        $this->name = $test;
        $this->test = self::loadTest($test);

        return $this;
    }

    public function run($loop)
    {
        $this->checkLoop($loop);

        $loop = $this->test->getLoop($loop);

        if (isset($this->stats[$loop])) {
            return $this;
        }

        $this->stats[$loop] = $this->test->run($loop);

        return $this;
    }

    public function getStats()
    {
        return array(
            'name' => $this->name,
            'description' => $this->test->getDescription(),
            'stats' => $this->stats,
            'php' => phpversion()
        );
    }

    private static function loadTest($test)
    {
        $test = Check::getClass(__NAMESPACE__.'\\Tests', $test);

        return new $test;
    }

    private function checkTest($test)
    {
        if (!in_array($test, self::getAll(), true)) {
            throw new Exception\UnexpectedValueException('Test not exists');
        }
    }

    private function checkLoop($loop)
    {
        if (!is_int($loop)) {
            throw new Exception\UnexpectedValueException('Loop value must be an integer');
        }
    }
}
