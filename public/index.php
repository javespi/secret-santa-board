<?php

require_once __DIR__ . '/../vendor/autoload.php';

define('ROOT_PATH', realpath(__DIR__ . '/../'));
define('APP_PATH', ROOT_PATH . '/src/SecretSantaBoard');

(new SecretSantaBoard\Application\App())->run();
