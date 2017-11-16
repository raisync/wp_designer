<?php get_header(); ?>
<main id="content">
	<section id="content-area" class="sidebar-right">
		<div id="articles" class="container">
			<div class="row">
				<section class="contentbar col-sm-12 col-lg-9">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php get_template_part('includes/blog_post'); ?>
					<?php endwhile; ?>
					<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
						<?php get_template_part('includes/navigation'); ?><?php } ?>
					<?php else : ?>
						<?php get_template_part('includes/no-results'); ?>
					<?php endif; ?>
				</section>
			<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>