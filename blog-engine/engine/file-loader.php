<?php

use Spatie\YamlFrontMatter\YamlFrontMatter;

$config = require __DIR__.'/../config.php';

define('BLOG_PAGE_PATH', __DIR__.'/../'.$config['pages-folder']);
define('BLOG_POST_PATH', __DIR__.'/../'.$config['posts-folder']);

function pageExists($page)
{
    $filePath = BLOG_PAGE_PATH.'/'.$page.'.php';
    $md = @file_exists($filePath);
    if ($md === false) {
        throw new PageNotFoundException('Page not found');
    }

    return true;
}

function postExists($slug)
{
    global $config;
    $post_path = BLOG_POST_PATH."/{$slug}/";
    $file_path = $post_path.$config['post-filename'];
    $md = @file_exists($file_path);
    if ($md === false) {
        throw new PageNotFoundException('Post not found');
    }

    return true;
}

function loadPageMd($page)
{
    $filePath = BLOG_PAGE_PATH.'/'.$page.'.md';
    $md = @file_get_contents($filePath);
    if ($md === false) {
        throw new PageNotFoundException('Page not found');
    }

    return YamlFrontMatter::parse($md);
}

function loadPostMd($slug)
{
    global $config;
    $post_path = BLOG_POST_PATH."/{$slug}/";
    $file_path = $post_path.$config['post-filename'];
    $md = @file_get_contents($file_path);
    if ($md === false) {
        throw new PageNotFoundException('Post not found');
    }

    return ['object' => YamlFrontMatter::parse($md), 'post_path' => $post_path];
}
