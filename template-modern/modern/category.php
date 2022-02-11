<?php $this->layout(withVariant('layout'), ['title' => $this->e($name), 'showSideContent' => true]) ?>
<div class="content">
  <h1>Category: <?= $this->e($name) ?></h1>
  <?php $this->insert('modern::post-list', ['posts' => $posts, 'previous_page' => $previous_page, 'next_page' => $next_page]) ?>
</div>