<?php 	
if ( ! empty( $settings->color ) ) {
	$color = ( $settings->color <> '' ) ? $settings->color : 'dark';
	$colorclass = ' '.$color;
}

$output = '<div id="product-gallery" class="'.$module->get_classname().$colorclass.'">';

	$output .= '<div class="grids product-gallery-items">';
		/*setting*/
		$query_args = array(
			'post_type' => $settings->posttype,
			'posts_per_page' => $settings->totalpost,
			'orderby' => $settings->post_orderby,
			'order' => $settings->post_order,
		);
		$grid = ( $settings->grid <> '' ) ? $settings->grid : 'col-md-4';
		$query = new WP_Query($query_args);
        $isFullWidth = true;
		while ($query->have_posts()) : $query->the_post();
            if ($isFullWidth) {
                $full_post = 'full';
                $isFullWidth = false;
            } else {
                $full_post = 'half';
            }
			$output .= '<article class="'.$full_post.' '.$grid.'">';
                if (has_post_thumbnail()) {
                    $output .= '<figure>'; 
                        $output .=  '<a href="'.get_the_permalink().'" title="View '.get_the_title().'">'; 
                            if ( $grid == 'col-md-12') {
                            $img = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ), 'full' );
                            } else if ($grid == 'col-md-6') {
                            $img = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ), 'medium-large' );
                            } else {
                            $img = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ), 'portfolio-mixitup' );
                            }
                            $imgSRC = ( $img ) ? $img[0] : FL_MODULE_THEME_URL .'modules/terrania/portfolio-tr/img/default.jpg';
                            $output .= '<img src="'.$imgSRC.'" alt="'.get_the_title().'">'; 
                        $output .=  '</a>';
                    $output .=  '</figure>';
                }
                
                $output .=  '<div class="heading-text">';
                    $output .=  '<a href="'.get_the_permalink().'" title="Details" class="product-link">';
                        $output .=  '<span>'.get_field("product_icon").'</span>';
                        $output .=  '<h4>'.get_the_title().'</h4>';
                    $output .=  '</a>';
                $output .=  '</div>';
                
                $output .=  '<div class="content-text">';
                    $output .=  '<p>'.get_field("excerpt").'</p>';
                    $output .=  '<a href="'.get_the_permalink().'" title="Details" class="more-link">Learn More</a>';
                $output .=  '</div>';
                    
			$output .=  '</article>';
			

            
		endwhile; wp_reset_query();
	$output .= '</div>';
$output .= '</div>';


echo $output;
?>