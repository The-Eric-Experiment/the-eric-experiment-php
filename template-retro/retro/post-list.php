<table bordercolordark="#000000" width="600" bordercolor="#000000" border="0" bgcolor="#FFFFFF" cellspacing="0" cellpadding="5" background="/templates/retro/public/Fine_Speckled0001A16B.gif">
  <tr>
    <td>
      <?php
      $len = count($posts);
      $i = 0;
      ?>
      <?php foreach ($posts as $post) : ?>
        <?php $isLast = $i == $len - 1; ?>
        <?php $image = getPostThumbnail($post->image) ?>
        <table width="600" cellpadding="0" cellspacing="5" border="0">
          <tr>
            <td width="143">
              <a href="/post/<?= $post->slug ?>">
                <img src="<?= $image ?>" border="0" /></a>
            </td>
            <td width="447" valign="top" align="left">
              <table cellpadding="0" cellspacing="5" border="0">
                <tr>
                  <td>
                    <a href="/post/<?= $post->slug ?>">
                      <font size="3" color="#000000">
                        <b><?= $post->title ?></b>
                      </font>
                    </a>
                  </td>
                </tr>
                <tr>
                  <td>
                    <font size="-1" color="#000000">
                      <?= $post->description ?>
                    </font>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <?php if (!$isLast) : ?>
          <hr>
        <?php endif; ?>
        <?php $i++ ?>
      <?php endforeach; ?>
    </td>
  </tr>
  <tr>
    <td>
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <?php if ($previous_page != null) : ?>
            <td>
              <a href="<?= $previous_page ?>"><img src="/templates/retro/public/arrow_text1_left.gif" border="0"></a>
            </td>
          <?php endif; ?>
          <?php if ($next_page != null) : ?>
            <td align="right">
              <?php if ($custom_next_link) : ?>
                <a href="<?= $custom_next_link["url"] ?>"><img src="<?= $custom_next_link["icon"] ?>" border="0"></a>
              <?php else : ?>
                <a href="<?= $next_page ?>"><img src="/templates/retro/public/arrow_text1_right.gif" border="0"></a>
              <?php endif; ?>
            </td>
          <?php endif; ?>
        </tr>
      </table>
    </td>
  </tr>
</table>