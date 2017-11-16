<?php if ( get_field('page_setting', $blogSetting) !== 'no-title') { 
	$blogSetting = 
	$page_title_bg = 
	$page_title_overlay_content = 
	$page_title_alignment = 
	$page_title_padding_top = 
	$page_title_background_position = 
	$page_title_padding_bottom = 
	$page_title_background_position_parralax_start = 
	$page_title_background_position_parralax_end = ''
?>
	<?php if( class_exists('acf') ) { 
		if ( is_home() ) {
			$blogSetting = get_option('page_for_posts');
		}
		/*background*/
		if (get_field('page_title_background', $blogSetting) <> '') {
			$bg = get_field('page_title_background', $blogSetting);
			$page_title_bg = 'background-image: url('.$bg['url'].');';
		}
		if (get_field('page_title_background_position', $blogSetting) <> '') {
			$page_title_background_position = ' background-position: '.get_field('page_title_background_position', $blogSetting).';';
			$page_title_background_position_parralax_start = get_field('page_title_background_position', $blogSetting);
		}
		if (get_field('page_title_background_position_parallax', $blogSetting) <> '') {
			$page_title_background_position_parralax_end = get_field('page_title_background_position_parallax', $blogSetting);
		}
		$page_heading_styles = ' style="'.$page_title_bg.$page_title_background_position.$page_title_padding_top.$page_title_padding_bottom.'"';
		/*overlay*/
		if (get_field('page_title_background_overlay', $blogSetting) <> '') {
			$page_title_overlay = ' background-color:'.get_field('page_title_background_overlay', $blogSetting).';';
		}
		if (get_field('page_title_background_overlay_opacity', $blogSetting) <> '') {
			$page_title_overlay_opacity = ' opacity:'.(get_field('page_title_background_overlay_opacity', $blogSetting)/100).';';
		}
		if (get_field('page_title_background_overlay', $blogSetting) && get_field('page_title_background_overlay_opacity', $blogSetting)) {
			$page_title_overlay_content = '<div class="page-heading-overlay" style="'.$page_title_overlay.$page_title_overlay_opacity.'"></div>';
		}
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
		/*effects*/
		$page_title_effect_tilter = ' tilter';
		$page_title_effect_tilter__figure = ' tilter__figure';
		$page_title_effect_tilter__deco = ' tilter__deco tilter__deco--overlay';
		if ( $page_title_alignment == ' center' ) {
			$page_title_effect_tilter__caption = ' tilter__caption';
		} else {
			$page_title_effect_tilter__caption = ' tilter__deco tilter__deco--lines';
		}
		$page_title_effect_tilter__image = ' tilter__image';
		$page_title_alignment_class = ' '.$page_title_alignment.' tilter-hover';
		/*image*/
		$page_title_image_1 = '';
		if (get_field('page_title_image_1', $blogSetting) <> '') {
			$page_title_image_1 = get_field('page_title_image_1', $blogSetting);
			$page_title_image_1_top = get_field('page_title_image_1_top', $blogSetting);
			if ($page_title_image_1_top <> '') {
				$page_title_image_1_top = 'style="top: '.$page_title_image_1_top.'px; bottom: auto;"';
			}
			if ($page_title_alignment == ' center') {
				$page_title_image_1 = ' <div class="page-title-image page-title-image-1 fl-animation fl_zoomInLeft fl_delay-0-8'.$page_title_effect_tilter__image.'"><img src="'.$page_title_image_1['url'].'"'.$page_title_image_1_top.' alt="'.$page_title_image_1['title'].'"></div>';
			} else {
				$page_title_image_1 = ' <div class="page-title-image page-title-image-1 fl-animation fl_fadeInUp fl_delay-0-8'.$page_title_effect_tilter__image.'"><img src="'.$page_title_image_1['url'].'"'.$page_title_image_1_top.' alt="'.$page_title_image_1['title'].'"></div>';
			}
		}
		$page_title_image_2 = '';
		if (get_field('page_title_image_2', $blogSetting) <> '') {
			$page_title_image_2 = get_field('page_title_image_2', $blogSetting);
			$page_title_image_2_top = get_field('page_title_image_2_top', $blogSetting);
			if ($page_title_image_2_top <> '') {
				$page_title_image_2_top = 'style="top: '.$page_title_image_2_top.'px; bottom: auto;"';
			}
			if ($page_title_alignment == ' center') {
				$page_title_image_2 = ' <div class="page-title-image page-title-image-2 fl-animation fl_fadeInUp fl_delay-1-3"><img class="'.$page_title_effect_tilter__deco.'"'.$page_title_image_2_top.' src="'.$page_title_image_2['url'].'" alt="'.$page_title_image_2['title'].'"></div>';
			} else {
				$page_title_image_2 = ' <div class="page-title-image page-title-image-2 fl-animation fl_bounceInUp fl_delay-1-3"><img class="'.$page_title_effect_tilter__deco.'"'.$page_title_image_2_top.' src="'.$page_title_image_2['url'].'" alt="'.$page_title_image_2['title'].'"></div>';
			}
		}
		/*padding*/
		if (get_field('page_title_padding_top', $blogSetting) <> '') {
			$page_title_padding_top = ' padding-top: '.get_field('page_title_padding_top', $blogSetting).'px;';
		}
		if (get_field('page_title_padding_bottom', $blogSetting) <> '') {
			$page_title_padding_bottom = ' padding-bottom: '.get_field('page_title_padding_bottom', $blogSetting).'px;';
		}
		$page_heading_container_styles = ' style="'.$page_title_padding_top.$page_title_padding_bottom.'"';
	} ?>
	<section
	<?php if ( empty($page_title_background_position_parralax_end) ) { ?>
		class="page-heading <?php echo $page_title_alignment_class; ?>"<?php echo $page_heading_styles; ?> 
	<?php } else { ?>
		class="page-heading <?php echo $page_title_alignment_class; ?> parallax"<?php echo $page_heading_styles; ?> 
		data-bottom-top="background-position: <?php echo $page_title_background_position_parralax_start <> '' ? $page_title_background_position_parralax_start : '50% 30%'; ?>" 
		data-top-bottom="background-position: <?php echo $page_title_background_position_parralax_end; ?>"
	<?php } ?>
	>
		<?php echo $page_title_overlay_content; ?>
		<div class="page-heading-inner<?php echo $page_title_effect_tilter; ?>">
			<div class="container-fluid">
				<div class="page-heading-content<?php echo $page_title_effect_tilter__figure; ?>"<?php echo $page_heading_container_styles; ?>>
					<?php if( class_exists('acf') ) { ?>
						<?php
						$breadcrumbs = '';
						if ( get_field('page_title_breadcrumbs', $blogSetting) == '' ) {
							$breadcrumbs = get_option('chameleon_breadcrumbs');
						} else {
							$breadcrumbs = get_field('page_title_breadcrumbs', $blogSetting);
						}
						if ( $breadcrumbs == 'on' ) { ?>
							<div id="breadcrumbs" class="heading fl-animation fl_fadeInDown fl_delay-0-5">
								<?php get_template_part('includes/breadcrumbs'); ?>
							</div>
						<?php }; ?>
					<?php }; ?>
					<?php
						$et_tagline = '';
						if( is_tag() ) {
							$et_page_title = esc_html__('Posts Tagged &quot;','Chameleon') . single_tag_title('',false) . '&quot;';
						} elseif (is_day()) {
							$et_page_title = esc_html__('Posts made in','Chameleon') . ' ' . get_the_time('F jS, Y');
						} elseif (is_month()) {
							$et_page_title = esc_html__('Posts made in','Chameleon') . ' ' . get_the_time('F, Y');
						} elseif (is_year()) {
							$et_page_title = esc_html__('Posts made in','Chameleon') . ' ' . get_the_time('Y');
						} elseif (is_search()) {
							if (get_search_query() <> '') {
								$et_page_title = '<span>Search Results for</span> '.get_search_query();
							} else {
								$et_page_title = '<span>Search Results for</span> All Entries';
							}
						} elseif (is_category()) {
							$et_page_title = single_cat_title('',false);
							$et_tagline = category_description();
						} elseif (is_tax()) {
							$et_page_title = single_cat_title('',false);
						} elseif (is_author()) {
							global $wp_query;
							$curauth = $wp_query->get_queried_object();
							$et_page_title = $curauth->nickname;
						} elseif ( is_page() ) {
							$et_page_title = get_the_title();
							$et_tagline = get_post_meta(get_the_ID(),'Description',true) ? get_post_meta(get_the_ID(),'Description',true) : '';
						} elseif ( is_custom_post_type() ) {
							if ( get_option('chameleon_services_title') <> '' ) {
								$et_page_title = get_option('chameleon_services_title');
							} else {
								$postType = get_post_type_object(get_post_type());
								$et_page_title = $postType->labels->singular_name;
							}
						} elseif ( !get_option('page_for_posts') ) {
							if ( get_option('chameleon_post_title') <> '' ) {
								if ( is_single() ) $et_page_title = get_option('chameleon_post_title');
							} else {
								if ( is_single() ) $et_page_title = 'News';
							}
						} elseif ( is_single() || get_option('page_for_posts') ) {
							if ( get_option('chameleon_post_title') <> '' ) {
								if ( is_single() ) { 
									$et_page_title = get_option('chameleon_post_title');
								} else {
									$et_page_title = apply_filters('the_title',get_page( get_option('page_for_posts') )->post_title);
									$page_id = ( 'page' == get_option( 'show_on_front' ) ? get_option( 'page_for_posts' ) : get_the_ID );
									$et_tagline = get_post_meta( $page_id, 'Description', true );
								}
							} else {
								$et_page_title = apply_filters('the_title',get_page( get_option('page_for_posts') )->post_title);
								$page_id = ( 'page' == get_option( 'show_on_front' ) ? get_option( 'page_for_posts' ) : get_the_ID );
								$et_tagline = get_post_meta( $page_id, 'Description', true );
							}
						}
					?>
					<?php if ( is_singular() && !is_page() ) { ?>
							<h1 class="title fl-animation fl_appear<?php echo $page_title_effect_tilter__caption; ?>">
								<?php the_title(); ?>
							</h1>
							<?php if ( is_single() && !is_custom_post_type() ) get_template_part('includes/post_info'); ?>
					<?php } elseif ( is_category() ) { ?>
							<h1 class="title fl-animation fl_appear<?php echo $page_title_effect_tilter__caption; ?>">
								<?php echo wp_kses( $et_page_title, array( 'span' => array() ) ); ?>
							</h1>
							<?php if ( is_single() ) get_template_part('includes/post_info'); ?>
					<?php } elseif ( is_tax() ) { ?>
							<h1 class="title fl-animation fl_appear<?php echo $page_title_effect_tilter__caption; ?>">
								<?php echo wp_kses( $et_page_title, array( 'span' => array() ) ); ?>
							</h1>
							<?php if ( is_single() ) get_template_part('includes/post_info'); ?>
					<?php } elseif ( is_author() ) { ?>
							<h1 class="title fl-animation fl_appear<?php echo $page_title_effect_tilter__caption; ?>">
								<?php echo wp_kses( $et_page_title, array( 'span' => array() ) ); ?>
							</h1>
							<?php if ( is_single() ) get_template_part('includes/post_info'); ?>
					<?php } elseif ( is_search() ) { ?>
							<h1 class="title fl-animation fl_appear<?php echo $page_title_effect_tilter__caption; ?>">
								<?php echo wp_kses( $et_page_title, array( 'span' => array() ) ); ?>
							</h1>
							<?php if ( is_single() ) get_template_part('includes/post_info'); ?>
					<?php } else { ?>
						<?php if( class_exists('acf') ) { ?>
							<h1 class="title fl-animation fl_appear<?php echo $page_title_effect_tilter__caption; ?>">
							<?php if ( get_field('page_title', $blogSetting) ) { ?> 
								<?php echo get_field('page_title', $blogSetting); ?>
							<?php } else { ?>
								<?php echo wp_kses( $et_page_title, array( 'span' => array() ) ); ?>
							<?php } ?>
							</h1>
							<?php if ( get_field('page_title_description', $blogSetting) ) { ?> 
								<div class="title-description heading fl-animation fl_appear fl_delay-0"><?php echo get_field('page_title_description', $blogSetting); ?></div>
							<?php } ?>
						<?php } else { ?>
							<h1 class="title fl-animation fl_appear<?php echo $page_title_effect_tilter__caption; ?>"><?php echo wp_kses( $et_page_title, array( 'span' => array() ) ); ?></h1>
						<?php } ?>
						<?php if ( $et_tagline <> '' ) { ?> <p id="description" class="fl-animation fl_appear fl_delay-0-3"><?php echo wp_kses( $et_tagline, array( 'span' => array() ) ); ?></p> <?php } ?>
					<?php } ?>
					<?php if ( !is_front_page() && !is_page_template('page-no-title.php') ) {
						if ( class_exists('acf') ) { 
							if( get_field('title_sub_menu', $blogSetting) ) {
								echo '<nav class="title-submenu-nav fl-animation fl_appear fl_delay-0-6">';
									echo wp_nav_menu( array( 'menu' => get_field('title_sub_menu', $blogSetting), 'container' => '', 'menu_class' => 'title-submenu', 'depth' => '1', 'echo' => false ) );
								echo '</nav> ';
							}
						} 
					} ?>
					<?php echo $page_title_image_1.$page_title_image_2; ?>
				</div>
				<?php if ( get_field('page_title_button_url', $blogSetting) <> '' || get_field('page_title_button_2_url', $blogSetting) <> '' ) { ?>
				<div class="page-title-button fl-animation fl_zoomIn fl_delay-2">
					<?php if ( get_field('page_title_button_url', $blogSetting) <> '' ) { ?>
						<a class="btn" href="<?php echo get_field('page_title_button_url', $blogSetting); ?>"><?php echo get_field('page_title_button', $blogSetting); ?></a>
					<?php } ?>
					<?php if ( get_field('page_title_button_2_url', $blogSetting) <> '' ) { ?>
						<a class="btn btn-primary" href="<?php echo get_field('page_title_button_2_url', $blogSetting); ?>"><?php echo get_field('page_title_button_2', $blogSetting); ?></a>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>