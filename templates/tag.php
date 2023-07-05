<?php $this->layout('_layout') ?>

<center>
  <h2>Tag: <?= $this->e($name) ?> - Page <?= $page ?></h2>
  <img src="/public/anibar.gif"><br>
  <?= $this->vertical_space() ?><br>
  <?php $this->insert('_categories') ?>
</center>
<img src="/public/nothing.gif" width="1" height="5"><br><img src="/public/black_pixel.gif" width="100%" height="1"><br><img src="/public/nothing.gif" width="1" height="5">
<?php $this->insert('_post-list') ?>
<img src="/public/nothing.gif" width="1" height="5"><br><img src="/public/black_pixel.gif" width="100%" height="1"><br><img src="/public/nothing.gif" width="1" height="5">
<center>
  <?php $this->insert('_categories') ?>
</center>