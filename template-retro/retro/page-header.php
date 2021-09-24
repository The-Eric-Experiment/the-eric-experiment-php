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

  $middle_point = array($arr_first_half);
  if ($arr_first_half === $arr_second_half) {
    $middle_point[] = $arr_first_half + 1;
  }

  return $middle_point;
}

$left_middle_point = get_middle_point($left_menu);
$right_middle_point = get_middle_point($right_menu);

$spacing = -1;

function get_spacing($middle_point, $index)
{
  global $spacing;
  if ($index === 0) {
    $spacing = -1;
  }

  $array_first_item = $middle_point[0];
  $array_last_item = $middle_point[count($middle_point) - 1];

  if ($array_first_item >= $index) {
    $spacing++;
  }

  if ($array_last_item < $index) {
    $spacing--;
  }

  return $spacing;
}

?>

<center>
  <table cellspacing="2" cellpadding="0" border="0" width="610">
    <tr>
      <td align="right" valign="center" width="156">
        <?php foreach ($left_menu as $key => $item) : ?>
          <table cellspacing="0" cellpadding="0" border="0">
            <tr>
              <td align="right" valign="center">
                <a href="<?= $item->path ?>">
                  <?= $item->label ?>
                </a>
              </td>
              <td>
                <img src="/templates/retro/public/nothing.gif" width="4" height="1" borde="0">
              </td>
              <td align="right" valign="center">
                <a href="<?= $item->path ?>">
                  <img src="/templates/retro/public/nothing.gif" width="1" height="5" borde="0"><br>
                  <img src="<?= $item->icon ?>" borde="0">
                </a>
              </td>
              <td>
                <img src="/templates/retro/public/nothing.gif" width="<?php echo get_spacing($left_middle_point, $key) * 10; ?>" height="1" borde="0">
              </td>
            </tr>
          </table>
        <?php endforeach; ?>
      </td>
      <td valign="center" align="center" width="297"><a href="/"><img src="/templates/retro/public/logo-small.gif" alt="The Eric Experiment" border="0"></a></td>
      <td align="left" valign="center" width="156" height="100%">
        <?php foreach ($right_menu as $key => $item) : ?>
          <table cellspacing="0" cellpadding="0" border="0">
            <tr>
              <td>
                <img src="/templates/retro/public/nothing.gif" width="<?php echo get_spacing($right_middle_point, $key) * 10; ?>" height="1" borde="0">
              </td>
              <td align="left" valign="center">
                <a href="<?= $item->path ?>">
                  <img src="/templates/retro/public/nothing.gif" width="1" height="5" borde="0"><br>
                  <img src="<?= $item->icon ?>" borde="0">
                </a>
              </td>
              <td>
                <img src="/templates/retro/public/nothing.gif" width="4" height="1" borde="0">
              </td>
              <td align="left" valign="center">
                <a href="<?= $item->path ?>">
                  <?= $item->label ?>
                </a>
              </td>
            </tr>
          </table>
        <?php endforeach; ?>
      </td>
    </tr>
  </table>
  <br>
  <img src="/templates/retro/public/anibar.gif">
  <br>
</center>