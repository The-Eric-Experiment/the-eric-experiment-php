<table width="100%" cellspacing="0" cellpadding="0" border="0">
    <tr>
        <?php if (!empty($image_side) && $image_side === 'left') : ?>
        <td align="center" width="80" valign="top">
            <a href="/<?=$slug?>"><img src="<?= $image ?>" alt="<?= $title ?>" width="80" border="0"></a>
        </td>
        <td><img src="/public/nothing.gif" width="4"></td>
        <?php endif; ?>
        <td><b><a href="/<?=$slug?>"><?=$title?></a></b><br><?= $this->text($description, ['face' => 'Times New Roman', 'size' => '-1' ])?></td>
        <?php if (!empty($image_side) && $image_side === 'right') : ?>
        <td><img src="/public/nothing.gif" width="4"></td>
        <td align="center" width="80" valign="top">
            <a href="/<?=$slug?>"><img src="<?= $image ?>" alt="<?= $title ?>" width="80" border="0"></a>
        </td>
        <?php endif; ?>
    </tr>
</table>