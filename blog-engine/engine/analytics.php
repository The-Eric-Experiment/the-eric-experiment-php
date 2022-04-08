<?php

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

/**
 * Tracks events
 * 
 * @param string $event_name The name of the event
 * @param array|boolean $props The Props
 * 
 * @return void;
 */
function trackEvent(string $event_name, $props = false)
{
  $ip = getRemoteIP();
  $userAgent = getUserAgent();
  $referer = getReferer();
  $locationUrl = getUrlPath();
  $parsedUrl = parse_url($locationUrl);
  // $documentPath = $parsedUrl["path"];
  // $documentQuery = $parsedUrl["query"] ?? "";
  $documentHost = $parsedUrl["host"];
  $event_url = 'http://tinylytics:8080/api/event';

  $additional_headers = array(
    "User-Agent: {$userAgent}",
    "HTTP_X_REAL_IP: {$ip}",
    "HTTP_REFERER: {$referer}",
    'Content-Type: application/json'
  );

  $data = array(
    "name" => $event_name,
    "page" => $locationUrl,
    "domain" => "ericexperiment.com",
    "screenWidth" => 1666,
  );

  if ($props !== false) {
    $data["props"] = json_encode($props);
  }

  $ch = curl_init($event_url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

  curl_exec($ch);
}

if (strpos($documentHost, 'localhost') === false) {
  trackEvent('pageview');
}