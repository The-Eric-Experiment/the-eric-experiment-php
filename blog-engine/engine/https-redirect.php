<?php

function is_localhost()
{
  // set the array for testing the local environment
  $whitelist = array('127.0.0.1', '::1');

  // check if the server is in the array
  if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
    // this is a local environment
    return true;
  }

  return false;
}

$notHttps = empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off";

if ($notHttps && !is_localhost() && !IS_OLD_BROWSER) {
  $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  header('HTTP/1.1 301 Moved Permanently');
  header('Location: ' . $location);
  exit;
}
