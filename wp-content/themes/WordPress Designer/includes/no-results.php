<section class="entry<?php if (is_archive()) { echo ' col-sm-12';}?>">
	<?php if (is_archive()) { ?>
		<h2 class="fl-animation fl_left-to-right"><?php esc_html_e('Coming Soon','Chameleon'); ?></h2>
		<p class="fl-animation fl_right-to-left"><?php esc_html_e('This category has no propery or article added yet.','Chameleon'); ?></p>
	<?php } else { ?>
		<?php if ( get_option('chameleon_page_not_found_image') <> '' ) { ?>
			<figure class="alignright fl-animation fl_right-to-left"><img src="<?php echo get_option('chameleon_page_not_found_image'); ?>" alt="<?php esc_html_e('Page Not Found','Chameleon'); ?>"></figure>
		<?php } ?>
		<div class="overflow-hidden fl-animation fl_left-to-right">
			<h2><?php esc_html_e('No Results Found','Chameleon'); ?></h2>
			<p><?php esc_html_e('The page you requested could not be found. Try refining your search, or use the navigation above to locate the post.','Chameleon'); ?></p>
			<?php if ( get_option('chameleon_page_not_found_search') == 'on' ) { ?>
				<form id="searchform-404" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>/">
					<div class="fieldset">
						<input type="text" placeholder="SEARCH" value="<?php the_search_query(); ?>" name="s" id="searchinput">
						<button id="searchsubmit"><i class="fa fa-search"></i></button>
					</div>
				</form>
			<?php } ?>
		</div>
	<?php } ?>
</section>
<!--End if no results are found-->