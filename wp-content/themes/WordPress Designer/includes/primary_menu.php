<?php 
	$menuClass = 'main-menu';
	$menuID = 'primary-menu';
	$primaryNav = '';
	if (function_exists('wp_nav_menu')) {
		$primaryNav = wp_nav_menu( array( 'theme_location' => $menuID, 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => $menuID, 'echo' => false ) );
	};
	if ($primaryNav == '') { ?>
		<ul id="<?php echo esc_attr($menuID); ?>" class="<?php echo esc_attr($menuClass); ?>">
			<?php if (get_option('chameleon_home_link') == 'on' && !get_option('page_for_posts')) { ?>
			<li <?php if (is_home()) echo( 'class="current_page_item"') ?>>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_html_e('Home','Chameleon'); ?>"><?php esc_html_e('Home','Chameleon'); ?></a>
			</li>
			<?php }; ?>
			<?php show_page_menu($menuClass,false,false); ?>
		</ul>
	<?php }
	else echo($primaryNav); 
?>