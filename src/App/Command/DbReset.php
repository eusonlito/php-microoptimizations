<?php
namespace App\Command;

class DbReset extends CommandInterface
{
    public function run()
    {
        $config = config('database');

        $file = explode(':', $config['dsn']);
        $file = end($file);

        if (is_file($file)) {
            unlink($file);
        }

        shell_exec(sprintf('cat "%s" | sqlite3 "%s"', APP_BASE_PATH.'/database/sqlite.schema', $file));
    }
}
