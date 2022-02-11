<div class="footer-row">
  <div id="tags">
    <?php shuffle($tags) ?>
    <?php foreach ($tags as $id => $tag) : ?>
      <?php
      $slugCount = $tag->cnt;
      $maxNumber = 10;
      $fontSize = 3;
      $resultFontSize = ($fontSize * $slugCount) / $maxNumber;
      $paddingBottom = $resultFontSize * 2;

      if ($resultFontSize < 0.8) {
        $resultFontSize = 0.8;
        $paddingBottom = 0;
      }

      if ($resultFontSize > 2.5) {
        $resultFontSize = 2.5;
        $paddingBottom = 5;
      }

      ?>
      <div class="tag">
        <a href="/tag?id=<?= $tag->id ?>" style="font-size: <?= $resultFontSize ?>rem; padding-bottom: <?= $paddingBottom ?>px">
          <?= $this->e($tag->name) ?> (<?= $slugCount ?>)
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</div>