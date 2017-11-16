<?php 
// Shortcode [social-media]
add_shortcode( 'social-media', 'social_media_func' );
function social_media_func( $atts ) { 
	if ( get_option('chameleon_facebook') <> '' 	&& get_option('chameleon_facebook_enable_shortcode') == 'on' )  	$social_icons['facebook'] = array('url' => get_option('chameleon_facebook'),    	'class' => 'fa fa-facebook', 	'title' => 'Facebook' );
	if ( get_option('chameleon_twitter') <> '' 		&& get_option('chameleon_twitter_enable_shortcode') == 'on' )    	$social_icons['twitter'] =  array('url' => get_option('chameleon_twitter'),   		'class' => 'fa fa-twitter',		'title' => 'Twitter' );
	if ( get_option('chameleon_google_plus') <> '' 	&& get_option('chameleon_google_plus_enable_shortcode') == 'on' )   $social_icons['google_plus'] =  array('url' => get_option('chameleon_google_plus'),	'class' => 'fa fa-google-plus',	'title' => 'Google Plus' );
	if ( get_option('chameleon_youtube') <> '' 		&& get_option('chameleon_youtube_enable_shortcode') == 'on' )  		$social_icons['youtube'] = array('url' => get_option('chameleon_youtube'),    		'class' => 'fa fa-youtube', 	'title' => 'Youtube' );
	if ( get_option('chameleon_linkedin') <> '' 	&& get_option('chameleon_linkedin_enable_shortcode') == 'on' )  	$social_icons['linkedin'] = array('url' => get_option('chameleon_linkedin'),    	'class' => 'fa fa-linkedin', 	'title' => 'Linkedin' );
	if ( get_option('chameleon_pinterest') <> '' 	&& get_option('chameleon_pinterest_enable_shortcode') == 'on' )  	$social_icons['pinterest'] = array('url' => get_option('chameleon_pinterest'),    	'class' => 'fa fa-pinterest', 	'title' => 'Pinterest' );
	if ( get_option('chameleon_instagram') <> '' 	&& get_option('chameleon_instagram_enable_shortcode') == 'on' )  	$social_icons['instagram'] = array('url' => get_option('chameleon_instagram'),    	'class' => 'fa fa-instagram', 	'title' => 'Instagram' );
	if ( get_option('chameleon_rss') <> '' 			&& get_option('chameleon_rss_enable_shortcode') == 'on' )  			$social_icons['rss'] = array('url' => get_option('chameleon_rss'),    				'class' => 'fa fa-rss', 		'title' => 'RSS' );
	$social_icons = apply_filters('et_social_icons', $social_icons);
	$output='';
	if ( !empty($social_icons) ) {
		$output .= '<ul class="social-icons-shortcode">';
		foreach ($social_icons as $icon) {
			$output .= '<li><a href="' . $icon['url'] . '" class="' . strtolower($icon['title']) . '"  data-toggle="tooltip" title="' . esc_attr($icon['title']) . '" aria-label="' . esc_attr($icon['title']) . '" target="_blank"><i class="' . esc_attr($icon['class']) . '" aria-hidden="true"></i></a></li>';
		}
		$output .= '</ul>';
	} 
	return $output; 
} 

// Shortcode [contact-details]
add_shortcode( 'contact-details', 'contact_details_func' );
function contact_details_func( $atts ) {
		$output='';
			$output.='<div class="contact-details-shorcode">';
			if ( get_option('chameleon_company_address') <> '' ) {
				$output.='
					<div class="contact-details-list contact-details-address">
						<i class="fa fa-map-signs" aria-hidden="true"></i>
						<a href="'.get_option('chameleon_company_address_link').'" target="_blank">'.get_option('chameleon_company_address').'</a>
					</div>
				';
			}
			if ( get_option('chameleon_telephone_1') <> '' || get_option('chameleon_telephone_2') <> '' ) {
			$output.='<div class="contact-details-list contact-details-telephone">';
				if ( get_option('chameleon_telephone_2') <> '' ) { 
					$output.='
						<i class="fa fa-phone" aria-hidden="true"></i> Call Us: 
						<a href="tel:'.get_option('chameleon_telephone_1').'">'.get_option('chameleon_telephone_1').'</a>
					';
				}
				if ( get_option('chameleon_telephone_1') <> '' && get_option('chameleon_telephone_2') <> '' ) {
					$output.=' <span>or</span> ';
				}
				if ( get_option('chameleon_telephone_2') <> '' ) {
					$output.='<a href="tel:'.get_option('chameleon_telephone_2').'">'.get_option('chameleon_telephone_2').'</a>';
				}
			$output.='</div>';
			}
			if ( get_option('chameleon_fax_number') <> '' ) { 
				$output.='
					<div class="contact-details-list contact-details-fax">
						<i class="fa fa-fax" aria-hidden="true"></i>
						Fax: <a href="tel:'.get_option('chameleon_fax_number').'">'.get_option('chameleon_fax_number').'</a>
					</div>
				';
			}
			if ( get_option('chameleon_email_address') <> '' ) {
				$output.='
					<div class="contact-details-list contact-details-email">
						<i class="fa fa-envelope-o" aria-hidden="true"></i> 
						Email us today: <a href="mailto:'.get_option('chameleon_email_address').'">'.get_option('chameleon_email_address').'</a>
					</div>
				';
			}
		$output.='</div>';
	return $output; 
}

// Shortcode [year]
add_shortcode( 'year', 'year_shortcode' );
function year_shortcode( $atts ){
	return date("Y");
}
// Shortcode [sitename]
add_shortcode( 'sitename', 'sitename_shortcode' );
function sitename_shortcode( $atts ){
	return get_bloginfo( 'name' );
}
// Shortcode [sitedesc]
add_shortcode( 'sitedesc', 'sitedesc_shortcode' );
function sitedesc_shortcode( $atts ){
	return get_bloginfo( 'description' );
}
?>