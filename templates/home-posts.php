<table border="0" cellspacing="0" cellpadding="4" width="100%" background="/public/specled.gif">
<tr><td>
    <font face="Arial,Microsoft Sans Serif" size="3"><b>The Experiment</b></font><br>
    <?php $this->insert("_categories"); ?>
    <?= $this->hline() ?>
    <?php foreach ($posts as $index => $post) : ?>
        <?php
            $data = array_merge([], (array)$post);
            if ($index === 0) {
                $data['image_side'] = 'left';
            }
            if ($index === 1) {
                $data['image_side'] = 'right';
            }
        ?>
        <?php $this->insert('_post-item', $data); ?>
        <?php if ($index < (count($posts) - 1)) { echo $this->hline(false); } ?>
    <?php endforeach; ?>
</td></tr>
<tr><td align="right">
    <a href="/posts?page=1"><img src="/public/more_md_wht.gif" border="0"></a>
</td></tr>
</table>