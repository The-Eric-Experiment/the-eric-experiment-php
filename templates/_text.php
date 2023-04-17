<?php
    $size = empty($size) ? "" : " size=\"$size\"";
    $c = empty($color) ? '#000000' : $color;
    $color =  " color=\"$c\"";
    $face = empty($face) ? 'Arial,Microsoft Sans Serif' : $face;
?>

<font face="<?= $face ?>"<?= $size ?><?= $color?>>
    <?php if (!empty($bold) && $bold === true): ?><b><?php endif; ?>
        <?= $text ?>
    <?php if (!empty($bold) && $bold === true): ?></b><?php endif; ?>
</font>