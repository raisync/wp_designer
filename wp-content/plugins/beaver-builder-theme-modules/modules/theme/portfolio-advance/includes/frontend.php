<?php 	
if ( ! empty( $settings->color ) ) {
	$color = ( $settings->color <> '' ) ? $settings->color : 'dark';
	$colorclass = ' '.$color;
}

$output = '<div id="gallery" class="'.$module->get_classname().$colorclass.'">';
if ( !empty($settings->heading) ) {
    $output .= '<h2 class="post-heading"><span class="post-heading-text">'.$settings->heading.'</span></h2>';
}
//	$output .= '<ul class="portfolio-filter">';
//		$output .= '<li class="portfolio-button filter" data-filter="all">All</li>';
//		if ( $settings->posttype !== 'page') {
//			if ( $settings->posttype == 'post') {
//				$terms = get_terms('category');
//			} else {
//				$terms = get_terms(''.$settings->posttype.'_category');  
//			}
//			$count = count($terms);
//			$i = 0;
//			if($count > 0){
//				foreach($terms as $term){
//					$output .= '<li class="portfolio-button filter" data-filter=".'.$term->slug.'">'.$term->name.'</li>';
//				}
//			}
//		}
//	$output .= '</ul>';

	$output .= '<div class="grids portfolio-items">';
		/*setting*/
		$query_args = array(
			'post_type' => $settings->posttype,
			'posts_per_page' => $settings->totalpost,
			'orderby' => $settings->post_orderby,
			'order' => $settings->post_order,
		);
		$grid = ( $settings->grid <> '' ) ? $settings->grid : 'grid-4';
		$query = new WP_Query($query_args);
		while ($query->have_posts()) : $query->the_post();
			$output .= '<article class="mix '.$grid;
			if ( $settings->posttype !== 'page') {
				if ( $settings->posttype == 'post') {
					$allClasses = get_the_terms( $post->ID, 'category' ); 
				} else {
					$allClasses = get_the_terms( $post->ID, ''.$settings->posttype.'_category' ); 
				}
				if(! empty($allClasses)){
					foreach ($allClasses as $class) { 
						$output .= ' '.$class->slug;
					}
				}
			}
			$output .= '">';
                if ( $grid == 'grid-12') {
                    $img = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ), 'full' );
                } else if ($grid == 'grid-6') {
                    $img = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ), 'medium-large' );
                } else {
                    $img = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ), 'portfolio-mixitup' );
                }
                $imgSRC = ( $img ) ? $img[0] : FL_MODULE_THEME_URL .'modules/theme/portfolio-advance/img/default.jpg';
				$output .= '<figure style="background: url('.$imgSRC.') no-repeat; background-size: cover; background-position: 50% 50%;">'; 
					$output .=  '<a href="'.get_the_permalink().'" title="View '.get_the_title().'">'; 
						
//						$output .= '<img src="'.$imgSRC.'" alt="'.get_the_title().'">'; 
					$output .=  '</a>';
//					$output .=  '<div class="content-box">';
//                        $output .=  '<h2>'.get_the_title().'</h2>';
//					$output .=  '</div>'; 
					$output .=  '<figcaption>'; 
				        $output .=  '<div class="figure-content">'; 
						  $output .=  '<h4>'.get_the_title().'</h4>';
                            $content = get_the_content();
                            if ( $content <> '' ) {
                                if ( ! empty( $settings->str_limit ) ) {
                                    $output .='<p>'.substr($content, 0, $settings->str_limit);
                                    if ( strlen($content) >= $settings->str_limit ) {
                                        $output .='...';
                                    }
                                    $output .='</p>';
                                } else {
                                    $output .='<p>'.$content.'</p>';
                                }
                            }
						  $output .=  '<a href="'.get_the_permalink().'" title="Details" class="portfolio-button"><i class="fa fa-plus" aria-hidden="true"></i></a>'; 
				        $output .=  '</div>'; 
					$output .=  '</figcaption>'; 
				$output .=  '</figure>'; 
			$output .=  '</article>'; 
		endwhile; wp_reset_query();
	$output .= '</div>';
$output .= '</div>';


echo $output;
?>