<?php
/*
Template Name: Sitemap Page
*/
if ( get_field('page_setting', $blogSetting) == 'no-header' || get_field('page_setting', $blogSetting) == 'no-header-footer') {
	get_header('blank');
} else {
	get_header();
}
if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) { $flbuilder = ' class="fl-builder-enable"'; }
?>
<main id="content"<?php if( empty( $post->post_content) ) { echo (' class="no-content"'); } echo $flbuilder; ?>>
	<div id="content-area"<?php if (get_field('content_padding')) { ?> class="<?php echo get_field('content_padding'); ?>"<?php } ?>>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="container">
				<?php the_content(); ?>
				<section id="sitemap" class="row">
					<div class="col-sm-3">
						<h4><?php esc_html_e('Pages','Chameleon'); ?></h4>
						<ul id="sitemap-pages">
							<?php wp_list_pages(array(
								'title_li'    => '',
								'sort_column' => 'menu_order',
								'exclude' 	  => $post->ID,
							)); ?>
						</ul>
					</div>
					<div class="col-sm-3">
						<h4><?php esc_html_e('Categories','Chameleon'); ?></h4>
						<ul id="sitemap-categories"><?php wp_list_categories('title_li='); ?></ul>
					</div>
					<div class="col-sm-3">
						<h4><?php esc_html_e('Tags','Chameleon'); ?></h4>
						<ul id="sitemap-tags">
							<?php $tags = get_tags();
							if ($tags) {
								foreach ($tags as $tag) {
									echo '<li><a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '">' . esc_html( $tag->name ) . '</a></li> ';
								}
							} else {
								echo '<li>No Tags</li>';
							} ?>
						</ul>
					</div>
					<div class="col-sm-3">
						<h4><?php esc_html_e('Social Media','Chameleon'); ?></h4>
						<?php echo do_shortcode('[social-media]'); ?>
					</div>
				</section>
			</div>
		<?php endwhile; endif; ?>
	</div>
</main>
<?php
	if ( get_field('page_setting', $blogSetting) == 'no-footer' || get_field('page_setting', $blogSetting) == 'no-header-footer') {
		get_footer('blank');
	} else {
		get_footer();
	}
?>