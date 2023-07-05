<?php
$first = true;
foreach ($categories as $id => $category) : 
?>
<?php if (!$first): ?>
    <font size="-1"> | </font>
    <?php endif; $first = false;?>
    <a href="/category?id=<?= $category->id ?>"><?= $this->text($category->name, ['face' => 'arial', 'size' => '-1', 'bold' => true]) ?></a>
<?php endforeach; ?>