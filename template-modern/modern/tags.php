<div class="footer-row">
  <div id="tags">
    <?php shuffle($tags) ?>
    <?php foreach ($tags as $id => $tag) : ?>
      <?php
      $slugCount = count($tag->slugs);
      $maxNumber = 10;
      $fontSize = 3;
      $resultFontSize = ($fontSize * $slugCount) / $maxNumber;

      if ($resultFontSize < 0.8) {
        $resultFontSize = 0.8;
      }
      ?>
      <a href="/tag?id=<?= $tag->id ?>" class="tag" style="font-size: <?= $resultFontSize ?>rem">
        <?= $this->e($tag->name) ?> (<?= $slugCount ?>)
      </a>
    <?php endforeach; ?>
  </div>
</div>