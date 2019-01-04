<?php

	require "library/inc/gutenberg-support.php"; 

	add_action('acf/init', 'my_acf_init');
	function my_acf_init() {
		
		// check function exists
		if( function_exists('acf_register_block') ) {
			
			// register our acf blocks for gutenberg
			acf_register_block(array(
				'name'				=> 'brands',
				'title'				=> __('Brands'),
				'description'		=> __('A custom brand output block.'),
				'render_callback'	=> 'my_acf_block_render_callback',
				'category'			=> 'formatting',
				'icon'				=> 'admin-comments',
				'keywords'			=> array( ),
			));

			acf_register_block(array(
				'name'				=> 'hero',
				'title'				=> __('Hero'),
				'description'		=> __('A background image with a logo'),
				'render_callback'	=> 'my_acf_block_render_callback',
				'category'			=> 'formatting',
				'icon'				=> 'admin-comments',
				'keywords'			=> array( ),
			));	

			acf_register_block(array(
				'name'				=> 'projects',
				'title'				=> __('Projects'),
				'description'		=> __('Projects output'),
				'render_callback'	=> 'my_acf_block_render_callback',
				'category'			=> 'formatting',
				'icon'				=> 'admin-comments',
				'keywords'			=> array( ),
			));	

			acf_register_block(array(
				'name'				=> 'bio',
				'title'				=> __('Biography'),
				'description'		=> __('Biography output'),
				'render_callback'	=> 'my_acf_block_render_callback',
				'category'			=> 'formatting',
				'icon'				=> 'admin-comments',
				'keywords'			=> array( ),
			));	

		}
	}

	function my_acf_block_render_callback( $block ) {
		
		// convert name ("acf/testimonial") into path friendly slug ("testimonial")
		$slug = str_replace('acf/', '', $block['name']);
		
		// include a template part from within the "template-parts/block" folder
		if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
			include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
		}

	}

	function micbtheme_scripts() {
		
		wp_register_script( 'jquery', get_stylesheet_directory_uri() . '/library/js/jquery.js', array( ), '', true );
		wp_register_script( 'slick-js', get_stylesheet_directory_uri() . '/library/js/slick.js', array( 'jquery' ), '', true );
		wp_register_script( 'imagesloaded-js', get_stylesheet_directory_uri() . '/library/js/imagesloaded.js', array( 'jquery' ), '', true );
		wp_register_script( 'masonry-js', get_stylesheet_directory_uri() . '/library/js/masonry.js', array( 'jquery' ), '', true );
		wp_register_script( 'sparkle-js', get_stylesheet_directory_uri() . '/library/js/sparkle.js', array( 'jquery' ), '', true );
		wp_register_script( 'theme-js', get_stylesheet_directory_uri() . '/library/js/scripts.js?v=1.2', array( 'jquery' ), '', true );

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'slick-js' );
		wp_enqueue_script( 'imagesloaded-js' );
		wp_enqueue_script( 'masonry-js' );
		wp_enqueue_script( 'sparkle-js' );
		wp_enqueue_script( 'theme-js' );

	}

	add_action( 'wp_enqueue_scripts', 'micbtheme_scripts' );


	// Register Custom Post Type
	function add_project_post_type() {

		$labels = array(
			'name'                  => _x( 'Projects', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Projects', 'text_domain' ),
			'name_admin_bar'        => __( 'Project', 'text_domain' ),
			'archives'              => __( 'Item Archives', 'text_domain' ),
			'attributes'            => __( 'Item Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
			'all_items'             => __( 'All Items', 'text_domain' ),
			'add_new_item'          => __( 'Add New Item', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Item', 'text_domain' ),
			'edit_item'             => __( 'Edit Item', 'text_domain' ),
			'update_item'           => __( 'Update Item', 'text_domain' ),
			'view_item'             => __( 'View Item', 'text_domain' ),
			'view_items'            => __( 'View Items', 'text_domain' ),
			'search_items'          => __( 'Search Item', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
			'items_list'            => __( 'Items list', 'text_domain' ),
			'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Project', 'text_domain' ),
			'description'           => __( 'Projects', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'rewrite'               => false,
			'capability_type'       => 'page',
		);
		register_post_type( 'projects', $args );

	}

	add_action( 'init', 'add_project_post_type', 0 );
