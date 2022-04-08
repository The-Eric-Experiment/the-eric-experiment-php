<table cellspacing="2" cellpadding="0" width="100%" border="0">
    <tr>
        <td valign="center" width="70">
            <img src="/templates/retro/public/newspaper.gif" alt="extra">&nbsp;
        </td>
        <td valign="center" align="left">
            <font size="6"><strong>Extra!</strong></font>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <?php
                $arrows = array(
                    "animated_bullet_009.gif",
                    "animated_bullet_011.gif",
                    "animated_bullet_014.gif",
                );
                $count = count($arrows);
            ?>
            <?php foreach (SITE_NEWS as $key=>$news) : ?>
                <table cellspacing="2" cellpadding="0" width="100%" border="0">
                    <tr>
                        <td valign="top"><img src="/templates/retro/public/nothing.gif" width="1" height="5"><br><img src="/templates/modern/public/<?= $arrows[$key % $count] ?>"></td>
                        <td valign="top">
                            <font color="#00FF00">[<?= $news["date"] ?>]</font>&nbsp;<font color="#ffbf00"><?= $news["content"] ?></font?>
                        </td>
                    </tr>
                </table>
            <?php endforeach; ?>
        </td>
    </tr>
</table>
