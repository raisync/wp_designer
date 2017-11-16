<?php 	
if ( ! empty( $settings->color ) ) {
	$color = ( $settings->color <> '' ) ? $settings->color : 'dark';
	$colorclass = ' '.$color;
}

$output = '<div id="team-gallery" class="'.$module->get_classname().$colorclass.'">';

	$output .= '<div class="grids team-gallery-items">';
		/*setting*/
		$query_args = array(
			'post_type' => 'team',
			'posts_per_page' => $settings->totalpost,
			'orderby' => $settings->post_orderby,
			'order' => $settings->post_order,
		);
		$grid = ( $settings->grid <> '' ) ? $settings->grid : 'col-md-4';
		$query = new WP_Query($query_args);
		while ($query->have_posts()) : $query->the_post();
			$output .= '<article class="'.$grid.'">';
				$output .= '<figure>'; 
					$output .=  '<a href="'.get_the_permalink().'" title="View '.get_the_title().'">'; 
						if ( $grid == 'col-md-12') {
						$img = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ), 'full' );
						} else if ($grid == 'col-md-6') {
						$img = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ), 'medium-large' );
						} else {
						$img = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ), 'portfolio-mixitup' );
						}
						$imgSRC = ( $img ) ? $img[0] : FL_MODULE_TERRANIA_URL .'modules/terrania/portfolio-tr/img/default.jpg';
						$output .= '<img src="'.$imgSRC.'" alt="'.get_the_title().'">'; 
					$output .=  '</a>';
				$output .=  '</figure>';
                        $output .=  '<div class="figure-content">'; 
						  $output .=  '<h4><a href="'.get_the_permalink().'" title="Details" class="team-link">'.get_the_title().'</a></h4>';
				        $output .=  '</div>'; 
			$output .=  '</article>'; 
		endwhile; wp_reset_query();
	$output .= '</div>';
$output .= '</div>';


echo $output;
?>