<?php
namespace App\Filesystem;

class File
{
    public static function temporal()
    {
        return tempnam(sys_get_temp_dir(), uniqid());
    }

    public static function unique($file)
    {
        return dirname($file).'/'.microtime(true).'-'.uniqid().'-'.basename($file);
    }

    public static function write($file, $contents, $flag = null)
    {
        if (!is_dir($dir = dirname($file))) {
            mkdir($dir, 0755, true);
        }

        return file_put_contents($file, $contents, $flag);
    }

    public static function read($file)
    {
        if (is_file($file)) {
            return file_get_contents($file);
        }
    }
}
