<?php $this->layout('_layout', ['title' => $this->e($name)]); ?>
<center>
<img src="/public/nothing.gif" width="1" height="5"><br><img src="/public/black_pixel.gif" width="100%" height="1"><br><img src="/public/nothing.gif" width="1" height="5"><br>
<font size="2">
  <b>Gallery</b>
</font><br>
<font size="5">
  <b><?= $gallery['title']; ?></b>
</font><br>
<font size="3">
  <b><?= $page_title; ?></b>
</font><br>
<img src="/public/black_pixel.gif" width="100%" height="1"><br>
  <?php if ($previousImage != null) : ?>
    <a href="<?= $previousImage; ?>"><img src="/public/ham_prev.gif" border="0"></a>
  <?php endif; ?>
  <?php if ($nextImage != null && $nextImage != null) : ?>
    <?= $this->horizontal_space(100); ?>
  <?php endif; ?>
  <?php if ($nextImage != null) : ?>
    <a href="<?= $nextImage; ?>"><img src="/public/ham_next.gif" height="27" border="0"></a>
  <?php endif; ?><br>
  <img src="/public/nothing.gif" width="1" height="5"><br>
  <img src="<?= $currentImage['src']; ?>"><br>
  <img src="/public/nothing.gif" width="1" height="5"><br>
  <?php if ($previousImage != null) : ?>
    <a href="<?= $previousImage; ?>"><img src="/public/ham_prev.gif" border="0"></a>
  <?php endif; ?>
  <?php if ($nextImage != null && $nextImage != null) : ?>
    <?= $this->horizontal_space(100); ?>
  <?php endif; ?>
  <?php if ($nextImage != null) : ?>
    <a href="<?= $nextImage; ?>"><img src="/public/ham_next.gif" height="27" border="0"></a>
  <?php endif; ?>
</center>