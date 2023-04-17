<?php

// router.php
if (preg_match('/\.(?:[a-zA-Z0-9]{2,3})$/', $_SERVER['REQUEST_URI'])) {
    return false;    // serve the requested resource as-is.
} else {
    $url_path = explode('?', trim($_SERVER['REQUEST_URI'], '/'));
    // If url_path is empty, it is root, so call index.html
    if (!$url_path[0]) {
        return false;
    }

    // If url_path has no dot, it is a post permalink, so add .html extension
    if (!preg_match('/[\.](?:[a-zA-Z0-9]{2,3})/', $url_path[0])) {
        $file = __DIR__ . '/views/'. $url_path[0].'.php';
        if (!file_exists($file)) {
            return;
        }

        include $file;
    }
}