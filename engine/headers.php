<?php
require_once "helpers.php";

function getRemoteIP()
{
  if (array_key_exists('HTTP_X_REAL_IP', $_SERVER)) {
    return $_SERVER['HTTP_X_REAL_IP'];
  }

  if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
    return $_SERVER['HTTP_X_FORWARDED_FOR'];
  }

  if (array_key_exists('HTTP_CF_CONNECTING_IP', $_SERVER)) {
    return $_SERVER['HTTP_CF_CONNECTING_IP'];
  }

  if (array_key_exists('REMOTE_ADDR', $_SERVER)) {
    return $_SERVER['REMOTE_ADDR'];
  }

  return "";
}

function getUserAgent()
{
  if (array_key_exists('User-Agent', $_SERVER)) {
    return $_SERVER['User-Agent'];
  }

  if (array_key_exists('HTTP_USER_AGENT', $_SERVER)) {
    return $_SERVER['HTTP_USER_AGENT'];
  }

  return "";
}

function getReferer()
{
  return array_key_exists('HTTP_REFERER', $_SERVER)
    ? $_SERVER['HTTP_REFERER'] : "";
}

function getUrlPath()
{
  return 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') .
    '://' .
    "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
}
