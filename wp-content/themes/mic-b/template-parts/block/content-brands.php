<?php
/**
 * Block Name: Brands
 *
 * This is the template that displays the testimonial block.
 */

?>
<div class='brand-slider'>

	<?php

		if(have_rows('images')) {

			while(have_rows('images')) {

				the_row();
				$image = get_sub_field('image');

				?>
				<div>
					<!-- <img src="<?= $image['url']; ?>" class='brand-slider-logo-single'> -->
					<img src="<?= $image['sizes']['thumbnail']; ?>" class='brand-slider-logo-single'>
				</div>
				<?php

			}

		}

	?>

</div>