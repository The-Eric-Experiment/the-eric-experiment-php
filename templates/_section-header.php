<?php $fontSize = 7 - $size; 
$id = $anchor ? str_replace("#", "", $anchor) : null;
?>
<?php if ($id) : ?>
  <a name="<?= $id; ?>"></a>
<?php endif; ?>
<?php echo '<h'.$size.'>'.$text.'</h'.$size.'>'; ?>