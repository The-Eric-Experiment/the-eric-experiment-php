<?php

use UAParser\Parser;

$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? null;


if ($userAgent) {
  $parser = Parser::create();
  $parsedAgent = $parser->parse($userAgent);
}

function isOldBrowser()
{
  global $parsedAgent;

  if (!$parsedAgent) {
    return true;
  }

  $family = strtolower($parsedAgent->ua->family);
  $major = intval($parsedAgent->ua->major);

  if (($family == "firefox" || $family == "chrome") && $major < 50) {
    return true;
  }

  if ($family == "safari" && $major < 4) {
    return true;
  }

  if ($family == "opera" && $major < 60) {
    return true;
  }

  if ($family == "ie" || $family == "netscape" || $family == "other" || $family == "mozilla") {
    return true;
  }

  return false;
}

define('IS_OLD_BROWSER', isOldBrowser());
