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
  $referrer = getReferer();
  $locationUrl = getUrlPath();
  $event_url = 'http://plausible:8000/api/event';

  $additional_headers = array(
    "User-Agent: {$userAgent}",
    "X-Forwarded-For: {$ip}",
    'Content-Type: application/json',
  );

  $data = array(
    "name" => $event_name,
    "url" => $locationUrl,
    "domain" => "ericexperiment.com",
    "screen_width" => 1666,
    "referrer" => $referrer
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
  trackEvent('website_variant', array("mode" => "retro"));
}
