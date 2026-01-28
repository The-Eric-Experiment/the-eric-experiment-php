<?php

require_once __DIR__ . '/../engine/load.php';
require_once __DIR__ . '/../engine/analytics.php';

$page = isset($_GET["page"]) && $_GET["page"] ? intval($_GET["page"]) + 1 : 1;

$pagination = createPagination(function ($offset) {
    $current_items = getDBPosts($offset, PAGE_LIMIT);
    $total_items = getDBPostCount();

    return [$current_items, $total_items];
});

$model = array_merge([
    'page' => $page
], $pagination);

templateData([
    '_layout' => ['name' => 'Posts'],
]);

render('posts', $model);