<?php $this->layout('_layout', ['title' => 'Posts']) ?>
<center>
  <h2>Posts - Page <?= $page ?></h2>
  <img src="/public/anibar.gif"><br>
  <?= $this->vertical_space() ?><br>
  <?php $this->insert('_categories') ?>
</center>
<img src="/public/nothing.gif" width="1" height="5"><br><img src="/public/black_pixel.gif" width="100%" height="1"><br><img src="/public/nothing.gif" width="1" height="5">
<?php $this->insert('_post-list', ['posts' => $posts, 'previous_page' => $previous_page, 'next_page' => $next_page]) ?>
<img src="/public/nothing.gif" width="1" height="5"><br><img src="/public/black_pixel.gif" width="100%" height="1"><br><img src="/public/nothing.gif" width="1" height="5">
<center>
  <?php $this->insert('_categories') ?>
</center>