<div class="gallery-container">
  <?php foreach ($images as $i => $image) : ?>
    <a href="<?= getGalleryImage($image['src']); ?>" title=""><img src="<?= getGalleryThumbnail($image['src']); ?>" alt="<?= $this->e($image['text']); ?>" /></a>
  <?php endforeach; ?>
</div>