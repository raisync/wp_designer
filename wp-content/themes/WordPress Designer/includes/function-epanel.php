<?php 
add_action( 'after_setup_theme', 'et_setup_theme' );
if ( ! function_exists( 'et_setup_theme' ) ){
	function et_setup_theme(){
		global $themename, $shortname;
		$themename = get_bloginfo( 'name' ); /*This is the only changes to change Admin Menu Theme Option*/
		$shortname = "chameleon";
		$template_dir = get_template_directory();
		$stylesheet_dir = get_stylesheet_directory();
		require_once($template_dir . '/epanel/custom_functions.php');
		require_once($template_dir . '/includes/functions/comments.php');
		load_theme_textdomain('Chameleon',$template_dir.'/lang');
		require_once($template_dir . '/epanel/core_functions.php');
		require_once($stylesheet_dir . '/includes/post_thumbnails_chameleon.php');
		remove_action( 'admin_init', 'et_epanel_register_portability' );
		add_action( 'pre_get_posts', 'et_home_posts_query' );
		add_action( 'et_epanel_changing_options', 'et_delete_featured_ids_cache' );
		add_action( 'delete_post', 'et_delete_featured_ids_cache' );
		add_action( 'save_post', 'et_delete_featured_ids_cache' );
		add_theme_support( 'title-tag' );
	}
}
if ( ! function_exists( 'et_load_core_options' ) ) {
	/*Loads theme ePanel on Child Theme*/
	function et_load_core_options() {
		require_once( get_stylesheet_directory() . esc_attr( "/includes/epanel.php" ) );
	}
	/*epanel navigation setting*/
	add_filter( 'admin_body_class', 'add_admin_body_class' );
	function add_admin_body_class( $classes ) {
		if ( has_nav_menu( 'primary-menu' ) ) {
			return "$classes custom-menu-enable";
		}
	}
	/*Logo setting - Change Default Image Setting*/
	add_action( 'after_setup_theme', 'default_attachment_display_settings' );
	function default_attachment_display_settings() {
		update_option( 'image_default_align', 'left' );
		update_option( 'image_default_link_type', 'post' );
		update_option( 'image_default_size', 'large' );
	}
	/*ePanel Admin Script*/
	add_action( 'admin_enqueue_scripts', 'wpdocs_selectively_enqueue_admin_script', 99 );
	function wpdocs_selectively_enqueue_admin_script() {
		wp_enqueue_script( 'epanel_script', get_stylesheet_directory_uri() . '/js/epanel.js', array(), '1.0' );
	}
	/*ePanel Admin css*/
	add_action( 'admin_enqueue_scripts', 'wpdocs_enqueue_custom_admin_style', 99 );
	function wpdocs_enqueue_custom_admin_style() {
			wp_enqueue_style( 'epanel_style', get_stylesheet_directory_uri() . '/css/epanel.css', false, '1.0.0' );
	}
}
/*Remove Parent Page-template*/
add_filter( 'theme_page_templates', 'remove_page_templates' );
function remove_page_templates( $templates ) {
    unset( $templates['page-blog.php'] );
    unset( $templates['page-contact.php'] );
    unset( $templates['page-gallery.php'] );
    unset( $templates['page-full.php'] );
    unset( $templates['page-login.php'] );
    unset( $templates['page-search.php'] );
    unset( $templates['page-template-portfolio.php'] );
    return $templates;
}

/*Replace/Remove Parent Functions*/
add_action( 'after_setup_theme', 'bg_theme_setting' );
function bg_theme_setting(){
    remove_action( 'wp_head', 'et_set_bg_properties' );
	remove_action('wp_head','add_favicon');
	remove_action('init','et_activate_features');
	remove_action('et_header_top','et_chameleon_control_panel');/*ePanel Frontend*/
	remove_action('wp_head','et_portfoliopt_additional_styles',100);/*Portfolio*/
	remove_action('template_redirect', 'et_load_chameleon_scripts' );/*Slider*/
	remove_action('et_header', 'et_add_mobile_navigation' );/*Responsive Menu Toggle*/
	remove_action('widget_title','et_widget_force_title');/*Widget Force Title*/
	remove_action('wp_head','et_add_meta_javascript');/*Slider Meta Remove*/
    remove_action('wp_head','head_addons',7);/*Theme Info Meta Remove*/
	remove_action( 'wp_head', 'et_set_font_properties' );/*Remove Parent Font Setting*/
	remove_action( 'pre_get_posts', 'et_custom_posts_per_page' ); /*Fixed Woocommerce Post Per Page*/
	add_action( 'pre_get_posts', 'et_custom_posts_per_page', 0 ); /*Fixed Woocommerce Post Per Page*/
	// all actions related to emojis
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	add_action( 'wp_footer', 'print_emoji_detection_script', 7 );
}
/*Remove Parent Sidebar*/
add_action( 'widgets_init', 'remove_sidebars', 11 );
function remove_sidebars() {
  unregister_sidebar( 'sidebar-2' );
  unregister_sidebar( 'sidebar-3' );
}
?>