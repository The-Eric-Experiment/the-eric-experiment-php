<?php

function getRemoteIP()
{
  return array_key_exists('REMOTE_ADDR', $_SERVER)
    ? $_SERVER['REMOTE_ADDR'] : "";
}


function getUserAgent()
{
  return array_key_exists('HTTP_USER_AGENT', $_SERVER)
    ? $_SERVER['HTTP_USER_AGENT'] : "";
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

$ip = getRemoteIP();
$userAgent = getUserAgent();
$referrer = getReferer();
$locationUrl = getUrlPath();
$parsedUrl = parse_url($locationUrl);
$documentPath = $parsedUrl["path"];
$documentQuery = $parsedUrl["query"] ?? "";
$documentHost = $parsedUrl["host"];

if (strpos($documentHost, 'localhost') === false) {
  $url = 'https://analytics.ericexperiment.com/api/event';

  $data = '
{
  "name":"pageview",
  "url":"' . $locationUrl . '",
  "domain":"ericexperiment.com",
  "screen_width":1666,
  "referrer": "' . $referrer . '"
}
';

  $additional_headers = array(
    "User-Agent: {$userAgent}",
    "X-Forwarded-For: {$ip}",
    'Content-Type: application/json',
  );

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

  curl_exec($ch);
}
