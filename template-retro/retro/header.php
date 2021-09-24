<?php $fontSize = 7 - $size; ?>
<font face="arial" size="<?= $fontSize ?>">
  <?php if ($id) : ?>
    <a name="<?= $id ?>"></a>
  <?php endif; ?>
  <b id="<?= $id ?>">
    <?= $content ?>
  </b>
</font>
<br>