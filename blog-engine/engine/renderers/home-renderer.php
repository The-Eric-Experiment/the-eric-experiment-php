<?php
$config = require(__DIR__ . '/../../config.php');

return function () use ($templates, $config) {
  $intro_path = __DIR__ . '/../../' . $config["intro"];;
  $md = file_get_contents($intro_path);

  $pagination = createPagination(function ($offset) {
    $current_items = getDBPosts($offset, PAGE_LIMIT);
    $total_items = getDBPostCount();

    return [$current_items, $total_items];
  });

  $model = array_merge([
    'intro' => renderMarkdown($md)
  ], $pagination);

  return $templates->render(withVariant('home'), $model);
};
