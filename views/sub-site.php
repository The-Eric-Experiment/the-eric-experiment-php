<?php
// Extract the subdomain from the query parameter
$subdomain = isset($_GET['subdomain']) ? htmlspecialchars($_GET['subdomain']) : '';

// Extract the requested path from the URL
$requestPath = isset($_SERVER['REQUEST_URI']) ? htmlspecialchars($_SERVER['REQUEST_URI']) : '';

// Remove query string from request path
$requestPath = strtok($requestPath, '?');

// Echo the extracted information
echo "<h1>Subdomain: $subdomain</h1>";
echo "<p>Requested Path: $requestPath</p>";
?>
