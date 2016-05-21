<?php

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

try {

    // Register an autoloader
    $loader = new Loader();
    $loader->registerDirs(array(
        '../phalcon/controllers/',
        '../phalcon/models/'
    ))->register();

    // Create a DI
    $di = new FactoryDefault();

    // Setup the database service
    $di->set('db', function () {
        return new DbAdapter(array(
            'host'     => 'localhost',
            'username' => '',
            'password' => '',
            'dbname'   => ''
        ));
    });

    // Setup the view component
    $di->set('view', function () {
        $view = new View();
        $view->setViewsDir('../phalcon/views/');
        return $view;
    });

    // Setup a base URI so that all generated URIs include the "tutorial" folder
//    $di->set('url', function () {
//        $url = new UrlProvider();
//        $url->setBaseUri('/PhalconStudy/');
//        $url->setBaseUri('/app.php/');
//        $url->setBaseUri('/');
//        return $url;
//    });

    // Handle the request
    $application = new Application($di);

    echo $application->handle()->getContent();

} catch (\Exception $e) {
     echo "Exception: ", $e->getMessage();
}