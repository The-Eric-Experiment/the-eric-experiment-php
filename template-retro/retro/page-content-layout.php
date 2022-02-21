<?php $this->layout('retro::layout', ['title' => $this->e($title)]) ?>

<img src="/templates/retro/public/nothing.gif" width="1" height="5"><br><img src="/templates/retro/public/black_pixel.gif" width="100%" height="1"><br><img src="/templates/retro/public/nothing.gif" width="1" height="5"><br>

<table cellspacing="0" cellpadding="0" border="0" width="100%">
  <tr>
    <?php if (!empty($this->section('left-content'))) : ?>
      <td valign="top" width="20%">
        <?= $this->section('left-content') ?>
      </td>
      <td width="20" valign="top">
        <img src="/templates/retro/public/nothing.gif" width="20" height="1">
      </td>
    <?php endif; ?>

    <td valign="top">
      <font size="-1">
        <?= $this->section('content') ?>
      </font>
    </td>

    <?php if (!empty($this->section('right-content'))) : ?>
      <td width="20" valign="top">
        <img src="/templates/retro/public/nothing.gif" width="20" height="1">
      </td>
      <td valign="top" width="200">
        <?= $this->section('right-content') ?>
      </td>
    <?php endif; ?>
  </tr>
</table>