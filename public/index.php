<?php

require_once __DIR__ . '/../vendor/autoload.php';

define('ROOT_PATH', realpath(__DIR__ . '/../'));
define('APP_PATH', ROOT_PATH . '/src/SecretSantaBoard');
define('LAZER_DATA_PATH', ROOT_PATH . '/databases/');

(new SecretSantaBoard\Application\App())->run();
