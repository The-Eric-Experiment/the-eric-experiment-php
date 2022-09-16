<?php

return function (string $key) use ($templates, $config) {
    postExists($key);
    $path = 'posts::'.$key.'/post';

    return $templates->render($path, []);
};
