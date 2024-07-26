<?= $this->text('The Experiment', ['face' => 'arial', 'size' => '4', 'bold' => true]) ?>
<br>
<img src="/public/linecolor.gif" width="430" height="2" class="home-linecolor">
<br>
<?= $this->vertical_space() ?>
<br>
<?php $this->insert("_categories"); ?>
<br>
<?= $this->vertical_space() ?>
<br><img src="/public/linecolor.gif" width="430" height="2" class="home-linecolor">
<?php foreach ($posts as $index => $post): ?>
    <?php
    $data = array_merge([], (array) $post);
    if ($index % 2 === 0) {
        $data['image_side'] = 'left';
    } else {
        $data['image_side'] = 'right';
    }
    ?>
    <?php $this->insert('_post-item', $data); ?>
<?php endforeach; ?>
<a href="/posts?page=1"><img src="/public/more_md_wht.gif" border="0"></a>