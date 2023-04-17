<?php

$config = require __DIR__.'/../../config.php';

function loadGallery($id)
{
    global $config;
    require_once joinPaths(__DIR__, '../..', $config['galleries-folder'], $id.'.php');

    return $galleries[$id];
}

return function ($id) use ($templates) {
    $gallery = loadGallery($id);

    $parsedUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
    parse_str($parsedUrl, $query);
    $img = intval($query['img']);

    $previousImageIndex = $img - 1;
    $nextImageIndex = $img + 1;

    $currentImage = $gallery['images'][$img];
    $previousImage = $gallery['images'][$previousImageIndex] ? "/gallery/{$id}?img={$previousImageIndex}" : null;
    $nextImage = $gallery['images'][$nextImageIndex] ? "/gallery/{$id}?img={$nextImageIndex}" : null;

    return $templates->render(withVariant('gallery-page'), [
    'page_title' => $data['title'],
    'page_slug' => $data['slug'],
    'gallery' => $gallery,
    'currentImage' => $currentImage,
    'previousImage' => $previousImage,
    'nextImage' => $nextImage,
  ]);
};
