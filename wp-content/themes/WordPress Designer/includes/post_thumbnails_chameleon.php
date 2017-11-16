<?php
	add_theme_support( 'post-thumbnails' );
	global $et_theme_image_sizes;
	/*Blog and Post Images*/
	$et_theme_image_sizes = array(
		'323x160' 	=> 'grid-thumb',
	);
	/*Page Template Images*/
	$et_page_templates_image_sizes = array(
	);
	$et_theme_image_sizes = array_merge( $et_theme_image_sizes, $et_page_templates_image_sizes );
	$et_theme_image_sizes = apply_filters( 'et_theme_image_sizes', $et_theme_image_sizes );
	$crop = apply_filters( 'et_post_thumbnails_crop', true );
	if ( is_array( $et_theme_image_sizes ) ){
		foreach ( $et_theme_image_sizes as $image_size_dimensions => $image_size_name ){
			$dimensions = explode( 'x', $image_size_dimensions );
			add_image_size( $image_size_name, $dimensions[0], $dimensions[1], $crop );
		}
	}
	/*For None Crop Images
	add_image_size( 'news-thumb', 114 , 114 ); */
?>