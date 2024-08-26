<?php

function getSubdomain() {
    // Get the full host (e.g., subdomain.example.com)
    $host = $_SERVER['HTTP_HOST'];

    // Break the host into an array by dots
    $parts = explode('.', $host);

    // If there are more than 2 parts, then we have a subdomain
    if (count($parts) > 2) {
        // Remove the last two parts (domain and TLD)
        array_pop($parts); // remove TLD
        array_pop($parts); // remove domain

        // The remaining parts are the subdomain
        $subdomain = implode('.', $parts);
    } else {
        // If there are only two parts, there's no subdomain
        $subdomain = '';
    }

    return $subdomain;
}

// Extract the subdomain from the query parameter
$subdomain = getSubdomain();

// Extract the requested path from the URL
$requestPath = isset($_SERVER['REQUEST_URI']) ? htmlspecialchars($_SERVER['REQUEST_URI']) : '';

// Remove query string from request path
$requestPath = strtok($requestPath, '?');

// Echo the extracted information
echo "<h1>Subdomain: $subdomain</h1>";
echo "<p>Requested Path: $requestPath</p>";
?>
