<?php

use Phalcon\Mvc\Micro;

$app = new Micro();

$app->get('/say/welcome/{name}', function ($name) {
    echo "<h1>Welcome $name!</h1>";
});

$app->get('/tim', function () {
    echo "<h1>Hello Tim!</h1>";
});

$app->get('/', function () {
    echo "<h1>Hello World!</h1>";
});

// With a function
function say_hello($name) {
    echo "<h1>Hello! $name</h1>";
}

$app->get('/say/hello/{name}', "say_hello");

$app->handle();