<?php

$config = require __DIR__.'/../config.php';

define('CONFIG', $config);

try {
    require __DIR__ . '/../vendor/autoload.php';
    require 'analytics.php';
    require 'helpers.php';
    require 'exceptions.php';
    require 'browser-selector.php';
    require 'db.php';
    require 'paginator.php';
    require 'file-loader.php';
    require 'templating.php';
} catch (Exception $e) {
    echo var_dump($e);
    echo var_dump($e->getTrace());
}