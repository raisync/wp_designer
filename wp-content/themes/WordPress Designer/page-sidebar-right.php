<?php
/*
Template Name: Sidebar Right Page
*/
if ( get_field('page_setting', $blogSetting) == 'no-header' || get_field('page_setting', $blogSetting) == 'no-header-footer') {
	get_header('blank');
} else {
	get_header();
}
if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) { $flbuilder = ' class="fl-builder-enable"'; }
?>
<main id="content"<?php if( empty( $post->post_content) ) { echo (' class="no-content"'); } echo $flbuilder; ?>>
	<div id="content-area" class="sidebar-left<?php if (get_field('content_padding')) { ?> <?php echo get_field('content_padding'); ?><?php } ?>">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) { ?>
				<?php the_content(); ?>
			<?php } else { ?>
				<div class="container">
					<div class="row">
						<section class="contentbar col-sm-8 col-md-9">
							<?php the_content(); ?>
						</section>
						<?php get_sidebar(); ?>
					</div>
				</div>
			<?php } ?>
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