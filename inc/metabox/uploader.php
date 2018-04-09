<div class="meta-box-item-title">
	<p><?= $name; ?></p>
</div>

<div class="meta-box-item-content">
	<?php if(!empty($value)): ?>
	<a href="<?= $value; ?>" class="thickbox" style="display: block;">
		<img src="<?= $value; ?>" style="max-width: 200px; max-height: 200px; vertical-align: middle;">
	</a>
	<?php endif; ?>
	<input type="text" name="<?= $id; ?>" id="<?= $id; ?>" value="<?= $value ?>">
	<a href="#" class="button js-uploader" data-id="<?= $id ?>" data-multiple="true">
		Ajouter un screenshot
	</a>
</div>


<?php
/* 

reprendre image a la une


<span class="dashicons dashicons-format-image"></span> 
https://developer.wordpress.org/resource/dashicons/#format-image


 */ 
?>