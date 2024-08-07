<?php

require_once __DIR__ . '/../engine/load.php';
require_once __DIR__ . '/../engine/analytics.php';

$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$path_components = explode('/', $path);

if (count($path_components) <= 0) {
    die;
}

$key = implode('/', array_slice($path_components, 0));

if (!pageExists($key)) {
    header("HTTP/1.0 404 Not Found");
    include 'not-found.php';
    exit;
}

render('pages::'.$key, []);