<table cellspacing="1" border="0" cellpadding="2" width="100%">
  <tr>
    <td bgcolor="#777777">
      <font size="-1" face="arial"><b><a name="<?= $id; ?>"></a><?= $this->e($name); ?></b></font>
    </td>
    <td bgcolor="#777777" align="right" valign="top">
      <a href="${url}" target="_blank"><img src="/public/floppy.gif" alt="Download" border="0"><img src="/public/nothing.gif" width="5" height="12" border="0"></a>
      <a href="<?= $url; ?>" target="_blank"><font size="2" face="arial"><?= $file; ?></font></a>
    </td>
  </tr>
  <tr>
    <td bgcolor="#777777" colspan="2">
      <font size="-1">
        <?= html_entity_decode($description); ?>
      </font>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <img src="/public/nothing.gif" width="10" height="2">
    </td>
  </tr>
</table>