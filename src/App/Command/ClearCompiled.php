<?php
namespace App\Command;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RecursiveRegexIterator;
use RegexIterator;

class ClearCompiled extends CommandInterface
{
    public function run()
    {
        $compiled = APP_VENDOR_PATH.'/compiled.php';

        if (is_file($compiled)) {
            unlink($compiled);
        }
    }
}
