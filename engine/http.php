<?php

function http_request(String $url, String $method, Array $data = null) {
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  if ($data) {
    $data_string = json_encode($data);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER , array('Content-Type:application/json', 'Content-Length: ' . strlen($data_string)));
  }

  $result = curl_exec($ch);
  $http_status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Get the HTTP status code
  $result = json_decode($result, true);

  curl_close($ch);

  // Return an array containing the status code and the response data
  return array(
    'status' => $http_status_code,
    'data' => $result
  );
}
