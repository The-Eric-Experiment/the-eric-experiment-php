<?php
require_once __DIR__ . '/../engine/load.php';
$config = require __DIR__.'/../config.php';

// Check if request is HTTPS or HTTP
$scheme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";

// Construct the full URL
$fullUrl = "$scheme://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// Parse the URL
$parsedUrl = parse_url($fullUrl);

// Extract the path component from the parsed URL
$path = $parsedUrl['path'];

// Break the path into segments
$segments = explode('/', $path);

// Find the UUID segment (assuming it's always in the same position in the path)
$uuidIndex = array_search('gallery', $segments) + 1;
$id = $segments[$uuidIndex];

function loadGallery($id)
{
    global $config;
    require_once joinPaths(__DIR__, '..', $config['galleries-folder'], $id.'.php');

    return $galleries[$id];
}

$gallery = loadGallery($id);

$parsedUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
parse_str($parsedUrl, $query);
$img = intval($query['img']);

$previousImageIndex = $img - 1;
$nextImageIndex = $img + 1;

$currentImage = $gallery['images'][$img];

// Prepend 'gallery-' to the file name in the 'src' item of the $currentImage array
$currentImageFilename = 'gallery-' . basename($currentImage['src']);
$currentImageDir = dirname($currentImage['src']);
$currentImage['src'] = ($currentImageDir === '.' ? '' : $currentImageDir . '/') . $currentImageFilename;

$previousImage = !empty($gallery['images'][$previousImageIndex]) ? "/gallery/{$id}?img={$previousImageIndex}" : null;
$nextImage = !empty($gallery['images'][$nextImageIndex]) ? "/gallery/{$id}?img={$nextImageIndex}" : null;

render('gallery', [
    'page_title' => $gallery['title'],
    'page_slug' => $gallery['slug'],
    'gallery' => $gallery,
    'currentImage' => $currentImage,
    'previousImage' => $previousImage,
    'nextImage' => $nextImage,
]);

