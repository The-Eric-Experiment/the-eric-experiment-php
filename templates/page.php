<?php $this->layout('_layout', ['title' => $this->e($title)]); ?>

<table cellspacing="0" cellpadding="0" border="0" width="100%">
  <tr>
    <?php if (!empty($this->section('left-content'))) : ?>
      <td valign="top" width="20%">
        <?= $this->section('left-content'); ?>
      </td>
      <td width="20" valign="top">
        <img src="/public/nothing.gif" width="20" height="1">
      </td>
    <?php endif; ?>

    <td valign="top">
      <?= $this->section('content'); ?>
      <div id="disqus_thread"></div>
    </td>

    <?php if (!empty($this->section('right-content'))) : ?>
      <td width="20" valign="top">
        <img src="/public/nothing.gif" width="20" height="1">
      </td>
      <td valign="top" width="200">
        <?= $this->section('right-content'); ?>
      </td>
    <?php endif; ?>
  </tr>
</table>