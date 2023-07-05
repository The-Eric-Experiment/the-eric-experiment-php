<p>
<a href="/post/<?=$slug?>">
    <img src="<?= $image ?>" alt="<?= $title ?>" width="80" border="0" align="<?= $image_side ?>">
</a>
<a href="/post/<?=$slug?>"><?= $this->text($title, ['bold' => true]) ?></a> - <?= $this->text($description, []) ?>
<br clear="ALL">
</p>

