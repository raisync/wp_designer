<?php 	
if ( ! empty( $settings->color ) ) {
	$color = ( $settings->color <> '' ) ? $settings->color : 'dark';
	$colorclass = ' '.$color;
}

$output = '<div id="gallery" class="'.$module->get_classname().$colorclass.'">';
if ( !empty($settings->heading) ) {
    $output .= '<h2 class="post-heading"><span class="post-heading-text">'.$settings->heading.'</span></h2>';
}
//	$output .= '<ul class="posts-filter">';
//		$output .= '<li class="posts-button filter" data-filter="all">All</li>';
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
//					$output .= '<li class="posts-button filter" data-filter=".'.$term->slug.'">'.$term->name.'</li>';
//				}
//			}
//		}
//	$output .= '</ul>';

	$output .= '<div class="grids posts-items">';
	$output .= '<div class="row" style="text-align: center;">';
		/*setting*/
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
if ( !is_front_page() && !is_home() ) { 
    $query_args = array(
			'post_type' => $settings->posttype,
			'posts_per_page' => 15,
			'orderby' => 'post_date', ///$settings->post_orderby
			'order' =>   'DESC',             //$settings->post_order,
            'paged' => $paged
		);
    }else{
        $query_args = array(
			'post_type' => $settings->posttype,
			'posts_per_page' => $settings->totalpost,
            'meta_query' => array(
                 array(
                   'key' => 'featured_product',
                   'value' => 'yes',
                   'compare' => 'LIKE'
                 )
               ),
			'orderby' => 'post_date',//$settings->post_orderby,
			'order' => 'DESC',//$settings->post_order,
            'posts_per_page' => 12,
            'paged' => $paged
		);    
}
		/*$query_args = array(
			'post_type' => $settings->posttype,
			'posts_per_page' => $settings->totalpost,
            'meta_query' => array(
                 array(
                   'key' => 'featured_product',
                   'value' => 'yes',
                   'compare' => 'LIKE'
                 )
               ),

			'orderby' => $settings->post_orderby,
			'order' => $settings->post_order
		);*/
		$grid = ( $settings->grid <> '' ) ? $settings->grid : 'grid-4';
		$query = new WP_Query($query_args);
		if ( $query->have_posts() ) :while ($query->have_posts()) : $query->the_post();
			$output .= '<article id="article'.$query->post->ID.'" class="mix '.$grid;
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
			$output .= '<div class="posts-item">';
                if ( $grid == 'grid-12') {
                    $img = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ), 'full' );
                } else if ($grid == 'grid-6') {
                    $img = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ), 'medium-large' );
                } else {
                    $img = wp_get_attachment_image_src( get_post_thumbnail_id( $query->ID ), 'posts-mixitup' );
                }

                $imgSRC = ( $img ) ? $img[0] : FL_MODULE_THEME_URL .'modules/theme/posts-advance/img/default.jpg';
                $output .=  '<a href="'.get_the_permalink().'" title="View '.get_the_title().'">'; 
				$output .= '<figure style="background: url('.$imgSRC.') no-repeat; background-color: white; background-size: contain; background-position: 50% 50%;">'; 
						
//				$output .= '<img src="'.$imgSRC.'" alt="'.get_the_title().'">'; 	
//				$output .=  '<div class="content-box">';
//              $output .=  '<h2>'.get_the_title().'</h2>';
//			    $output .=  '</div>'; 
//				$output .=  '<figcaption>'; 
                $output .=  '</figure>'; 
                $output .=  '</a>';
				        $output .=  '<div class="post-content">'; 
