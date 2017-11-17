<?php
global $default_login_n_mobile_bg_color;
$default_login_n_mobile_bg_color = '#2d5074';
include_once( get_stylesheet_directory() . '/includes/function-epanel.php' );/*Theme Option (always first)*/
include_once( get_stylesheet_directory() . '/includes/function-admin-bar.php' );/*Admin Bar Buttons*/
include_once( get_stylesheet_directory() . '/includes/function-classes.php' );/*Custom Classes*/
include_once( get_stylesheet_directory() . '/includes/function-fonts.php' );/*Theme Fonts*/
include_once( get_stylesheet_directory() . '/includes/function-head.php' );/*Head Meta*/
include_once( get_stylesheet_directory() . '/includes/function-login.php' );/*Login Setting*/
include_once( get_stylesheet_directory() . '/includes/function-shortcodes.php' );/*Theme Shortcodes*/
include_once( get_stylesheet_directory() . '/includes/function-sidebar.php' );/*Theme Sidebar*/
include_once( get_stylesheet_directory() . '/includes/function-svg.php' );/*SVG upload enable*/
include_once( get_stylesheet_directory() . '/includes/function-image-alt.php' );/*Automatic Add Alt*/
include_once( get_stylesheet_directory() . '/includes/function-wysiwig.php' );/*Wysiwig Setting*/

/*WIDGETS*/
include_once( get_stylesheet_directory() . '/includes/widgets/widget-social.php' );/*Theme ePanel Widgets*/

/*PlUGINS BUNDLES*/
require_once( get_stylesheet_directory() . '/lib/class-tgm-plugin-required.php');/*Plugins Required*/

/*POST TYPE*/
require_once( get_stylesheet_directory() . '/includes/posttype_partners.php');/*Partners*/

/*ACF*/
include_once( get_stylesheet_directory() . '/includes/acf/acf-function.php' );/*ACF Integration*/

/*Image/Thumbnail sizes*/
add_image_size( 'slider', 1500, 725, true );

/*Register New Menu settings*/
register_nav_menus( array(
	'copyright-menu' => 'Copyright Menu',
) );

/*Styles*/
add_action('wp_enqueue_scripts','child_style', 99);
function child_style(){
    $stylesheet_dir = get_stylesheet_directory_uri();
	wp_enqueue_style('bootstrap', 					$stylesheet_dir . '/css/bootstrap.min.css', array(), null ); 
	wp_enqueue_style('style', 						$stylesheet_dir . '/style.css', array(), null ); 
	wp_enqueue_style('default', 					$stylesheet_dir . '/css/default.css', array(), null ); 
	wp_enqueue_style('animate', 					$stylesheet_dir . '/css/animate.css', array(), null ); 
	wp_enqueue_style('owl-carousel', 				$stylesheet_dir . '/js/owlcarousel/owl.carousel.css', array(), null ); 
	wp_enqueue_style('owl-carousel-theme', 			$stylesheet_dir . '/js/owlcarousel/owl.theme.default.min.css', array(), null ); 
	wp_enqueue_style('tilthover', 					$stylesheet_dir . '/js/tilthover/tilthover.css', array(), null ); 
	
	if ( is_front_page() ) {
		wp_enqueue_style('font-home', 				'https://fonts.googleapis.com/css?family=Rock+Salt', array(), null ); 
	}
	if ( is_single() && get_post_format() <> '' ) {
		wp_enqueue_style('post-format', 			$stylesheet_dir . '/css/post-format.css', array(), null ); 
	}
	/*PLUGINS*/
	wp_enqueue_style('magnific', 					$stylesheet_dir . '/js/magnific/magnific-popup.css', array(), null ); 
	if ( is_single() && get_post_format() == 'image' ) {     
		wp_enqueue_style('owl-carousel', 			$stylesheet_dir . '/js/owlcarousel/owl.carousel.css', array(), null ); 
		wp_enqueue_style('owl-carousel-theme', 		$stylesheet_dir . '/js/owlcarousel/owl.theme.default.min.css', array(), null ); 
	}
	if ( is_single() && get_post_format() == 'video' ) {
		wp_enqueue_style('mediaelement-player', 	$stylesheet_dir . '/js/mediaelementjs/mediaelementplayer.css', array(), null ); 
		wp_enqueue_style('flickity', 				$stylesheet_dir . '/js/flickity/flickity.min.css', array(), null ); 
	}
	if ( is_single() && get_post_format() == 'audio' ) {
		wp_enqueue_style('mediaelement-player', 	$stylesheet_dir . '/js/mediaelementjs/mediaelementplayer.css', array(), null ); 
		wp_enqueue_style('flickity', 				$stylesheet_dir . '/js/flickity/flickity.min.css', array(), null ); 
	}
	if ( is_single() && get_post_format() == 'quote' ) {
		wp_enqueue_style('roboto-condensed', 'https://fonts.googleapis.com/css?family=Roboto+Condensed', array(), null ); 
	}
	wp_enqueue_style( 'responsive', get_stylesheet_directory_uri() . '/css/responsive.css', array(), null ); 
}

