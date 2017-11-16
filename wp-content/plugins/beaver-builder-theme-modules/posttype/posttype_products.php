<?php
	/*Custom Post Type Setting*/
	add_action( 'init', 'product_init', 1 );
	function product_init() {
		$labels = array(
			'name'               => 'Products',
			'singular_name'      => 'Product Page',
			'menu_name'          => 'Products',
			'name_admin_bar'     => 'Products',
			'add_new'            => 'Add New Product',
			'add_new_item'       => 'Add New Product',
			'new_item'           => 'New Product Page',
			'edit_item'          => 'Edit Product',
			'view_item'          => 'View Product',
			'all_items'          => 'All Products',
			'search_items'       => 'Search Products',
			'parent_item_colon'  => 'Parent Product:',
			'not_found'          => 'No Product found.',
			'not_found_in_trash' => 'No Product found in Trash.',
		);
		$args = array(
			'menu_icon' 		 => 'dashicons-cart',
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'capability_type'    => 'post',
			'has_archive'        => true, /*false - no page slug conflic*/
			'rewrite'            => array('slug' => 'all-products'),
			'hierarchical'       => true,
			'taxonomies'         => array('product_category'),
			'menu_position'      => 21,
			'supports'           => array( 'title', 'editor', 'thumbnail'),
		);
		register_post_type( 'product', $args );
	}
	/*Custom Post Type Category and Tags*/
	add_action( 'init', 'product_category_init' );
	function product_category_init() {
		$labels = array(
			'name'              => _x( 'Product Categories', 'taxonomy general name' ),
			'singular_name'     => _x( 'Product Category', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Product Categories' ),
			'all_items'         => __( 'All Product Categories' ),
			'parent_item'       => __( 'Parent Product Category' ),
			'parent_item_colon' => __( 'Parent Product Category:' ),
			'edit_item'         => __( 'Edit Product Category' ),
			'update_item'       => __( 'Update Product Category' ),
			'add_new_item'      => __( 'Add New Product Category' ),
			'new_item_name'     => __( 'New Product Category Name' ),
			'menu_name'         => __( 'Product Categories' ),
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'product_category' ),
		);
		register_taxonomy( 'product_category', array( 'product' ), $args );
		
		$labels = array(
			'name'              => _x( 'Product Tags', 'taxonomy general name' ),
			'singular_name'     => _x( 'Product Tag', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Product Tags' ),
			'all_items'         => __( 'All Product Tags' ),
			'parent_item'       => __( 'Parent Product Tag' ),
			'parent_item_colon' => __( 'Parent Product Tag:' ),
			'edit_item'         => __( 'Edit Product Tag' ),
			'update_item'       => __( 'Update Product Tag' ),
			'add_new_item'      => __( 'Add New Product Tag' ),
			'new_item_name'     => __( 'New Product Tag Name' ),
			'menu_name'         => __( 'Product Tags' ),
		);
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'product_tag' ),
		);
		register_taxonomy( 'product_tag', array( 'product' ), $args );
	}
?>