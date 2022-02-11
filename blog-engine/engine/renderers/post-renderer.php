<?php

function getPost(string $slug)
{
  global $templates;
  global $templates;
  list('object' => $object, 'post_path' => $post_path) = loadPostMd($slug);

  $post_id = md5($slug);

  $tags = getDBPostTags($post_id);
  $categories = getDBPostCategories($post_id);

  $templates->addData(
    [
      'page_title' => $object->title,
      'page_slug' => 'posts/' . $slug,
    ],
    withVariant('gallery')
  );

  return (object) array(
    'title' => $object->title,
    'date' => $object->date,
    'tags' => $tags,
    'categories' => $categories,
    'full_path' => $post_path,
    'image' => $object->image,
    'slug' => $slug,
    'description' => $object->description,
    'content' => renderMarkdown($object->body()),
  );
}

return function (string $key) use ($templates) {
  $data = getPost($key);
  return $templates->render(withVariant('post'), ['data' => $data]);
};
