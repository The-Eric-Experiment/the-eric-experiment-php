<?php
$menu_length = count($mainMenu);
$first_half = ceil($menu_length / 2);
$second_half = floor($menu_length / 2);

$left_menu = array_slice($mainMenu, 0, $first_half);
$right_menu = array_slice($mainMenu, $first_half);

function get_middle_point($arr)
{
    $length = count($arr);
    $arr_first_half = ceil($length / 2) - 1;
    $arr_second_half = floor($length / 2) - 1;

    $middle_point = [$arr_first_half];
    if ($arr_first_half === $arr_second_half) {
        $middle_point[] = $arr_first_half + 1;
    }

    return $middle_point;
}

$left_middle_point = get_middle_point($left_menu);
$right_middle_point = get_middle_point($right_menu);

$spacing = 0;

function get_spacing($middle_point, $index)
{
    global $spacing;
    if ($index === 0) {
        $spacing = 0;
    }

    $array_first_item = $middle_point[0];
    $array_last_item = $middle_point[count($middle_point) - 1];

    if ($array_first_item >= $index) {
        ++$spacing;
    }

    if ($array_last_item < $index) {
        --$spacing;
    }

    return $spacing;
}

?>
<header>
  <div id="header-content">
    <div class="mainmenu left">
      <div class="main-menu-content left">
        <?php foreach ($left_menu as $key => $item) : ?>
          <a class="menuitem spacing-<?php echo get_spacing($left_middle_point, $key); ?>" href="<?= $item->path; ?>">
            <?= $item->label; ?>
            <img src="<?= $item->icon; ?>">
          </a>
        <?php endforeach; ?>
      </div>
    </div>

    <div id="logo-container">
      <a class="logo-link" href="/">
        <img id="neon-logo" src="/templates/modern/public/neon-new.gif" title="Logo" />
      </a>
    </div>

    <div class="mainmenu">
      <div class="main-menu-mobile-button">
        <img src="/templates/modern/public/root-icon.png" alt="Menu" />
        Menu
      </div>
      <div class="main-menu-content right">
        <?php foreach ($left_menu as $key => $item) : ?>
          <a class="menuitem mobile" href="<?= $item->path; ?>">
            <img src="<?= $item->icon; ?>">
            <?= $item->label; ?>
          </a>
        <?php endforeach; ?>
        <?php foreach ($right_menu as $key => $item) : ?>
          <a class="menuitem spacing-<?php echo get_spacing($right_middle_point, $key); ?>" href="<?= $item->path; ?>">
            <img src="<?= $item->icon; ?>">
            <?= $item->label; ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <a href="#main-menu-toggle" class="backdrop" tabindex="-1" aria-hidden="true" hidden></a>
  <div class="anibar"></div>
</header>