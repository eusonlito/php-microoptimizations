<?php
error_reporting(E_ALL);

ini_set('error_reporting', E_ALL);
ini_set('expose_php', 0);
ini_set('log_errors', 1);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);

if (!ini_get('date.timezone')) {
    ini_set('date.timezone', 'Europe/Madrid');
}

define('APP_TIME', microtime(true));
define('APP_BASE_PATH', rtrim(realpath(__DIR__.'/../..'), '/'));
define('APP_LIBS_PATH', APP_BASE_PATH.'/src/App');
define('APP_VENDOR_PATH', APP_BASE_PATH.'/vendor');

require APP_VENDOR_PATH.'/autoload.php';
require APP_LIBS_PATH.'/autoload.php';
require APP_LIBS_PATH.'/helpers.php';

register_shutdown_function(array('App\Handler\Shutdown', 'handle'));
set_error_handler(array('App\Handler\Error', 'handle'));
set_exception_handler(array('App\Handler\Exception', 'handle'));
