<?php
	/*Custom Post Type Setting*/
	add_action( 'init', 'offer_init', 1 );
	function offer_init() {
		$labels = array(
			'name'               => 'Offers',
			'singular_name'      => 'Offer Page',
			'menu_name'          => 'Offers',
			'name_admin_bar'     => 'Offers',
			'add_new'            => 'Add New Offer',
			'add_new_item'       => 'Add New Offer',
			'new_item'           => 'New Offer Page',
			'edit_item'          => 'Edit Offer',
			'view_item'          => 'View Offer',
			'all_items'          => 'All Offers',
			'search_items'       => 'Search Offers',
			'parent_item_colon'  => 'Parent Offer:',
			'not_found'          => 'No Offer found.',
			'not_found_in_trash' => 'No Offer found in Trash.',
		);
		$args = array(
			'menu_icon' 		 => 'dashicons-star-empty',
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'capability_type'    => 'post',
			'has_archive'        => true, /*false - no page slug conflic*/
			'rewrite'            => array('slug' => 'all-offers'),
			'hierarchical'       => true,
			'taxonomies'         => array('offer_category'),
			'menu_position'      => 21,
			'supports'           => array( 'title', 'editor', 'thumbnail'),
		);
		register_post_type( 'offer', $args );
	}
	/*Custom Post Type Category and Tags*/
	add_action( 'init', 'offer_category_init' );
	function offer_category_init() {
		$labels = array(
			'name'              => _x( 'Offer Categories', 'taxonomy general name' ),
			'singular_name'     => _x( 'Offer Category', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Offer Categories' ),
			'all_items'         => __( 'All Offer Categories' ),
			'parent_item'       => __( 'Parent Offer Category' ),
			'parent_item_colon' => __( 'Parent Offer Category:' ),
			'edit_item'         => __( 'Edit Offer Category' ),
			'update_item'       => __( 'Update Offer Category' ),
			'add_new_item'      => __( 'Add New Offer Category' ),
			'new_item_name'     => __( 'New Offer Category Name' ),
			'menu_name'         => __( 'Offer Categories' ),
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'offer_category' ),
		);
		register_taxonomy( 'offer_category', array( 'offer' ), $args );
		
		$labels = array(
			'name'              => _x( 'Offer Tags', 'taxonomy general name' ),
			'singular_name'     => _x( 'Offer Tag', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Offer Tags' ),
			'all_items'         => __( 'All Offer Tags' ),
			'parent_item'       => __( 'Parent Offer Tag' ),
			'parent_item_colon' => __( 'Parent Offer Tag:' ),
			'edit_item'         => __( 'Edit Offer Tag' ),
			'update_item'       => __( 'Update Offer Tag' ),
			'add_new_item'      => __( 'Add New Offer Tag' ),
			'new_item_name'     => __( 'New Offer Tag Name' ),
			'menu_name'         => __( 'Offer Tags' ),
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'offer_tag' ),
		);
		register_taxonomy( 'offer_tag', array( 'offer' ), $args );
	}
?>