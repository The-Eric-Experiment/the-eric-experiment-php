<table bordercolordark="#000000" width="100%" cellspacing="0" cellpadding="2" bordercolor="#000000" border="0" bgcolor="#FFFFFF" background="/templates/retro/public/Fine_Speckled0001A16B.gif">
  <tr>
    <td>
      <font size="4" color="#000000">
        <b>Contents</b>
      </font>
    </td>
  </tr>
  <?php foreach ($items as $item) : ?>
    <tr>
      <td>
        <a href="<?= $this->e($item->url) ?>">
          <img src="/templates/retro/public/animated_bullet_009.gif" border="0">
          <font size="-1" color="#1238b3"><?= trim($item->content); ?></font></a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>