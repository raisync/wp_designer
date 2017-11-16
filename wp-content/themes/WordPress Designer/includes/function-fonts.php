<?php 
global $fontawesome; $fontawesome = 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css';
global $google_fonts; $google_fonts = 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,600,600i,700,700i|Open+Sans:300,300i,400,400i,600,600i,700,700i';
add_filter( 'tiny_mce_before_init', 'wpex_mce_google_fonts_array' );
if ( ! function_exists( 'wpex_mce_google_fonts_array' ) ) {
	function wpex_mce_google_fonts_array( $initArray ) {
	    $initArray['font_formats'] = 'Roboto Condensed=Roboto Condensed;';/*google fonts*/
	    $initArray['font_formats'] .= 'Open Sans=Roboto Condensed;';/*google fonts*/
	    $initArray['font_formats'] .= 'Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats';/*default system font*/
        return $initArray;
	}
}
add_action('admin_enqueue_scripts', 'admin_child_style', 98);
function admin_child_style() {
	global $fontawesome;
	global $google_fonts;
	/*Admin*/
	wp_enqueue_style( 'admin-style', get_stylesheet_directory_uri() . '/style-admin.css' ); 
	wp_enqueue_style( 'admin-font-awesome', $fontawesome, array(), null ); 
	wp_enqueue_style( 'admin-google-font', $google_fonts, array(), null ); 
	/*Wysiwyg*/
	add_editor_style( $fontawesome, array(), null ); 
	add_editor_style( $google_fonts, array(), null ); 
	add_editor_style( '/css/bootstrap.min.css'  ); 
	add_editor_style( 'style-admin.css' ); 
}
add_filter('mce_css', 'fl_editor_style');
function fl_editor_style( $stylesheets ) {  
	if ( class_exists( 'FLBuilder' ) ) {
		if ( FLBuilderModel::is_builder_active() ) {
			$stylesheets .= ! empty( $stylesheets ) ? ',' : '';
			$stylesheets .= get_stylesheet_directory_uri() . '/style-admin.css';
		}
	}
    return $stylesheets;
}
add_action( 'wp_enqueue_scripts', 'frontend_child_style', 98 );
function frontend_child_style() {
	global $fontawesome;
	global $theme_font;
	global $google_fonts;
	wp_enqueue_style( 'font-awesome', $fontawesome, array(), null ); 
	wp_enqueue_style( 'theme-font', $theme_font, array(), null ); 
	wp_enqueue_style( 'google-font', $google_fonts, array(), null ); 
}
?>