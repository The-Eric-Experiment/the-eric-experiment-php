<table border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td>
            <img src="/public/tag.gif">
        </td>
        <td>
        <?= $this->vertical_space() ?>
        </td>
        <td valign="middle">
            <?= $this->text('Tags', ['size' => '3', 'face' => 'arial', 'bold' => true]) ?>
        </td>
    </tr>
</table>
<img src="/public/linecolor.gif" width="100%" height="2">
    <br>
    <?= $this->vertical_space() ?>
<?php
$display_tags = array_filter($tags, function ($item) { return $item->cnt > 1; });
$total_tags = count($display_tags);

for ($index = 0; $index < $total_tags; $index++) {
    $tag = $display_tags[$index];
    echo "<a href='/tag?id={$tag->id}'>" . $this->e($tag->name) . " ({$tag->cnt})</a>";
    if ($index < $total_tags - 1) {
        echo "&nbsp;&nbsp;";
    }
}
?>
