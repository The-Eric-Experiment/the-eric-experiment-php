<?php

$config = require(__DIR__ . '/../config.php');

$db_path = joinPaths(__DIR__, '..', $config["database"]);

$db = new SQLite3($db_path);

$version = $db->querySingle('SELECT SQLITE_VERSION()');

function getDBTags()
{
  global $db;
  $tags = $db->query('SELECT t.id, t.name, count(pt.tag_id) as cnt FROM post_tags pt LEFT JOIN tags t ON t.id = pt.tag_id GROUP BY pt.tag_id ORDER BY cnt DESC LIMIT 100');

  $arr = array();
  while ($row = $tags->fetchArray()) {
    $arr[] = $row;
  }
  return $arr;
}

function getDBCategories()
{
  global $db;
  $cats = $db->query('SELECT id, name from categories');

  $arr = array();
  while ($row = $cats->fetchArray()) {
    $arr[] = $row;
  }
  return $arr;
}

function getDBPostCount()
{
  global $db;
  $cnt = $db->querySingle('SELECT count(*) from posts');
  return $cnt;
}

function getDBPosts($offset, $limit)
{
  global $db;
  $stmt = $db->prepare("SELECT id, title, image, slug, description from posts limit :limit offset :offset");
  $stmt->bindParam(':offset', $offset, SQLITE3_TEXT);
  $stmt->bindParam(':limit', $limit, SQLITE3_TEXT);

  $posts = $stmt->execute();

  $arr = array();
  while ($row = $posts->fetchArray()) {
    $arr[] = (object) $row;
  }
  return $arr;
}

function getDBCategory($category_id)
{
  global $db;
  $stmt = $db->prepare('SELECT id, name from categories where id = :categoryid');
  $stmt->bindParam(':categoryid', $category_id, SQLITE3_TEXT);

  $result = $stmt->execute();
  return (object) $result->fetchArray();
}

function getDBCategoryPostCount($category_id)
{
  global $db;
  $stmt = $db->prepare('SELECT count(*) as cnt from post_categories where category_id = :categoryid');
  $stmt->bindParam(':categoryid', $category_id, SQLITE3_TEXT);

  $result = $stmt->execute();
  return $result->fetchArray()["cnt"];
}

function getDBCategoryPosts($category_id, $offset, $limit)
{
  global $db;
  $stmt = $db->prepare("SELECT p.id, p.title, p.image, p.slug, p.description from post_categories cp LEFT JOIN posts p on p.id = cp.post_id where cp.category_id = :categoryid limit :limit offset :offset");
  $stmt->bindParam(':categoryid', $category_id, SQLITE3_TEXT);
  $stmt->bindParam(':offset', $offset, SQLITE3_TEXT);
  $stmt->bindParam(':limit', $limit, SQLITE3_TEXT);

  $posts = $stmt->execute();

  $arr = array();
  while ($row = $posts->fetchArray()) {
    $arr[] = (object) $row;
  }

  return $arr;
}

function getDBTag($tag_id)
{
  global $db;
  $stmt = $db->prepare('SELECT id, name from tags where id = :tagid');
  $stmt->bindParam(':tagid', $tag_id, SQLITE3_TEXT);

  $result = $stmt->execute();
  return (object) $result->fetchArray();
}

function getDBTagPostCount($tag_id)
{
  global $db;
  $stmt = $db->prepare('SELECT count(*) as cnt from post_tags where tag_id = :tagid');
  $stmt->bindParam(':tagid', $tag_id, SQLITE3_TEXT);

  $result = $stmt->execute();
  return $result->fetchArray()["cnt"];
}

function getDBTagPosts($tag_id, $offset, $limit)
{
  global $db;
  $stmt = $db->prepare("SELECT p.id, p.title, p.image, p.slug, p.description from post_tags ct LEFT JOIN posts p on p.id = ct.post_id where ct.tag_id = :tagid limit :limit offset :offset");
  $stmt->bindParam(':tagid', $tag_id, SQLITE3_TEXT);
  $stmt->bindParam(':offset', $offset, SQLITE3_TEXT);
  $stmt->bindParam(':limit', $limit, SQLITE3_TEXT);

  $posts = $stmt->execute();

  $arr = array();
  while ($row = $posts->fetchArray()) {
    $arr[] = (object) $row;
  }

  return $arr;
}

function getDBPostCategories($post_id)
{
  global $db;
  $stmt = $db->prepare("SELECT c.id, c.name from post_categories pc LEFT JOIN categories c on c.id = pc.category_id where pc.post_id = :postid");
  $stmt->bindParam(':postid', $post_id, SQLITE3_TEXT);

  $posts = $stmt->execute();

  $arr = array();
  while ($row = $posts->fetchArray()) {
    $arr[] = (object) $row;
  }

  return $arr;
}

function getDBPostTags($post_id)
{
  global $db;
  $stmt = $db->prepare("SELECT t.id, t.name from post_tags pt LEFT JOIN tags t on t.id = pt.tag_id where pt.post_id = :postid");
  $stmt->bindParam(':postid', $post_id, SQLITE3_TEXT);

  $posts = $stmt->execute();

  $arr = array();
  while ($row = $posts->fetchArray()) {
    $arr[] = (object) $row;
  }

  return $arr;
}
