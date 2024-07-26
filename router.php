<?php

// router.php
if (preg_match('/\.(?:[a-zA-Z0-9]{2,5})$/', $_SERVER['REQUEST_URI'])) {
    return false;    // serve the requested resource as-is.
} else {
    $url_path = explode('?', trim($_SERVER['REQUEST_URI'], '/'));
    // If url_path is empty, it is root, so call index.html
    if (!$url_path[0]) {
        return false;
    }

    // Split the path into segments
    $segments = explode('/', $url_path[0]);

    // Use the first segment as the file name
    $file = __DIR__ . '/views/' . $segments[0] . '.php';
    
    if (!file_exists($file)) {
        $file = __DIR__ . '/views/page.php';
    }
    
    if (!file_exists($file)) {
        // Redirect to custom 404 page
        header("HTTP/1.0 404 Not Found");
        include __DIR__ . '/views/not-found.php';
        exit;
    }
        
    include $file;
}
