<font color="#ffffff"><h3>Tags</h3></font>
<?php 
$display_tags = array_filter($tags, function ($item){return $item->cnt > 1;}); 
$cols = 3;
$rows = ceil(count($display_tags) / $cols);
$cell_spacing = 4;
$width = 700 - ($cell_spacing * ($cols + 1));
?>
<table width="<?=$width?>" cellspacing="<?=$cell_spacing;?>" border="1" borderlight="#ffffff" borderdark="#ffffff" cellpadding="0">
<tr>
<?php for ($col_index = 0; $col_index < $cols; $col_index++) : ?>
<td>
<?php for ($row_index = 0; $row_index < $rows; $row_index++) : ?>
<?php $index = $row_index + ($col_index * $rows); ?>
<?php if ($index < count($display_tags)) : ?>
<?php $tag = $display_tags[$index] ?>
<a href="/tag?id=<?= $tag->id ?>"><?= $this->e($tag->name) ?> (<?= $tag->cnt ?>)</a><br>
<?php endif; ?>
<?php endfor; ?>
</td>
<?php endfor; ?>
</tr>
</table>