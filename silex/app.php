<?php

use Silex\Provider\FormServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

// Register providers

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

$app->register(new Silex\Provider\AssetServiceProvider(), array(
    'assets.version' => 'v1',
));

$app->register(new Silex\Provider\ValidatorServiceProvider(), array(

));

$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'translator.domains' => array(), 'locale_fallbacks' => array('en'), 'locale' => 'en')
);

$app->register(new Silex\Provider\RoutingServiceProvider(), array(

));

$app->register(new FormServiceProvider(), array(

));

// Add variables to twig

$app->before(function (Request $request) use ($app) {
    $app['twig']->addGlobal('active', $request->get("_route"));
});

// Add routes

$app->match('/', function(Request $request) use ($app) {

    $hello = 'Hello World';

    return $app['twig']->render('index.html.twig', array('content' => $hello));
});

$app->match('/api', function(Request $request) use ($app) {

    $hello = 'Hello World from silex api';

    return $app['twig']->render('index.html.twig', array('content' => $hello));
})->bind('api');


return $app;