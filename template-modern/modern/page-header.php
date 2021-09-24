<?php
$menu_length = count($mainMenu);
$first_half = ceil($menu_length);
$second_half = floor($menu_length);

echo var_dump($menu_length, $first_half, $second_half);
?>

<header>
  <div id="mainmenu">
    <div class="main-menu-mobile-button">
      <img src="/templates/modern/public/root-icon.png" alt="Menu" />
      Menu
    </div>
    <div class="mainmenu-content">
      <div class="mainmenu-row separator">
        <div class="anibar"></div>
      </div>
      <div class="mainmenu-row">
        <?php foreach ($mainMenu as $key => $item) : ?>
          <a class="menuitem" href="<?= $item->path ?>">
            <img src="<?= $item->icon ?>">
            <?= $item->label ?>
          </a>
        <?php endforeach; ?>
      </div>
      <div class="mainmenu-row separator">
        <div class="anibar"></div>
      </div>
    </div>
    <a href="#main-menu-toggle" class="backdrop" tabindex="-1" aria-hidden="true" hidden></a>
  </div>
  <div id="logo-container">
    <a class="logo-link" href="/">
      <img id="logo" src="/templates/modern/public/logo.png" title="Logo" />
    </a>
  </div>
</header>