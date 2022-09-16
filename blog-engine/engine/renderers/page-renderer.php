<?php

return function (string $key) use ($templates) {
    pageExists($key);
    $path = 'pages::'.$key;

    return $templates->render($path, []);
};
