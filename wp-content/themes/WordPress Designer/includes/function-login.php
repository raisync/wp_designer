<?php
add_action( 'login_enqueue_scripts', 'my_login_logo' );
function my_login_logo() { ?>
    <?php 
	global $shortname; 
	global $default_login_n_mobile_bg_color;
        if ( get_option($shortname.'_login_logo') <> '' ) {
			$login_logo = get_option($shortname.'_login_logo');
		} else if ( get_option($shortname.'_logo') <> '' ) {
			$login_logo = get_option($shortname.'_logo');
		} else {
        	$login_logo = (get_option($shortname.'_login_logo') <> '') ? get_option($shortname.'_login_logo') : get_stylesheet_directory_uri().'/images/logo.svg';
		} 
        $login_bg = (get_option($shortname.'_login_bg') <> '') ? 'background-image: url('.get_option($shortname.'_login_bg').') !important; ' : '';
        $login_bgcolor = (get_option($shortname.'_login_bgcolor') <> '') ? '#'.get_option($shortname.'_login_bgcolor') : $default_login_n_mobile_bg_color;
        $login_linkcolor = (get_option($shortname.'_login_linkcolor') <> '') ? get_option($shortname.'_login_linkcolor') : 'fff';
        $login_bgrepeat = (get_option($shortname.'_login_bgrepeat') <> '') ? get_option($shortname.'_login_bgrepeat') : 'repeat';
        $login_bgposition = (get_option($shortname.'_login_bgposition') <> '') ? get_option($shortname.'_login_bgposition') : 'center top';
        $login_bgsize = (get_option($shortname.'_login_bgsize') <> '') ? get_option($shortname.'_login_bgsize') : 'auto auto';
    ?>
    <style type="text/css">
        html, body.login{ background-color: <?php echo $login_bgcolor; ?> !important;<?php echo esc_attr( $login_bg ); ?> background-repeat: <?php echo esc_attr( $login_bgrepeat ); ?> !important; background-position:<?php echo esc_attr( $login_bgposition ); ?> !important; background-size:<?php echo esc_attr( $login_bgsize ); ?> !important;}
        body.login div#login h1 a{ background: rgba(0, 0, 0, 0) url("<?php echo esc_attr( $login_logo ); ?>") no-repeat scroll 50% 50%; background-size: contain; display: block; height: 100px; width: 100%;}
		a:focus{ outline: none !important; box-shadow: none; -webkit-box-shadow: none;}
        .login #backtoblog a, .login #nav a{ color:#<?php echo esc_attr( $login_linkcolor ); ?> !important;}
        .login #backtoblog a:hover, .login #nav a:hover{ color:#<?php echo esc_attr( $login_linkcolor ); ?> !important; text-decoration:underline;}
    </style>
<?php }
// Admin Login Logo URL
add_filter( 'login_headerurl', 'my_login_logo_url' );
function my_login_logo_url() {
    return home_url();
}
// Admin Login Logo Title
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
function my_login_logo_url_title() {
    return ''.get_bloginfo().'';
}
?>