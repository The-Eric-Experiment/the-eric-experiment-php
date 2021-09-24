<?php
$per_row = 4;
$count = count($mainMenu);
$rows = ceil($count / 4);
$offset = 0;
?>
<table border="0" cellspacing="0" cellpadding="5">
  <?php for ($i = 1; $i <= $rows; $i++) : ?>
    <tr>
      <?php
      $slice = array_slice($mainMenu, $offset, $per_row);
      $slice_count = count($slice);
      $items_to_add = $per_row - $slice_count;

      if ($items_to_add > 0) {
        $empty_array = array_fill(0, $per_row - $slice_count, null);
        array_unshift($slice, ...$empty_array);
      }
      ?>

      <?php foreach ($slice as $item) : ?>
        <td align="center">
          <?php if ($item != null) : ?>
            <a href="<?= $item->path ?>"><img src="<?= $item->icon ?>" border="0"><br>
              <font size="-1"><?= $item->label ?></font>
            </a>
          <?php endif; ?>
        </td>
      <?php endforeach; ?>
    </tr>
    <?php $offset = $offset + $per_row; ?>
  <?php endfor; ?>
</table>