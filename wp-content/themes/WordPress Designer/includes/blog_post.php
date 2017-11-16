<?php $featuresThumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
<?php $featuresThumbURL = $featuresThumb[0];?>
<article class="post">
	<div class="post-date<?php if( empty($featuresThumbURL) ) { ?> no-image<?php } ?>">
		<strong><?php the_time('j') ?></strong>
		<span><?php the_time('M') ?></span>
	</div>
	<?php if( ! empty($featuresThumbURL) ) { ?>
	<div class="post-image">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post-image-link" style="background-image: url('<?php echo $featuresThumbURL; ?>');"></a>
	</div><!-- /.post-image -->
	<?php } ?>

	<div class="post-title">
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
	</div><!-- /.post-title -->

	<?php if ( get_option('chameleon_postinfo1') ) { ?>
	<div class="post-meta">
		<?php if (in_array('date', get_option('chameleon_postinfo1'))) { ?>
			<div class="post-meta-item">
				<i class="fa fa-calendar"></i> <?php the_time('j/n/Y') ?>
			</div><!-- /.post-meta-item -->
		<?php } ?>
		<?php if (in_array('comments', get_option('chameleon_postinfo1'))) { ?>
			<?php if ( $post->comment_status != 'closed' ) { ?>
				<div class="post-meta-item">
					<i class="fa fa-comment"></i> <?php comments_popup_link(esc_html__('0 Comment','Chameleon'), esc_html__('1 Comment','Chameleon'), '% '.esc_html__('Comments','Chameleon')); ?>
				</div><!-- /.post-meta-item -->
			<?php } ?>
		<?php } ?>
		<?php if ( has_category( $category, $post ) ) { ?>
			<?php if (in_array('categories', get_option('chameleon_postinfo1'))) { ?>
				<div class="post-meta-item">
					<i class="fa fa-folder"></i> <?php the_category(', ') ?>
				</div><!-- /.post-meta-item -->
			<?php } ?>
		<?php } ?>
		<?php if (get_option('chameleon_share_icons') == "on") { ?>
			<?php get_template_part('includes/social_media_share'); ?>
		<?php } ?>
	</div><!-- /.post-meta -->
	<?php } ?>

	<div class="post-content">
		<?php if ( has_excerpt( $post->ID ) ) : ?>
			<?php the_excerpt(); ?> 
		<?php else : ?>
			<p><?php truncate_post(500); ?></p>
		<?php endif; ?>
	</div><!-- /.post-content -->

	<?php if (get_option('rss_use_excerpt')) : ?>
	<footer class="post-read-more">
		<a href="<?php the_permalink(); ?>" title="Read More">Read More <i class="fa fa-chevron-right"></i></a>
	</footer><!-- /.post-read-more -->
	<?php endif; ?>
</article><!-- /.post-->