//						  $output .=  '<h4>'.get_the_title().'</h4>';
                            if ($settings->title_str_limit <> '') {
                                $title_content = get_the_title();
                                if ( $title_content <> '' ) {
                                    if ( ! empty( $settings->title_str_limit ) ) {
                                        $output .='<a href="'.get_permalink().'" title="'.$title_content.'" class="title-link"><h4>'.substr($title_content, 0, $settings->title_str_limit);
                                        if ( strlen($title_content) >= $settings->title_str_limit ) {
                                            $output .='...';
                                        }
                                        $output .='</h4></a>';
                                        //added
                                        $str_limit = 75;
                                        // $output .='<p style="font-size: 12px; padding-bottom: 10px; font-weight: bold; color: black;">Price: '.get_field("product_price").'</p>';
                                        //$output .='<p style="margin-top: 15px; color: green;" >Description:</p><br />';
                                        $output .='<p style="font-size: 12px; margin-top: -5px;">'.substr(get_the_content(), 0, $str_limit);
                                        if ( strlen(get_the_content()) >= $str_limit ) {
                                            $output .='...';
                                        }
                                        $output .='</p>';
                                        //$output .='<p>'.get_field("product_ratings").'</p>';
                                        $temp_rate = sprintf(
                                            '[yasr_visitor_votes size="small" postid="%1$s"]',
                                                    $post->ID
                                                );
                                        $output .= do_shortcode($temp_rate);
                                        //end
                                    } else {
                                        $output .='<a href="'.get_permalink().'" title="'.$title_content.'" class="title-link"><h4>'.$title_content.'</h4></a>';
                                    }
                                }
                            }
                            if ($settings->show_excerpt == 'true') {
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
                            }
				        $output .=  '</div>'; 
//					$output .=  '</figcaption>'; 
				$output .=  '<a style="cursor: pointer;" data-toggle="modal" data-target="#inquireNowModal" title="Inquire Now" class="posts-button inquireNowBtn"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i><span>Inquire Now</span></a>';
                $output .=  '</div>';                 
			$output .=  '</article>'; 
		endwhile; wp_reset_query();
        $output .= '<div class="pagination">';
            if ($query->max_num_pages > 1 ) { // check if the max number of pages is greater than 1  
                
                $max   = intval( $query->max_num_pages );
                /** Add current page to the array */
                if ( $paged >= 1 )
                    $links[] = $paged;
                /** Add the pages around the current page to the array */
                if ( $paged >= 3 ) {
                    $links[] = $paged - 1;
                    $links[] = $paged - 2;
                }
                if ( ( $paged + 2 ) <= $max ) {
                    $links[] = $paged + 2;
                    $links[] = $paged + 1;
                }
                   
                $output .= '<div class="navigation"><ul>' . "\n";
                /** Previous Post Link */
                if ( get_previous_posts_link() )
                   $output .= sprintf( '<li>%s</li>' . "\n", get_previous_posts_link('<div class="arrow arrow-prev"></div>') );
                /** Link to first page, plus ellipses if necessary */
                if ( ! in_array( 1, $links ) ) {
                    $class = 1 == $paged ? ' class="active"' : '';
                    $output .= sprintf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
                    if ( ! in_array( 2, $links ) )
                        $output .= '<li>…</li>';
                }
                /** Link to current page, plus 2 pages in either direction if necessary */
                sort( $links );
                foreach ( (array) $links as $link ) {
                    $class = $paged == $link ? ' class="active"' : '';
                    $output .= sprintf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
                }
                /** Link to last page, plus ellipses if necessary */
                if ( ! in_array( $max, $links ) ) {
                    if ( ! in_array( $max - 1, $links ) )
                        $output .= '<li>…</li>' . "\n";
                    $class = $paged == $max ? ' class="active"' : '';
                    $output .= sprintf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
                }
                /** Next Post Link */
                if ( get_next_posts_link() )
                   $output .= sprintf( '<li>%s</li>' . "\n", get_next_posts_link() );
                $output .= '</ul></div>' . "\n";
        }
            $output .= '</div>';
         
       /*  else: 
            $output .= '<article>';
            $output .= '<h1>'.Sorry...'</h1>';
            $output .= '<p>'. _e('Sorry, no posts matched your criteria.') .'</p>';
            $output .= '</article>';*/
        endif;
	$output .= '</div>';
	$output .= '</div>';
$output .= '</div>';
echo $output;?>

