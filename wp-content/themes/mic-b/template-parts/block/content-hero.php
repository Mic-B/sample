<?php
/**
 * Block Name: Hero
 *
 * This is the template that displays the testimonial block.
 */


$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>
<div id='logo-hero' class='custom-block-hero' style='background-image:url(<?= get_field('background_image')['url']; ?>)'>
	<div class='custom-block-hero-logo-text-wrapper'>
		<img src='<?= get_field('logo_image')['url']; ?>' class='custom-block-hero-logo-text'>
	</div>
	<img src='<?= get_field('subtext_image')['url']; ?>' class='custom-block-hero-subtext'>
</div>