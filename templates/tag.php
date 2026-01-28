<?php $this->layout('_layout', ['title' => $name]) ?>

<center>
  <h2>Tag: <?= $this->e($name) ?> - Page <?= $page ?></h2>
  <img src="/public/anibar.gif"><br>
  <?= $this->vertical_space() ?><br>
  <?php $this->insert('_categories') ?>
</center>

<?php $this->insert('_post-list') ?>

<center>
  <?php $this->insert('_categories') ?>
</center>