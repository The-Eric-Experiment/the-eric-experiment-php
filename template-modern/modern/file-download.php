<div class="file-download">
  <div class="file-download-header">
    <h4 id="<?= $id; ?>"><?= $this->e($name); ?></h4>
    <div class="download-link">
      <a class="download-link" href="<?= $url; ?>" target="_blank">
        <img src="/templates/modern/public/floppy.gif" alt="Download">
        <?= $file; ?>
      </a>
    </div>
  </div>
  <?= html_entity_decode($description); ?>
</div>