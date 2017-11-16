<?php if (is_single() && get_option('chameleon_postinfo2') && !is_custom_post_type() ) { ?>
<div class="meta-info fl-animation fl_fadeInUp fl_delay-1">
	<?php global $query_string;
	$new_query = new WP_Query($query_string);
	while ($new_query->have_posts()) $new_query->the_post(); ?>
		<?php if (in_array('date', get_option('chameleon_postinfo2'))) { ?>
			<span class="article-date"><i class="fa fa-calendar"></i> <?php the_time(esc_attr(get_option('chameleon_date_format'))) ?></span>
		<?php } ?>
		<?php if (in_array('comments', get_option('chameleon_postinfo2'))) { ?>
			<?php if ( $post->comment_status != 'closed' ) { ?>
				<?php if ( have_comments() ) { ?>
					<span class="article-comment"><i class="fa fa-comment"></i> <?php comments_popup_link(esc_html__('0 Comment','Chameleon'), esc_html__('1 Comment','Chameleon'), '% '.esc_html__('Comments','Chameleon')); ?></span>
				<?php } ?>
			<?php } ?>
		<?php } ?>
		<?php if ( has_category( $category, $post ) ) { ?>
			<?php if (in_array('categories', get_option('chameleon_postinfo2'))) { ?>
				<span class="article-category"><i class="fa fa-folder"></i>  <?php the_category(', ') ?></span>
			<?php } ?>
		<?php } ?>
</div>
<?php }; ?>