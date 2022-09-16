<?php $this->layout(withVariant('layout'), ['title' => $this->e($name)]); ?>
<div class="content">
  <div class="posts-section">
    <div class="left-side">
      <?php $this->insert('modern::post-list', ['posts' => $posts, 'previous_page' => $previous_page, 'next_page' => $next_page, 'title' => "Category: {$this->e($name)}"]); ?>
    </div>
    <?php $this->insert('modern::side-content'); ?>
  </div>
</div>