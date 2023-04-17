<table border="0" cellspacing="0" cellpadding="4" width="100%" background="/public/specled.gif">
<tr><td>
    <font face="Arial,Microsoft Sans Serif" size="3"><b>What's New</b></font>
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
                <?= $this->horizontal_space(2); ?><img src="/public/<?= $bullets[$current_bullet] ?>">
            </td>
            <td>
                <?= $this->text("[${item['date']}]", ['face' => 'Courier New,Microsoft Sans Serif', 'size' => '-1', 'bold' => true ])?>
                <?= $this->text($item['content'], ['face' => 'Courier New,Microsoft Sans Serif', 'size' => '-1' ])?>
            </td>
        </tr>
    </table>
    <?php $this->insert('_space'); ?>
    <?php endforeach; ?>
</td></tr>
</table>