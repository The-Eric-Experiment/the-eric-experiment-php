<?php

return function () use ($templates) {
  $parsedUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
  parse_str($parsedUrl, $query);
  $id = $query["id"];
  $tag = getDBTag($id);

  $pagination = createPagination(function ($offset) use ($id) {
    $current_items = getDBTagPosts($id, $offset, PAGE_LIMIT);
    $total_items = getDBTagPostCount($id);

    return [$current_items, $total_items];
  });

  $model = array_merge([
    'name' => $tag->name,
  ], $pagination);

  return $templates->render(withVariant('tag'), $model);
};
