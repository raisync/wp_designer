<?php 	
if ( ! empty( $settings->color ) ) {
	$color = ( $settings->color <> '' ) ? $settings->color : 'dark';
	$colorclass = ' '.$color;
}

$output .= '<div id="partner-gallery" class="">';

	$output .= '<div class="partner-gallery-items owl-carousel">';
		/*setting*/
		$query_args = array(
			'post_type' => $settings->posttype,
			'posts_per_page' => $settings->totalpost,
			'orderby' => $settings->post_orderby,
			'order' => $settings->post_order,
		);
        /*loop*/
		$query = new WP_Query($query_args);
		while ($query->have_posts()) : $query->the_post();
//        if (has_post_thumbnail()) {
			$output .= '<article class="partner-img">';
                $img = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ), 'full' );
                $imgSRC = ( $img ) ? $img[0] : FL_MODULE_THEME_URL .'modules/theme/post-featured/img/default.jpg';
                    $output .=  '<a href="'.get_the_permalink().'" title="View '.get_the_title().'">';
                        $output .= '<figure style="background: url('.$imgSRC.') no-repeat; background-size: cover;">'; 
                        $output .=  '</figure>';
                    $output .=  '</a>';
			$output .=  '</article>';
//        }
			
		endwhile; wp_reset_query();
        /*end loop*/
	$output .= '</div>';
$output .= '</div>';


echo $output;
?>