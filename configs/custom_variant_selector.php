<?php

$isOldBrowser = IS_OLD_BROWSER;

return function () use ($isOldBrowser) {
  if ($isOldBrowser == true) {
    return "retro";
  }
  return 'modern';
};
