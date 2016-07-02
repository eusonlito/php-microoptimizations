<?php
spl_autoload_register(function ($className) {
    if (strpos($className, 'App') !== 0) {
        return;
    }

    $fileName = APP_BASE_PATH.'/src/';

    if ($lastNsPos = strripos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName .= str_replace('\\', DIRECTORY_SEPARATOR, $namespace).DIRECTORY_SEPARATOR;
    }

    $fileName .= $className.'.php';

    if (is_file($fileName)) {
        require $fileName;
    }
});
