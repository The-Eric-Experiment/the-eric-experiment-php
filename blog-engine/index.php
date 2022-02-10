<?php
session_start();
try {
  $config = require "config.php";

  require $config['contents-folder'] . '/' . 'categories.php';
  require $config['contents-folder'] . '/' . 'posts.php';
  require $config['contents-folder'] . '/' . 'tags.php';
} catch (Exception $e) {
  echo "Mising contents configuration";
}

try {
  require 'vendor/autoload.php';
  require 'engine/helpers.php';
  require 'engine/exceptions.php';
  require 'engine/browser-selector.php';
  // require 'engine/https-redirect.php';
  require 'engine/variant-selector.php';
  require 'engine/image-mapper.php';
  require 'engine/file-loader.php';
  require 'engine/paginator.php';
  require 'engine/parsers/gallery-parser.php';
  require 'engine/templating.php';
  require 'engine/parsers/markdown-parser.php';
  require "engine/routes.php";
} catch (Exception $e) {
  echo var_dump($e);
  echo var_dump($e->getTrace());
}
