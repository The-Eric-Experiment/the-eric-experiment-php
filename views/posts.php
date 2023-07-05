<?php

require_once __DIR__ . '/../engine/load.php';

$page = $_GET["page"] ? intval($_GET["page"]) + 1 : 1;

$pagination = createPagination(function ($offset) {
    $current_items = getDBPosts($offset, PAGE_LIMIT);
    $total_items = getDBPostCount();

    return [$current_items, $total_items];
});

$model = array_merge([
    'page' => $page
], $pagination);

render('posts', $model);