<p>
  <?php foreach ($images as $i => $image) : ?>
    <?php
    $path_parts = pathinfo($image['src']);
    $new_filename = 'gallery-thumb-' . $path_parts['basename'];
    $new_path = $path_parts['dirname'] . '/' . $new_filename;
    ?>
    <a data-fslightbox="<?= $id; ?>" href="/gallery/<?= $id; ?>?img=<?= $i; ?>"><img src="<?= $new_path; ?>" border="0" /></a><img src="/public/nothing.gif" width="5" height="90" border="0">
    
    <?php if (($i + 1) % 7 == 0) : ?>
      <br>
      <?= $this->horizontal_space(); ?><br>
    <?php endif; ?>

  <?php endforeach; ?>
</p>
