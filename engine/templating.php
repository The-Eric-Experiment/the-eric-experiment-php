<?php

// Create new Plates engine
$templates = new \League\Plates\Engine(__DIR__ . '/../templates');

require_once joinPaths(__DIR__, '..', CONFIG['contents-folder'], 'main-menu.php');

$categories = array_map(function ($cat) {
    return (object) $cat;
}, getDBCategories());
$tags = array_map(function ($tag) {
    return (object) $tag;
}, getDBTags());

$templates->addData(['main_menu' => MAIN_MENU], '_menu');
$templates->addData(['site_name' => CONFIG['site-name']], '_layout');
$templates->addData(['categories' => $categories], '_categories');
$templates->addData(['tags' => $tags], '_tags');

$templates->addFolder('posts', joinPaths(__DIR__, '..', CONFIG['contents-folder'], '/posts'), true);
$templates->addFolder('pages', joinPaths(__DIR__, '..', CONFIG['contents-folder'], '/pages'), true);

function fixHtml($html)
{
    // Leave script and style content untouched
    $unprocessedParts = [];
    $html = preg_replace_callback('/<script\b[^>]*>.*?<\/script>|<style\b[^>]*>.*?<\/style>/si', function ($matches) use (&$unprocessedParts) {
        $placeholder = '##' . count($unprocessedParts) . '##';
        $unprocessedParts[] = $matches[0];
        return $placeholder;
    }, $html);

    // Remove all whitespace between tags
    $html = preg_replace('/(?<=>)[\s\n]+(?=<)/', '', $html);

    // Ensure single space between text and a tag
    $html = preg_replace('/(\S)[\s\n]+(?=<)/', '$1 ', $html);
    $html = preg_replace('/(?<=>)[\s\n]+(\S)/', ' $1', $html);

    // Restore script and style content
    $html = preg_replace_callback('/##(\d+)##/', function ($matches) use ($unprocessedParts) {
        return $unprocessedParts[$matches[1]];
    }, $html);

    return $html;
}


function templateData($args)
{
    global $templates;
    foreach ($args as $name => $data) {
        $templates->addData($data, $name);
    }
}

function render($template, $model)
{
    global $templates;
    $rendered = $templates->render($template, $model);
    echo fixHtml($rendered);
}

$templates->registerFunction('text', function ($text, $args) use ($templates) {
    return $templates->render('_text', array_merge(['text' => $text], $args));
});

$templates->registerFunction('vertical_space', function ($space = 4) use ($templates) {
    $args = [];
    if (!empty($space)) {
        $args['space'] = $space;
    }

    return $templates->render('_space', array_merge(['vertical' => true], $args));
});

$templates->registerFunction('horizontal_space', function ($space = 4) use ($templates) {
    $args = [];
    if (!empty($space)) {
        $args['space'] = $space;
    }

    return $templates->render('_space', $args);
});

$templates->registerFunction('hline', function ($topBr = true) use ($templates) {
    return $templates->render('_line', ['top_br' => $topBr]);
});