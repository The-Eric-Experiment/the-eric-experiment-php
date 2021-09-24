<?php $this->layout('modern::layout', ['title' => $this->e($title)]) ?>
<?php if (!empty($this->section('left-content'))) : ?>
  <div class="side-content">
    <?= $this->section('left-content') ?>
  </div>
<?php endif; ?>

<div class="content page">
  <?= $this->section('content') ?>
  <div id="disqus_thread"></div>
</div>

<?php if (!empty($this->section('right-content'))) : ?>
  <div class="side-content">
    <?= $this->section('right-content') ?>
  </div>
<?php endif; ?>