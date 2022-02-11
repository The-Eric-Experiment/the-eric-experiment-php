<?php $this->layout(withVariant('layout'), ['title' => 'Posts']) ?>
<center>
  <h2>Posts - Page <?= $page ?></h2>
  <?php $this->insert(withVariant('categories')) ?>
  <br>
  <?php $this->insert(withVariant('post-list'), ['posts' => $posts, 'previous_page' => $previous_page, 'next_page' => $next_page]) ?>
  <br>
  <?php $this->insert(withVariant('categories')) ?>
</center>