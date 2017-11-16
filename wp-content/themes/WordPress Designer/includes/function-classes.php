<?php
/* <body> classes */
add_filter( 'body_class', 'page_slug' );
function page_slug( $classes ) {
    global $post;
	$headerStyle = $pageSetting = '';
	if ( class_exists('acf') ) {
		if (get_field('header_style') == "sticky") {
			$headerStyle = 'header-sticky-on-scroll ';
		} else if (get_field('header_style') == "absolute") {
			$headerStyle = 'header-absolute ';
		} else {
			if (get_option('chameleon_header_sticky') == "on") {
				$headerStyle = 'header-sticky-on-scroll ';
			}
		}
		if (get_field('page_setting', $blogSetting) == 'no-header' || get_field('page_setting', $blogSetting) == 'no-header-footer') $pageSetting = 'page-no-header ';
	} else {
		if (get_option('chameleon_header_sticky') == "on") $headerStyle = 'header-sticky-on-scroll ';
	}
	$classes[] = $headerStyle.$pageSetting.'page-slug-'.$post->post_name;
	return $classes;
}
/*Single Post Navigation*/
add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
function posts_link_attributes_1() {
    return 'class="next"';
}
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');
function posts_link_attributes_2() {
    return 'class="prev"';
}
/*is_custom_post_type()*/
function is_custom_post_type( $post = NULL ) {
    $all_custom_post_types = get_post_types( array ( '_builtin' => FALSE ) );
    /*there are no custom post types*/
    if ( empty ( $all_custom_post_types ) )
        return FALSE;
    $custom_types      = array_keys( $all_custom_post_types );
    $current_post_type = get_post_type( $post );
    /*could not detect current type*/
    if ( ! $current_post_type )
        return FALSE;
    return in_array( $current_post_type, $custom_types );
}
?>