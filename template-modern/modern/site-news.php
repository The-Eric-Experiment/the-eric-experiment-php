<?php $this->layout('modern::window', ['hide_titlebar' => true]); ?>
<div class="site-news">
    <div class="header">
        <img src="/templates/modern/public/newspaper.gif" alt="extra">
        Extra!
    </div>
    <div class="content">
        <?php
            $arrows = [
                'animated_bullet_009.gif',
                'animated_bullet_011.gif',
                'animated_bullet_014.gif',
            ];
            $count = count($arrows);
        ?>
        <?php foreach (SITE_NEWS as $key => $news) : ?>
            <div class="item">
                <div class="arrow"><img src="/templates/modern/public/<?= $arrows[$key % $count]; ?>"></div>
                <div class="item-content">
                    <span class="date">[<?= $news['date']; ?>]</span>
                    <?= $news['content']; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>