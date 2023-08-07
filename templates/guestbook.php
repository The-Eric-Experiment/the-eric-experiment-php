<?php $this->layout('_layout', []) ?>
<!-- Comment form -->
<h1>Guestbook</h1>
<?php if (!empty($errors)): ?>
    <?php foreach ($errors as $error): ?>
        <p style="color: red;"><?= $error; ?></p>
    <?php endforeach; ?>
<?php endif; ?>
<form name="guestbook" method="POST" action="/guestbook">
<table cellspacing="0" cellpadding="2" border="0" width="100%" height="1px">
    <tr><td colspan="2"><img src="/public/anibar.gif" width="100%"></td></tr>

    <?php if (count($form_errors) > 0) : ?>
      <tr>
        <td align="left" colspan="2">
          <font size="2" face="arial,helvetica"><b>Whoops, there are some issues with the info given.</b></font>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <ul>
            <?php foreach ($form_errors as $key => $value) : ?>
              <li>
                <font size="2" face="arial,helvetica" color="red"><?= $value; ?></font>
              </li>
            <?php endforeach; ?>
          </ul>
        </td>
      <?php endif; ?>

    <tr><td valign="top">I go by:</td><td><input type="text" name="<?= $this->getFieldName('name'); ?>" size="40" required></td></tr>
    <tr><td valign="top">I shall say:</td><td><textarea name="<?= $this->getFieldName('message'); ?>" cols="40" rows="3" required></textarea></td></tr>
    <tr><td></td><td>Don't be shy, tell us a bit about yourself!</td></tr>
    <tr><td valign="top">Are you even human?</td><td><input type="text" name="<?= $this->getFieldName('captcha') ?>" required></td></tr>
    <tr><td></td><td>Enter <?= $_SESSION['captchaValue']; ?> plus the current day of the month in the west coast of 'murica</td></tr>
    <tr><td></td><td><input type="submit" value="Send!"></td></tr>
    <tr><td colspan="2"><img src="/public/anibar.gif" width="100%" height="1px"></td></tr>
</table>
</form>

<h2>Messages</h2>
<?php foreach ($message_list as $key => $row) : ?>
    <font size="-1" face="arial,helvetica"><b><?= htmlspecialchars($row['nickname']); ?></b>&nbsp;said:</font><br>
    <?= htmlspecialchars($row['message']); ?><br>
    <font size="-2" face="arial,helvetica" color="#777777"><?= $this->formatDate($row['created']); ?>&nbsp;|&nbsp;From:&nbsp;<b><?= $this->getBrowserInfo($row['userAgent']); ?></b></font><br>
  <?php if (++$counter < $num_results) : ?>
    <hr width="100%" />
  <?php endif; ?>
<?php endforeach; ?>
<br>
<font face="arial,helvetica" size="-1">
  <?php if ($page > 1) : ?><a href="<?= $this->getPageUrl($page - 1); ?>">&lt;&lt; Previous </a> - <?php endif; ?>
  Page <?= $page; ?>
  <?php if ($page < $pages) : ?> -
    <a href="<?= $this->getPageUrl($page + 1); ?>">Next &gt;&gt;</a><?php endif; ?>
</font>
<br>


