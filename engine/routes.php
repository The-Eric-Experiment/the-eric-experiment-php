<?php

use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;

$renderPage = require_once 'renderers/page-renderer.php';
$renderHome = require_once 'renderers/home-renderer.php';
$renderPost = require_once 'renderers/post-renderer.php';
$renderCategory = require_once 'renderers/category-renderer.php';
$renderTag = require_once 'renderers/tag-renderer.php';
$renderPosts = require_once 'renderers/posts-renderer.php';
$renderGallery = require_once 'renderers/gallery-renderer.php';
$renderNotFound = require_once 'renderers/not-found-renderer.php';

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

SimpleRouter::get('/gallery/{id}', function ($id) use ($renderGallery) {
    return $renderGallery($id);
});

SimpleRouter::get('/post/{post}', function ($post) use ($renderPost) {
    return $renderPost($post);
});

SimpleRouter::get('/{param}', function ($param = null) use ($renderPage) {
    return $renderPage($param);
}, ['defaultParameterRegex' => '.+']);

SimpleRouter::start();
