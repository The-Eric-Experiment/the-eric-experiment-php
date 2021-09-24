<?php $this->layout(withVariant('layout'), ['title' => 'Posts', 'showSideContent' => true]) ?>
<div class="content">
  <h1>Posts - Page <?= $page ?></h1>
  <?php $this->insert('modern::post-list', ['posts' => $posts]) ?>
</div>