<?php

require_once 'headers.php';
$documentHost = '';
$analytics_service_url = getenv('ANALYTICS_SERVICE_URL', true) ?: getenv('ANALYTICS_SERVICE_URL');
/**
 * Tracks events.
 *
 * @param string     $event_name The name of the event
 * @param array|bool $props      The Props
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
    $documentHost = $parsedUrl['host'];
    $event_url = 'http://'.$analytics_service_url.'/api/event';

    $additional_headers = [
    "User-Agent: {$userAgent}",
    "HTTP_X_REAL_IP: {$ip}",
    "HTTP_REFERER: {$referer}",
    'Content-Type: application/json',
  ];

    $data = [
    'name' => $event_name,
    'page' => $locationUrl,
    "domain" => "ericexperiment.com",
    "screenWidth" => 1666,
  ];

    if ($props !== false) {
        $data['props'] = json_encode($props);
    }

    $ch = curl_init($event_url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $additional_headers);

    curl_exec($ch);
}

if (strpos($documentHost, 'localhost') === false) {
    trackEvent('pageview');
}