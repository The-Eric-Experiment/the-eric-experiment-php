<?php
require_once __DIR__ . '/../engine/load.php';
require_once __DIR__ . '/../engine/analytics.php';

$page = $_GET["page"] ? intval($_GET["page"]) + 1 : 1;

$parsedUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
parse_str($parsedUrl, $query);
$id = $query["id"];
$tag = getDBTag($id);

$pagination = createPagination(function ($offset) use ($id) {
    $current_items = getDBTagPosts($id, $offset, PAGE_LIMIT);
    $total_items = getDBTagPostCount($id);

    return [$current_items, $total_items];
});

templateData([
    '_post-list' => $pagination,
    '_layout' => ['title' => $tag->name],
]);

render('tag', [
    'name' => $tag->name,
    'page' => $page
]);
