<?php $fontSize = 7 - $size; 
$id = $anchor ? str_replace("#", "", $anchor) : null;
?>
<font face="arial" size="<?= $fontSize; ?>">
  <?php if ($id) : ?>
    <a name="<?= $id; ?>"></a>
  <?php endif; ?>
  <b id="<?= $id; ?>">
    <?= $text; ?>
  </b>
</font>
<br>