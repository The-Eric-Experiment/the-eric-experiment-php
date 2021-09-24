<?php $this->layout('modern::window', ['title' => 'Categories']) ?>

<div id="categories-widget">
  <?php foreach ($categories as $id => $category) : ?>
    <a href="/category?id=<?= $category->id ?>">
      <?= $this->e($category->name) ?>
    </a>
  <?php endforeach; ?>
  <span>C:\><span class="cursor">_</span></span>
</div>