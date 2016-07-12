<?php
namespace App\Repository\Code\Tests;

use ReflectionMethod;
use App\Exception;

abstract class TestInterface
{
    protected $microtime;
    protected $memory;
    protected $name;
    protected $source;
    protected $loop;

    protected $loopLimit = 100000;

    abstract public function getDescription();
    abstract public function run($loop);

    public function getName()
    {
        return $this->name ?: ($this->name = substr(strrchr(get_class($this), '\\'), 1));
    }

    public function getLoop($loop)
    {
        if (!is_int($loop)) {
            throw new Exception\UnexpectedValueException('Loop value must be an integer');
        }

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

        return $this->source = trim(preg_replace('/\n{2,}/', "\n\n", $source));
    }

    protected function getTempFile()
    {
        return tempnam(sys_get_temp_dir(), '_');
    }

    protected function getRangeStrings($loop)
    {
        return array_map(function($value) {
            return 'value:'.intval($value / 10);
        }, range(0, $this->getLoop($loop) - 1));
    }

    protected function getRange($loop)
    {
        return array_map(function($value) {
            return intval($value / 10);
        }, range(0, $this->getLoop($loop) - 1));
    }

    protected function getTextLarge()
    {
        return '
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada, nisl sit amet congue blandit,
            neque ipsum molestie leo, eget mattis ipsum est a purus. Pellentesque sem magna, placerat eu ante et,
            congue posuere nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam lacinia leo eu
            odio auctor tempus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
            himenaeos. Vivamus et nunc tincidunt, sodales elit a, suscipit nibh. Pellentesque nibh eros,
            fringilla et massa eget, pulvinar rhoncus metus. Nullam eu velit libero. Praesent posuere feugiat
            arcu placerat porttitor. Nulla suscipit hendrerit vehicula. In in elementum est. Aenean risus nulla,
            gravida non rhoncus et, malesuada eget ex. Codio auctor tempus. Class aptent taciti sociosqu ad
            litora torquent per conubia nostra, per inceptos himenaeos. Vivamus et nunc tincidunt, sodales elit
            a, suscipit nibh.

            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada, nisl sit amet congue blandit,
            neque ipsum molestie leo, eget mattis ipsum est a purus. Pellentesque sem magna, placerat eu ante et,
            congue posuere nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam lacinia leo eu
            odio auctor tempus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
            himenaeos. Vivamus et nunc tincidunt, sodales elit a, suscipit nibh. Pellentesque nibh eros,
            fringilla et massa eget, pulvinar rhoncus metus. Nullam eu velit libero. Praesent posuere feugiat
            arcu placerat porttitor. Nulla suscipit hendrerit vehicula. In in elementum est. Aenean risus nulla,
            gravida non rhoncus et, malesuada eget ex. Codio auctor tempus. Class aptent taciti sociosqu ad
            litora torquent per conubia nostra, per inceptos himenaeos. Vivamus et nunc tincidunt, sodales elit
            a, suscipit nibh.
        ';
    }

    protected function start($loop)
    {
        $this->microtime = microtime(true);
        $this->memory = memory_get_usage();
        $this->loop = $this->getLoop($loop);
    }

    protected function end()
    {
        return array(
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'time' => (microtime(true) - $this->microtime),
            'memory' => (memory_get_peak_usage() - $this->memory),
            'loop' => $this->loop,
            'php' => PHP_MAJOR_VERSION.'.'.PHP_MINOR_VERSION.'.'.PHP_RELEASE_VERSION
        );
    }
}
