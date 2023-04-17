<?php
$first = true;
foreach ($categories as $id => $category) : 
?><font size="-1"><?php if (!$first): ?>&nbsp;|&nbsp;<?php endif; $first = false;?><a href="/category?id=<?= $category->id ?>"><?= $this->e($category->name) ?></a></font><?php endforeach; ?>