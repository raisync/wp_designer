<!-- BLOG PAGE -->
<?php get_header(); ?>

<div id="content-area-page">
	<div id="low-head">
	<?php get_template_part('includes/breadcrumbs'); ?><?php wp_title(''); ?>
		<div id="title">Blog</div>
	</div>

		<div id="left-area" class="col-sm-8">
			<?php get_template_part('includes/entry','home'); ?>
		</div> 	<!-- end #left-area -->

		<div class="">
			<?php get_sidebar(); ?>
		</div>
		<div class="clear" style="clear: both;"></div>

</div> <!-- end #content-area -->

<?php get_footer(); ?>