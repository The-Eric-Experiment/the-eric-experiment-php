<table border="0" cellspacing="0" cellpadding="4" width="100%">
<tr><td>
    <table border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <img src="/public/newspaper.gif">
            </td>
            <td>
            <?= $this->horizontal_space() ?>
            </td>
            <td valign="middle">
                <font face="Arial, Helvetica, Microsoft Sans Serif" size="3"><b>Extra!</b></font>
            </td>
        </tr>
    </table>
    <img src="/public/linecolor.gif" width="100%" height="2">
    <br>
    <?= $this->vertical_space() ?><br>
    <?php
        $bullets = array('animated_bullet_009.gif', 'animated_bullet_011.gif', 'animated_bullet_014.gif');
        $count = 0;
    ?>
    <?php foreach ($news as $index => $item) : ?>
        <?php 
            $current_bullet = $count % count($bullets);
            $count++;
        ?>
        <table border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td valign="top">
                <?= $this->horizontal_space(2); ?><img src="/public/<?= $bullets[$current_bullet] ?>">&nbsp;
            </td>
            <td>
                <?= $this->text("[${item['date']}]", ['face' => 'Courier New, Arial, Times New Roman', 'size' => '3', 'bold' => true, 'color' => 'lime' ])?>
                <?= $this->text($item['content'], ['face' => 'Times New Roman', 'size' => '3' ])?>
            </td>
        </tr>
    </table>
    <?php $this->insert('_space'); ?>
    <?php endforeach; ?>
</td></tr>
<tr>
    <td align="center">
    <?php $this->vertical_space(); ?>
    </td>
</tr>
</table>