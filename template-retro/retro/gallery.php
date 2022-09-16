<p>
  <?php foreach ($images as $i => $image) : ?>
    <a href="/gallery/<?= $id; ?>?img=<?= $i; ?>"><img src="<?= getGalleryThumbnail($image['src']); ?>" border="0" /><img src="/templates/retro/public/nothing.gif" width="5" height="90" border="0"></a>
  <?php endforeach; ?>
</p>