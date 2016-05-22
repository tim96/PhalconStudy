<?php

require_once __DIR__.'/../vendor/autoload.php';

// phpinfo();
// die('Finish phpinfo in silex script');

$app = require __DIR__.'/../silex/app.php';

$app->run();