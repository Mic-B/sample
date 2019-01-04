<?php
/**
 * Block Name: Brands
 *
 * This is the template that displays the testimonial block.
 */

?>
<div class='project-masonry' style='background-image:url(<?= get_field('background_image')['url']; ?>);'>

	<img src='<?= get_field('title_image')['url']; ?>' class='custom-block-project-masonry-logo-text'>

	<div class='filter-bar'>
		<img data-type='web' class='mason-filter' id='btn-web' src='<?php echo get_template_directory_uri(); ?>/library/images/btn-tiny-web.png'>
		<img data-type='media' class='mason-filter' id='btn-media' src='<?php echo get_template_directory_uri(); ?>/library/images/btn-tiny-media.png'>
		<img data-type='all' class='mason-filter' id='btn-all' src='<?php echo get_template_directory_uri(); ?>/library/images/btn-tiny-all.png'>
	</div>

	<div class='project-masonry-item-bucket'>

		<div class="grid-sizer"></div>

		<?php

			$posts = get_posts([
				'post_type' => 'projects',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'orderby' => 'rand',
				'order'    => 'ASC'
			]);

			// var_dump($posts);

			foreach ($posts as $single_post) {
			
				?>
				<div class='project-masonry-item post-<?php echo get_field('project_link_type',$single_post->ID); ?>'>
					<a href='<?php echo get_field('project_link',$single_post->ID); ?>' target='_blank' rel='nofollow'>
						<div class='project-masonry-interior'>
							<div class='project-masonry-title'>
								<h3><?php echo $single_post->post_title; ?></h3>
								<h6><?php echo get_field('project_role',$single_post->ID); ?></h6>
							</div>
							<img src="<?php echo get_field('project_image',$single_post->ID)['sizes']['medium']; ?>">
						</div>
					</a>
				</div>
				<?php
			
			}

		?>

	</div>

</div>