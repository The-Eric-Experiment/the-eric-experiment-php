<?php $this->layout('retro::layout', ['title' => $this->e($name)]) ?>
<center>
  <h2>Tag: <?= $this->e($name) ?></h2>
  <?php $this->insert('categories') ?>
  <img src="/templates/retro/public/nothing.gif" width="1" height="5"><br><img src="/templates/retro/public/black_pixel.gif" width="100%" height="1"><br><img src="/templates/retro/public/nothing.gif" width="1" height="5">
  <?php $this->insert('retro::post-list', ['posts' => $posts, 'previous_page' => $previous_page, 'next_page' => $next_page]) ?>
  <img src="/templates/retro/public/nothing.gif" width="1" height="5"><br><img src="/templates/retro/public/black_pixel.gif" width="100%" height="1"><br><img src="/templates/retro/public/nothing.gif" width="1" height="5">
  <?php $this->insert('retro::categories') ?>
</center>