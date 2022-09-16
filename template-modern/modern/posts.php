<?php $this->layout(withVariant('layout'), ['title' => 'Posts']); ?>
<div class="content">
  <h1>Posts - Page <?= $page; ?></h1>
  <?php $this->insert('modern::post-list', ['posts' => $posts, 'previous_page' => $previous_page, 'next_page' => $next_page]); ?>
</div>