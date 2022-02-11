<?php

use Pecee\SimpleRouter\SimpleRouter;

define('PAGE_LIMIT', 8);

function rebuildUrl($page)
{
  return SimpleRouter::getUrl()->mergeParams(['page' => $page])->getRelativeUrl();
}

function createPagination($getter)
{
  $page = intval($_GET["page"] ?? "0");
  $offset = $page * PAGE_LIMIT;

  list($current_items, $total_items) = $getter($offset);

  $previous_page = $offset > 0 ? strval($page - 1) : null;
  $next_page = ($offset + PAGE_LIMIT) < $total_items ? strval($page + 1) : null;

  return [
    'posts' =>  $current_items,
    'previous_page' => $previous_page != null ? rebuildUrl($previous_page) : null,
    'next_page' => $next_page != null ? rebuildUrl($next_page) : null
  ];
};
