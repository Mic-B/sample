<?php
/**
 * Block Name: Bio
 *
 * This is the template that displays the bio block.
 */
?>
<div class='custom-block-biography'>
	<img src='<?= get_field('image')['url']; ?>' class='custom-block-bio-image'>
	<div class='custom-block-biography-content'>
		<h1><?= get_field('title'); ?></h1>
		<br>
		<?= get_field('copy'); ?>
	</div>
	<span class='clear'></span>
</div>
