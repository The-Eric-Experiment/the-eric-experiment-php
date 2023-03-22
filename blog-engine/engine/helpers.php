<?php

use DeviceDetector\DeviceDetector;
use DeviceDetector\Parser\Device\AbstractDeviceParser;

// OPTIONAL: Set version truncation to none, so full versions will be returned
// By default only minor versions will be returned (e.g. X.Y)
// for other options see VERSION_TRUNCATION_* constants in DeviceParserAbstract class
AbstractDeviceParser::setVersionTruncation(AbstractDeviceParser::VERSION_TRUNCATION_NONE);

function joinPaths(...$paths) {
    $separator = DIRECTORY_SEPARATOR;
    $joinedPath = implode($separator, $paths);
    $joinedPath = preg_replace('#'.$separator.'{2,}#', $separator, $joinedPath); // Replace double slashes with a single slash

    // Handle ".." components
    $parts = explode($separator, $joinedPath);
    $finalParts = array();
    foreach ($parts as $part) {
        if ($part === "..") {
            array_pop($finalParts);
        } else {
            $finalParts[] = $part;
        }
    }

    return implode($separator, $finalParts);
}

function getRequirePath($input)
{
  return joinPaths(__DIR__, "/../", $input);
}

function getNormalizedUA($ua)
{
  $dd = new DeviceDetector($ua);
  $dd->parse();
  $client = $dd->getClient();

  if (array_key_exists("name", $client) && !empty($client["name"])) {
    return $ua;
  }

  $uaResult = new WhichBrowser\Parser($ua);

  preg_match('/^[\w]+\/[^\s]+/', $ua, $initial_match);
  $beginning = $initial_match[0];
  $browser_name = $uaResult->browser->name;
  switch ($uaResult->browser->name) {
    case "Netscape Navigator":
      $browser_name = "Navigator";
      break;
    default:
      $browser_name = $uaResult->browser->name;
      break;
  }

  $engine = $uaResult->engine->name ?? "Gecko";

  preg_match('/\[([^\)]+)\]/', $ua, $lang_match);

  $lang = null;

  if ($lang_match && $lang_match[1]) {
    $lang = $lang_match[1];

    if ($lang === "en") {
      $lang = "en-US";
    }
  }

  $deets = null;
  preg_match('/\(([^\)]+)\)/', $ua, $deets_match);

  if ($deets_match && $deets_match[1]) {
    $deets = $deets_match[1];
    $parts = explode(";", $deets);
    $pos = count($parts) - 1;
    $result = array_merge(array_slice($parts, 0, $pos), array($lang), array_slice($parts, $pos));
    $deets = implode(", ", array_filter($result, function ($item) {
      return isset($item);
    }));
  }

  return "$beginning ($deets) {$engine}/20100101 $browser_name/{$uaResult->browser->version->toString()}";
}
