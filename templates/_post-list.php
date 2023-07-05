<?php foreach ($posts as $index => $post) : ?>
    <?php
        $data = array_merge([], (array)$post);
		$data['image_side'] = 'left';
    ?>
    <?php $this->insert('_post-item', $data); ?>
<?php endforeach; ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<?php if ($previous_page != null) : ?>
			<td>
				<a href="<?= $previous_page ?>"><img src="/public/arrow_text1_left.gif" border="0"></a>
			</td>
		<?php endif; ?>
		<?php if ($next_page != null) : ?>
			<td align="right"><?php if ($custom_next_link) : ?><a href="<?= $custom_next_link["url"] ?>"><img src="<?= $custom_next_link["icon"] ?>" border="0"></a><?php else : ?><a href="<?= $next_page ?>"><img src="/public/arrow_text1_right.gif" border="0"></a><?php endif; ?></td>
		<?php endif; ?>
	</tr>
</table>