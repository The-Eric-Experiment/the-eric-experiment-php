<?php

require_once __DIR__ . '/../engine/load.php';
require_once __DIR__ . '/../engine/analytics.php';
// Get site news
require_once joinPaths(__DIR__, '..', CONFIG['contents-folder'], 'site-news.php');

$intro_path = __DIR__.'/../'.CONFIG['intro'];
$md = file_get_contents($intro_path);

$pagination = createPagination(function ($offset) {
    $current_items = getDBPosts($offset, PAGE_LIMIT);
    $total_items = getDBPostCount();

    return [$current_items, $total_items];
});

templateData([
    'home-posts' => $pagination,
    'home-news' => ['news' => SITE_NEWS],
]);

$model = [
    'intro' => $md,
];

render('home', $model);