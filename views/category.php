<?php
require_once 'engine/load.php';

$parsedUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
parse_str($parsedUrl, $query);
$id = $query["id"];
$category = getDBCategory($id);

$pagination = createPagination(function ($offset) use ($id) {
    $current_items = getDBCategoryPosts($id, $offset, PAGE_LIMIT);
    $total_items = getDBCategoryPostCount($id);

    return [$current_items, $total_items];
});

templateData([
    '_post-list' => $pagination,
    '_layout' => ['name' => $category->name],
]);

render('category', ['name' => $category->name]);
