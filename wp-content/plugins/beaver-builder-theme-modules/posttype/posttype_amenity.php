<?php
	/*Custom Post Type Setting*/
	add_action( 'init', 'amenity_init', 1 );
	function amenity_init() {
		$labels = array(
			'name'               => 'Amenities',
			'singular_name'      => 'Amenity Page',
			'menu_name'          => 'Amenities',
			'name_admin_bar'     => 'Amenities',
			'add_new'            => 'Add New Amenity',
			'add_new_item'       => 'Add New Amenity',
			'new_item'           => 'New Amenity Page',
			'edit_item'          => 'Edit Amenity',
			'view_item'          => 'View Amenity',
			'all_items'          => 'All Amenities',
			'search_items'       => 'Search Amenities',
			'parent_item_colon'  => 'Parent Amenity:',
			'not_found'          => 'No Amenity found.',
			'not_found_in_trash' => 'No Amenity found in Trash.',
		);
		$args = array(
			'menu_icon' 		 => 'dashicons-store',
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'capability_type'    => 'post',
			'has_archive'        => true, /*false - no page slug conflic*/
			'rewrite'            => array('slug' => 'all-amenities'),
			'hierarchical'       => true,
			'taxonomies'         => array('amenity_category'),
			'menu_position'      => 21,
			'supports'           => array( 'title', 'editor', 'thumbnail'),
		);
		register_post_type( 'amenity', $args );
	}
	/*Custom Post Type Category and Tags*/
	add_action( 'init', 'amenity_category_init' );
	function amenity_category_init() {
		$labels = array(
			'name'              => _x( 'Amenity Categories', 'taxonomy general name' ),
			'singular_name'     => _x( 'Amenity Category', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Amenity Categories' ),
			'all_items'         => __( 'All Amenity Categories' ),
			'parent_item'       => __( 'Parent Amenity Category' ),
			'parent_item_colon' => __( 'Parent Amenity Category:' ),
			'edit_item'         => __( 'Edit Amenity Category' ),
			'update_item'       => __( 'Update Amenity Category' ),
			'add_new_item'      => __( 'Add New Amenity Category' ),
			'new_item_name'     => __( 'New Amenity Category Name' ),
			'menu_name'         => __( 'Amenity Categories' ),
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'amenity_category' ),
		);
		register_taxonomy( 'amenity_category', array( 'amenity' ), $args );
		
		$labels = array(
			'name'              => _x( 'Amenity Tags', 'taxonomy general name' ),
			'singular_name'     => _x( 'Amenity Tag', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Amenity Tags' ),
			'all_items'         => __( 'All Amenity Tags' ),
			'parent_item'       => __( 'Parent Amenity Tag' ),
			'parent_item_colon' => __( 'Parent Amenity Tag:' ),
			'edit_item'         => __( 'Edit Amenity Tag' ),
			'update_item'       => __( 'Update Amenity Tag' ),
			'add_new_item'      => __( 'Add New Amenity Tag' ),
			'new_item_name'     => __( 'New Amenity Tag Name' ),
			'menu_name'         => __( 'Amenity Tags' ),
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'amenity_tag' ),
		);
		register_taxonomy( 'amenity_tag', array( 'amenity' ), $args );
	}
?>