/*Scripts*/
add_action('wp_footer','child_scripts');
function child_scripts(){
    $stylesheet_dir = get_stylesheet_directory_uri();
	wp_enqueue_script('jquery-easing', 				$stylesheet_dir . '/js/jquery.easing.1.3.js', array('jquery'), '1.0', false);
	wp_enqueue_script('jquery-mobile-detect', 		$stylesheet_dir . '/js/mobile.detect.js', array('jquery'), '1.0', false);
	wp_enqueue_script('bootstrap-tooltips', 		$stylesheet_dir . '/js/bootstrap-tooltips.min.js');
	wp_enqueue_script('owl-carousel', 				$stylesheet_dir . '/js/owlcarousel/owl.carousel.min.js');
	wp_enqueue_script('waypoint', 					$stylesheet_dir . '/js/waypoints.min.js');
	wp_enqueue_script('magnific', 					$stylesheet_dir . '/js/magnific/jquery.magnific-popup.min.js');
	wp_enqueue_script('tilthover-anime', 			$stylesheet_dir . '/js/tilthover/anime.min.js');
	wp_enqueue_script('tilthover', 					$stylesheet_dir . '/js/tilthover/tilthover.js');
	wp_enqueue_script('skrollr', 					$stylesheet_dir . '/js/skrollr.min.js');
	
	if (is_page_template('page-events.php')) { 
		wp_enqueue_script('mixitup', 					$stylesheet_dir . '/js/mixitup.min.v3.1.5.js');
	}
	if ( is_single() && get_post_format() == 'image' ) {
		wp_enqueue_script('owl-carousel', 				$stylesheet_dir . '/js/owlcarousel/owl.carousel.min.js');
	}
	if ( is_single() && get_post_format() == 'gallery' ) {
		if ( class_exists( 'LightGallery' ) ) {
			wp_enqueue_script('lightboxGallery',		$stylesheet_dir . '/js/ligthboxgallery.js');
		}
	}
	if ( is_single() && get_post_format() == 'video' ) {
		wp_enqueue_script('videojs', 			  		$stylesheet_dir . '/js/mediaelementjs/videojs.js');
		wp_enqueue_script('mediaelement-player',  		$stylesheet_dir . '/js/mediaelementjs/mediaelement-and-player.js');
		wp_enqueue_script('mediaelement-facebook',		$stylesheet_dir . '/js/mediaelementjs/renderers/facebook.js');
		wp_enqueue_script('mediaelement-twitch',  		$stylesheet_dir . '/js/mediaelementjs/renderers/twitch.js');
		wp_enqueue_script('mediaelement-vimeo',   		$stylesheet_dir . '/js/mediaelementjs/renderers/vimeo.js');
		wp_enqueue_script('mediaelement-dailymotion',	$stylesheet_dir . '/js/mediaelementjs/renderers/dailymotion.js');
		wp_enqueue_script('flickity', 			  		$stylesheet_dir . '/js/flickity/flickity.pkgd.js');
	}
	if ( is_single() && get_post_format() == 'audio' ) {
		wp_enqueue_script('videojs', 					$stylesheet_dir . '/js/mediaelementjs/videojs.js');
		wp_enqueue_script('mediaelement-player', 		$stylesheet_dir . '/js/mediaelementjs/mediaelement-and-player.js');
		wp_enqueue_script('mediaelement-soundcloud', 	$stylesheet_dir . '/js/mediaelementjs/renderers/soundcloud.js');
	}
}

/*Excerpt Limits*/
add_filter( 'excerpt_more', 'new_excerpt_more' );
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_length', 'new_excerpt_length');
function new_excerpt_length($length) {
	return 24;
}

/****************************************************************************************
* 										Start											*
*****************************************************************************************/
function wmpudev_enqueue_icon_stylesheet() {
	wp_register_style( 'fontawesome', 'http:////maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'fontawesome');
}
add_action( 'wp_enqueue_scripts', 'wmpudev_enqueue_icon_stylesheet' );

add_filter('walker_nav_menu_start_el', 'wpse_226884_replace_hash', 999);
/**
 * Replace # with js
 * @param string $menu_item item HTML
 * @return string item HTML
 */
function wpse_226884_replace_hash($menu_item) {
    if (strpos($menu_item, 'href="#"') !== false) {
        $menu_item = str_replace('href="#"', 'href="javascript:void(0);"', $menu_item);
    }
    return $menu_item;
}

add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );