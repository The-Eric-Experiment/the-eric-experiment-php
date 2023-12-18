<?php

use DeviceDetector\DeviceDetector;
use DeviceDetector\Parser\Device\AbstractDeviceParser;

// OPTIONAL: Set version truncation to none, so full versions will be returned
// By default only minor versions will be returned (e.g. X.Y)
// for other options see VERSION_TRUNCATION_* constants in DeviceParserAbstract class
AbstractDeviceParser::setVersionTruncation(AbstractDeviceParser::VERSION_TRUNCATION_NONE);

function joinPaths(...$parts)
{
  $path = join('/', array_map(function ($item) {
    return trim($item, '/');
  }, $parts));

  if (substr($parts[0], 0, 1) === "/") {
    return '/' . $path;
  }

  return $path;
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

function getPostParam(string $name, string $default = null)
{
    $val = $_POST[$name] ?? null;
    if (!$val) {
        return $default;
    }

    return strip_tags($val);
}

function getParam(string $name, string $default = null)
{
    $val = $_GET[$name] ?? null;
    if (!$val) {
        return $default;
    }

    return strip_tags($val);
}
