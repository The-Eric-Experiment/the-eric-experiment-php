<?php
$len = count($tags);
$i = 0;
?>
<?php foreach ($tags as $id => $tag) : ?>
  <?php $isLast = $i == $len - 1; ?>
  <a href="/tag?id=<?= $tag->id ?>"><?= $this->e($tag->name) ?> (<?= $tag->cnt ?>)</a>
  <?php if (!$isLast) : ?>
    |
  <?php endif; ?>
  <?php $i++ ?>
<?php endforeach; ?>
<br><br>