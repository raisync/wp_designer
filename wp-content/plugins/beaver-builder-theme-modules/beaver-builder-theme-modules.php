<?php
/**
 * Plugin Name: Beaver Builder Theme Modules
 * Description: Theme modules for beaver builder.
 * Version: 1.0
 * Author: The Beaver Builder Team
 */
define( 'FL_MODULE_THEME_DIR', plugin_dir_path( __FILE__ ) );
define( 'FL_MODULE_THEME_URL', plugins_url( '/', __FILE__ ) );

/**
 * Custom modules
 */
function fl_load_theme_modules() {
	if ( class_exists( 'FLBuilder' ) ) {
		global $foldercategory; 
		$foldercategory = 'Theme Modules';
		$themeDIR = 'theme';
        
        /*terrania theme*/
        require_once 'modules/'.$themeDIR.'/heading-advance/heading-advance.php';
        require_once 'modules/'.$themeDIR.'/photo-label-tr/photo-label-tr.php';
        require_once 'modules/'.$themeDIR.'/icon-set-tr/icon-set-tr.php';
        
        require_once 'modules/'.$themeDIR.'/team-tr/team-tr.php';
        
        require_once 'modules/'.$themeDIR.'/blurb-lc/blurb-lc.php';
        require_once 'modules/'.$themeDIR.'/product-featured/product-featured.php';
        require_once 'modules/'.$themeDIR.'/post-featured/post-featured.php';
        require_once 'modules/'.$themeDIR.'/blurb-set/blurb-set.php';
        require_once 'modules/'.$themeDIR.'/featured-blurb-set/featured-blurb-set.php';
        require_once 'modules/'.$themeDIR.'/link/link.php';
        require_once 'modules/'.$themeDIR.'/slider/slider.php';
        require_once 'modules/'.$themeDIR.'/portfolio-advance/portfolio-advance.php';
        require_once 'modules/'.$themeDIR.'/gravity-form/gravity-form.php';
        require_once 'modules/'.$themeDIR.'/google-map/google-map.php';
        require_once 'modules/'.$themeDIR.'/list-wkv/list-wkv.php';
        require_once 'modules/'.$themeDIR.'/text-advance/text-advance.php';
        require_once 'modules/'.$themeDIR.'/buttons-advance/buttons-advance.php';
        require_once 'modules/'.$themeDIR.'/divider/divider.php';
        require_once 'modules/'.$themeDIR.'/posts-advance/posts-advance.php';
        require_once 'modules/'.$themeDIR.'/map-advanced/map-advanced.php';
        require_once 'modules/'.$themeDIR.'/slider-flickity/slider-flickity.php';
	}
}
add_action( 'init', 'fl_load_theme_modules' );

/*Custom Posttype*/
include_once( FL_MODULE_THEME_DIR . 'posttype/posttype_products.php' );
include_once( FL_MODULE_THEME_DIR . 'posttype/posttype_amenity.php' );
include_once( FL_MODULE_THEME_DIR . 'posttype/posttype_news.php' );
include_once( FL_MODULE_THEME_DIR . 'posttype/posttype_offer.php' );