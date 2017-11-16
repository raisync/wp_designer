<nav class="post-info">
	<?php global $query_string; $new_query = new WP_Query($query_string); while ($new_query->have_posts()) $new_query->the_post(); ?>
	<ul>
		<?php
			$terms = get_the_terms( get_the_ID(), 'portfolio_category' ); 
			if(! empty($terms)){
				echo '<li><span class="article-category"><i class="fa fa-folder-open"></i>';
					$category_links = array();
					foreach ($terms as $term) { 
						$term_link = get_term_link( $term );
						$category_links[] = '<a href="' . esc_url( $term_link ) . '" title="'.$term->name.'">' . $term->name . '</a>';
					}
					echo join( ", ", $category_links );
				echo '</span></li>';
			}
		?>
		<?php
			$tags = get_the_terms( get_the_ID(), 'portfolio_tag' ); 
			if(! empty($tags)){
				echo '<li><span class="article-tags"><i class="fa fa-tags"></i>';
					$tag_links = array();
					foreach ($tags as $tag) { 
						$tag_link = get_term_link( $tag );
						$tag_links[] = '<a href="' . esc_url( $tag_link ) . '" title="'.$tag->name.'">' . $tag->name . '</a>';
					}
					echo join( ", ", $tag_links );
				echo '</span></li>';
			}
		?>
		<?php if ( $post->comment_status != 'closed' ) { ?>
			<li><span class="article-comment"><i class="fa fa-comment"></i> <?php comments_popup_link(esc_html__('0 Comment','Chameleon'), esc_html__('1 Comment','Chameleon'), '% '.esc_html__('Comments','Chameleon')); ?></span></li>
		<?php } ?>
		<li><span class="article-author"><i class="fa fa-user"></i> <?php the_author_posts_link(); ?></span></li>
		<li><span class="article-date"><i class="fa fa-calendar"></i> <?php the_time(esc_attr(get_option('chameleon_date_format'))) ?></span></li>
	</ul>
</nav>