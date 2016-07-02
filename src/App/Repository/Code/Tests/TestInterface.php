<?php
namespace App\Repository\Code\Tests;

use ReflectionMethod;

abstract class TestInterface
{
    protected $microtime;
    protected $memory;
    protected $name;
    protected $source;
    protected $loop;

    protected $loopLimit = 1000000;

    abstract public function getDescription();
    abstract public function run($loop);

    public function getName()
    {
        return $this->name ?: ($this->name = substr(strrchr(get_class($this), '\\'), 1));
    }

    public function getLoop($loop)
    {
        return ($loop > $this->loopLimit) ? $this->loopLimit : $loop;
    }

    public function getSource()
    {
        if ($this->source) {
            return $this->source;
        }

        $reflection = new ReflectionMethod($this, 'run');

        $start_line = $reflection->getStartLine() + 1;
        $end_line = $reflection->getEndLine() - $start_line - 1;

        $source = '';

        foreach (array_slice(file($reflection->getFileName()), $start_line, $end_line) as $line) {
            $source .= preg_replace('/^\s{8}/', '', $line);
        }

        $source = str_replace(array('$this->start($loop);', 'return $this->end();'), '', $source);

        return $this->source = trim(preg_replace('/\n{2,}/', "\n\n", $source));
    }

    public function getTempFile()
    {
        return tempnam(sys_get_temp_dir(), '_');
    }

    public function start($loop)
    {
        $this->microtime = microtime(true);
        $this->memory = memory_get_usage();
        $this->loop = $this->getLoop($loop);
    }

    public function end()
    {
        return array(
            'time' => (microtime(true) - $this->microtime),
            'memory' => (memory_get_peak_usage() - $this->memory),
            'loop' => $this->loop
        );
    }
}
