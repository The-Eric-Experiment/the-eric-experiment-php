<div class="gallery-container">
  <?php foreach ($images as $i => $image) : ?>
    <a href="<?= getGalleryImage($image->url) ?>" title=""><img src="<?= getGalleryThumbnail($image->url) ?>" alt="" /></a>
  <?php endforeach; ?>
</div>