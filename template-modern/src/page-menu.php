<div class="page-menu">
  <h2>Contents</h2>
  <ul>
    <?php foreach ($items as $item) : ?>
      <li>
        <img src="/templates/modern/public/animated_bullet_009.gif">
        <a href="<?= $this->e($item->url) ?>">
          <?= trim($item->content); ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>