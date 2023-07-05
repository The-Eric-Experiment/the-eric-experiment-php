<?php
    $size = empty($size) ? "" : " size=\"$size\"";
    if (!empty($face) && $face === 'arial') {
        $face = 'face="Arial,Microsoft Sans Serif"';
    } else if (!empty($face)) {
        $face = "face=\"$face\"";
    } else {
        $face = '';
    }

    if (!empty($color) && $color === 'orange') {
        $color = ' color="#ffbf00"';
    } else if (!empty($color)) {
        $color = " color=\"$color\"";
    } else {
        $color = '';
    }
?>
<font <?= $face ?><?= $size ?><?= $color?>><?php if (!empty($bold) && $bold === true): ?><b><?php endif; ?><?= $text ?><?php if (!empty($bold) && $bold === true): ?></b><?php endif; ?></font>