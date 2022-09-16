<div class="page-menu">
  <h2>Contents</h2>
  <?php foreach ($items as $item) : ?>
    <div class="menu-item">
      <img src="/templates/modern/public/animated_bullet_009.gif">
      <a href="<?= $this->e($item['href']); ?>">
        <?= trim($item['text']); ?>
      </a>
    </div>
  <?php endforeach; ?>
</div>