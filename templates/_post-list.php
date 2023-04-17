<?php
$total_width = 700;
$image_width = 143;
$arrow_column_width = 16;
$separator_column = 5;
$padding = 0;
$outer_padding = 5;
$description_column_width = $total_width - $image_width - $arrow_column_width - ($padding * 2) - ($outer_padding * 2) - ($separator_column * 2);
$separator_width = $total_width - ($outer_padding);
?>
<font face="times new roman">
<table bordercolordark="#000000" width="<?= $total_width ?>" bordercolor="#000000" border="0" bgcolor="#FFFFFF" cellspacing="0" cellpadding="<?= $outer_padding ?>" background="/public/Fine_Speckled0001A16B.gif">
	<?php
	$len = count($posts);
	$i = 0;
	$arrows = array("009", "011", "014");
	foreach ($posts as $post) : ?>
		<?php
		$isLast = $i == $len - 1;
		$arrow = $arrows[$i % count($arrows)];
		?>
		<tr>
			<td>
				<table width="<?= $total_width ?>" cellpadding="0" cellspacing="<?= $padding ?>" border="0">
					<tr>
						<td width="<?= $arrow_column_width ?>" valign="top"><img src="/public/nothing.gif" width="1" height="4"><br /><img src="/public/animated_bullet_<?= $arrow ?>.gif" border="0"></td>
						<td width="<?= $separator_column ?>"><img src="/public/nothing.gif" width="<?= $separator_column ?>" height="1"></td>
						<td width="<?= $description_column_width ?>" valign="top" align="left"><a href="/post/<?= $post->slug ?>"><font size="3" color="#000000"><b><?= $post->title ?></b></font></a><br /><img src="/public/nothing.gif" width="1" height="4"><br />
							<font size="-1" color="#000000"><?= $post->description ?></font>
						</td>
						<td width="<?= $separator_column ?>"><img src="/public/nothing.gif" width="<?= $separator_column ?>" height="1"></td>
						<td width="<?= $image_width ?>" valign="top"><a href="/post/<?= $post->slug ?>"><img src="<?= $post->image ?>" border="0" /></a></td>
					</tr>
				</table>
			</td>
		</tr>
		<?php if (!$isLast) : ?>
		<tr>
			<td align="center"><img src="/public/black_pixel.gif" width="<?= $separator_width ?>" height="1"></td>
		</tr><?php endif; ?><?php $i++ ?><?php endforeach; ?><tr>
		<td>
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
		</td>
	</tr>
</table>
</font>