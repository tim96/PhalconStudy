<?php

// phpinfo();
// die('Finish phpinfo');

$loader = require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

require_once __DIR__.'/../app/MicroKernel.php';

$app = new MicroKernel('prod', false);
$app->loadClassCache();

$app->handle(Request::createFromGlobals())->send();
