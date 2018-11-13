<?php
namespace app;

require_once implode(DIRECTORY_SEPARATOR, [
    __DIR__,
    'vendor',
    'autoload.php'
]);
$engine = new Engine();
$engine->runEngine();