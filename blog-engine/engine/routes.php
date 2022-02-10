<?php

use Pecee\SimpleRouter\SimpleRouter;
use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;

$renderPage = include "renderers/page-renderer.php";
$renderHome = require "renderers/home-renderer.php";
$renderPost = require "renderers/post-renderer.php";
$renderCategory = require "renderers/category-renderer.php";
$renderTag = require "renderers/tag-renderer.php";
$renderPosts = require "renderers/posts-renderer.php";
$renderGallery = require "renderers/gallery-renderer.php";
$renderNotFound = require "renderers/not-found-renderer.php";

SimpleRouter::get('/not-found', function () use ($renderNotFound) {
  return $renderNotFound();
});

SimpleRouter::error(function (Request $request, \Exception $exception) {
  if ($exception instanceof PageNotFoundException) {
    SimpleRouter::response()->redirect('/not-found');
  }

  if ($exception instanceof NotFoundHttpException && $exception->getCode() === 404) {
    SimpleRouter::response()->redirect('/not-found');
  }
});

SimpleRouter::get('/', function () use ($renderHome) {
  return $renderHome();
});

SimpleRouter::get('/category', function () use ($renderCategory) {
  return $renderCategory();
});

SimpleRouter::get('/tag', function () use ($renderTag) {
  return $renderTag();
});

SimpleRouter::get('/posts', function () use ($renderPosts) {
  return $renderPosts();
});

SimpleRouter::get('/gallery/{type}/{slug}/{gallery}', function ($type, $slug, $gallery) use ($renderGallery) {
  return $renderGallery($type, $slug, $gallery);
});

SimpleRouter::get('/post/{post}', function ($post) use ($renderPost) {
  return $renderPost($post);
});

SimpleRouter::get('/{param}', function ($param = null) use ($renderPage) {
  return $renderPage($param);
}, ['defaultParameterRegex' => '.+']);

SimpleRouter::start();
