<?php
	/*Custom Post Type Setting*/
	add_action( 'init', 'news_init', 1 );
	function news_init() {
		$labels = array(
			'name'               => 'News',
			'singular_name'      => 'News Page',
			'menu_name'          => 'News',
			'name_admin_bar'     => 'News',
			'add_new'            => 'Add New News',
			'add_new_item'       => 'Add New News',
			'new_item'           => 'New News Page',
			'edit_item'          => 'Edit News',
			'view_item'          => 'View News',
			'all_items'          => 'All News',
			'search_items'       => 'Search News',
			'parent_item_colon'  => 'Parent News:',
			'not_found'          => 'No News found.',
			'not_found_in_trash' => 'No News found in Trash.',
		);
		$args = array(
			'menu_icon' 		 => 'dashicons-media-text',
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'capability_type'    => 'post',
			'has_archive'        => true, /*false - no page slug conflic*/
			'rewrite'            => array('slug' => 'all-news'),
			'hierarchical'       => true,
			'taxonomies'         => array('news_category'),
			'menu_position'      => 21,
			'supports'           => array( 'title', 'editor', 'thumbnail'),
		);
		register_post_type( 'news', $args );
	}
	/*Custom Post Type Category and Tags*/
	add_action( 'init', 'news_category_init' );
	function news_category_init() {
		$labels = array(
			'name'              => _x( 'News Categories', 'taxonomy general name' ),
			'singular_name'     => _x( 'News Category', 'taxonomy singular name' ),
			'search_items'      => __( 'Search News Categories' ),
			'all_items'         => __( 'All News Categories' ),
			'parent_item'       => __( 'Parent News Category' ),
			'parent_item_colon' => __( 'Parent News Category:' ),
			'edit_item'         => __( 'Edit News Category' ),
			'update_item'       => __( 'Update News Category' ),
			'add_new_item'      => __( 'Add New News Category' ),
			'new_item_name'     => __( 'New News Category Name' ),
			'menu_name'         => __( 'News Categories' ),
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'news_category' ),
		);
		register_taxonomy( 'news_category', array( 'news' ), $args );
		
		$labels = array(
			'name'              => _x( 'News Tags', 'taxonomy general name' ),
			'singular_name'     => _x( 'News Tag', 'taxonomy singular name' ),
			'search_items'      => __( 'Search News Tags' ),
			'all_items'         => __( 'All News Tags' ),
			'parent_item'       => __( 'Parent News Tag' ),
			'parent_item_colon' => __( 'Parent News Tag:' ),
			'edit_item'         => __( 'Edit News Tag' ),
			'update_item'       => __( 'Update News Tag' ),
			'add_new_item'      => __( 'Add New News Tag' ),
			'new_item_name'     => __( 'New News Tag Name' ),
			'menu_name'         => __( 'News Tags' ),
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'news_tag' ),
		);
		register_taxonomy( 'news_tag', array( 'News' ), $args );
	}
?>