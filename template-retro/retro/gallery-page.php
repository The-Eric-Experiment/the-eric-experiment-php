<?php $this->layout(withVariant('layout'), ['title' => $this->e($name)]) ?>
<img src="/templates/retro/public/nothing.gif" width="1" height="5"><br><img src="/templates/retro/public/black_pixel.gif" width="100%" height="1"><br><img src="/templates/retro/public/nothing.gif" width="1" height="5"><br>
<center>
  <table bordercolordark="#000000" width="600" bordercolor="#000000" border="0">
    <tr>
      <td>
        <font face="arial" size="-1">
          <font size="2">
            <b>Gallery</b>
          </font><br>
          <font size="5">
            <b><?= $gallery["title"] ?></b>
          </font><br>
          <font size="3">
            <b><?= $page_title ?></b>
          </font><br>
          <img src="/templates/retro/public/black_pixel.gif" width="100%" height="1"><br>
          <center>
            <?php if ($previousImage != null) : ?>
              <a href="<?= $previousImage ?>">[previous image]</a>
            <?php endif; ?>
            <?php if ($nextImage != null) : ?>
              <a href="<?= $nextImage ?>">[next image]</a>
            <?php endif; ?><br>
            <img src="/templates/retro/public/nothing.gif" width="1" height="5"><br>
            <img src="<?= getGalleryImage($currentImage->url) ?>"><br>
            <img src="/templates/retro/public/nothing.gif" width="1" height="5"><br>
            <?php if ($previousImage != null) : ?>
              <a href="<?= $previousImage ?>">[previous image]</a>
            <?php endif; ?>
            <?php if ($nextImage != null) : ?>
              <a href="<?= $nextImage ?>">[next image]</a>
            <?php endif; ?>
          </center>
        </font>
      </td>
    </tr>
  </table>
</center>