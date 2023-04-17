<?php

// Create new Plates engine
$templates = new \League\Plates\Engine(__DIR__.'/../templates');

$json = file_get_contents(CONFIG['main-menu']);
$main_menu = json_decode($json);

$categories = array_map(function ($cat) {
    return (object) $cat;
}, getDBCategories());
$tags = array_map(function ($tag) {
    return (object) $tag;
}, getDBTags());

$templates->addData(['main_menu' => $main_menu], '_menu');
$templates->addData(['site_name' => CONFIG['site-name']], '_layout');
$templates->addData(['categories' => $categories], '_categories');
$templates->addData(['tags' => $tags], '_tags');

$templates->addFolder('posts', joinPaths(__DIR__,'..',CONFIG['contents-folder'],'/posts'), true);
$templates->addFolder('pages', joinPaths(__DIR__,'..',CONFIG['contents-folder'],'/pages'), true);

function fixHtml($html) {
    $pattern = [
        '/\>[^\S ]+/s',  // remove spaces after tags, except newline
        '/[^\S ]+\</s',  // remove spaces before tags, except newline
        '/(\s)+/s'       // remove multiple spaces and newlines
    ];
    $replacement = [
        '>',
        '<',
        '\\1'
    ];
    $clean_html = preg_replace($pattern, $replacement, $html);
    $clean_html = str_replace(array("\r\n", "\r", "\n"), '', $clean_html); // remove line breaks without spaces
    $clean_html = preg_replace('/>\s+</', '><', $clean_html); // remove spaces between tags that are not adjacent
    return $clean_html;
}

function templateData($args) {
    global $templates;
    foreach ($args as $name => $data) {
        $templates->addData($data, $name);
    }
}

function render($template, $model) {
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
   return  $templates->render('_line', ['top_br'=>$topBr]);
});