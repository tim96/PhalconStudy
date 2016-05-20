<?php

session_start();
$sessionId = session_id();

var_dump($sessionId);

echo "<pre>";
var_dump($_SESSION);
echo "</pre>";

echo "<h1>Hello!</h1>";