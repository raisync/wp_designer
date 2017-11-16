<?php 
/*<head>*/
global $default_login_n_mobile_bg_color;
add_action('wp_head','add_meta_tags_child', 1);
function add_meta_tags_child() { ?>
    <?php 
	global $shortname; 
	global $default_login_n_mobile_bg_color;
	?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta property="og:url" content="<?php echo get_site_url(); ?>" />
	<!-- Andorid Chrome -->
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="theme-color" content="<?php echo (get_option('chameleon_theme_mobile') <> '') ? '#'.get_option('chameleon_theme_mobile') :  $default_login_n_mobile_bg_color; ?>">
	<link rel="icon" sizes="192x192" href="<?php echo (get_option('chameleon_favicon_mobile') <> '') ? get_option('chameleon_favicon_mobile') :  get_stylesheet_directory_uri().'/images/favicon.png'; ?>">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="<?php echo (get_option('chameleon_theme_mobile') <> '') ? '#'.get_option('chameleon_theme_mobile') :  $default_login_n_mobile_bg_color; ?>">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="apple-mobile-web-app-title" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); echo ' '; echo esc_attr( get_bloginfo( 'description' ) ); ?>">
	<meta name="format-detection" content="telephone=no">
	<link rel="apple-touch-icon-precomposed" href="<?php echo (get_option('chameleon_favicon_mobile') <> '') ? get_option('chameleon_favicon_mobile') :  get_stylesheet_directory_uri().'/images/favicon.png'; ?>">
	<!--Theme Inc-->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php }

add_action('wp_head','add_favicon_child');
function add_favicon_child(){
	global $shortname;
	$faviconUrl = (get_option($shortname.'_favicon') <> '') ? get_option($shortname.'_favicon') : get_stylesheet_directory_uri().'/images/favicon.ico';;
	echo ('<link rel="shortcut icon" href="'.esc_url( $faviconUrl ).'" />');
}
/** * Admin Favicon */
add_action('admin_head','add_favicon_admin');
function add_favicon_admin(){
    global $shortname; $favicon = (get_option($shortname.'_favicon') <> '') ? get_option($shortname.'_favicon') : get_stylesheet_directory_uri().'/images/favicon.ico';
    echo('<link rel="shortcut icon" href="'.esc_attr( $favicon ).'" />');
}
// Admin Login favicon
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
function my_login_stylesheet() {
    global $shortname; $favicon = (get_option($shortname.'_favicon') <> '') ? get_option($shortname.'_favicon') : get_stylesheet_directory_uri().'/images/favicon.ico';
    echo('<link rel="shortcut icon" href="'.esc_attr( $favicon ).'" />');
}
?>