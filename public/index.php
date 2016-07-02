<?php
require __DIR__.'/../src/App/bootstrap.php';

$app = new App\App\App;

$app->router(getenv('REQUEST_URI'))
    ->middleware()
    ->controller()
    ->show('layout.base');

exit;
