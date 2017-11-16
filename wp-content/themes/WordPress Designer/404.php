<?php get_header(); 

/*alignment*/
if ( is_page() || is_home() ) {
	if ( get_field('page_title_alignment', $blogSetting) == '' ) {
		$page_title_alignment = ' '.get_option('chameleon_title_alignment');
	} else {
		$page_title_alignment = ' '.get_field('page_title_alignment', $blogSetting);
	}
} else {
	$page_title_alignment = ' '.get_option('chameleon_title_alignment');
}
?>
<section class="page-heading left tilter-hover parallax skrollable skrollable-between">
	<div class="page-heading-inner tilter">
		<div class="container-fluid">
			<div class="page-heading-content tilter__figure">
				<h1 class="title fl-animation fl_appear tilter__deco tilter__deco--lines">404 ERROR</h1>
				<div class="title-description heading fl-animation fl_appear fl_delay-0">PAGE NOT FOUND</div>
			</div>
		</div>
	</div>
</section>
<main id="content" class="page-not-found-404">
	<div id="content-area">
		<section class="container">
			<?php if ( get_option('chameleon_page_not_found_image') <> '' ) { ?>
				<figure class="alignright fl-animation fl_appear"><img src="<?php echo get_option('chameleon_page_not_found_image'); ?>" alt="<?php esc_html_e('Page Not Found','Chameleon'); ?>"></figure>
			<?php } ?>
			<div class="overflow-hidden fl-animation fl_appear<?php if ( !get_option('chameleon_page_not_found_image') <> '' ) echo ' aligncenter'; ?>">
				<h2><?php echo get_option('chameleon_page_not_found_heading') ? get_option('chameleon_page_not_found_heading') : "Oops!"; ?></h2>
				<h3><?php echo get_option('chameleon_page_not_found_sub_heading') ? get_option('chameleon_page_not_found_sub_heading') : "We can't seem to find the page you're looking for."; ?></h3>
				<p><?php echo get_option('chameleon_page_not_found_text') ? get_option('chameleon_page_not_found_text') : "The page you are looking for was moved, removed, rename or might never existed."; ?></p>
				<?php if ( get_option('chameleon_page_not_found_search') == 'on' ) { ?>
					<form id="searchform-404" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>/">
						<div class="fieldset">
							<input type="text" placeholder="SEARCH" value="<?php the_search_query(); ?>" name="s" id="searchinput">
							<button id="searchsubmit"><i class="fa fa-search"></i></button>
						</div>
					</form>
				<?php } ?>
			</div>
		</section>
	</div>
</main>
<?php get_footer(); ?>