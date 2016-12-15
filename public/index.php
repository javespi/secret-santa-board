<?php

require_once __DIR__.'/../vendor/autoload.php';

define('LAZER_DATA_PATH', realpath(dirname(__FILE__)).'/../data/');

$app = new Silex\Application();

$app->get('/', function() use ($app) {
    return 'This is Secret Santa Board!';
});

$app->run();