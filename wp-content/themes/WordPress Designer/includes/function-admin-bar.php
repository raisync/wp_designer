<?php
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'customize' );
}

add_action( 'admin_bar_menu', 'toolbar_epanel_setting', 50 );
function toolbar_epanel_setting( $wp_admin_bar ) {
    $website = esc_url( home_url() );
	$args = array(
		'id'    => 'theme-option',
		'title' => 'Theme Option',
		'href'  => ''.$website.'/wp-admin/themes.php?page=core_functions.php',
		'meta'  => array( 'class' => 'dashicons-admin-tools' ),
	);
	$wp_admin_bar->add_node( $args );
}
if ( !is_admin()) {
	add_action('admin_bar_menu', 'menu_bar_settings', 999);
	function menu_bar_settings() {
		global $wp_admin_bar;
		$website = esc_url( home_url() );
		$menu_site_name = 'site-name';
		$wp_admin_bar->add_menu(array('parent' => $menu_site_name, 'id' => 'all-plugins', 'title' => 'Plugins', 'href' => $website.'/wp-admin/plugins.php', 'meta'  => array( 'class' => 'menu-bar-plugins' ),));
		$wp_admin_bar->add_menu(array('parent' => $menu_site_name, 'id' => 'all-settings', 'title' => 'Settings', 'href' => $website.'/wp-admin/options-general.php', 'meta'  => array( 'class' => 'menu-bar-settings' ),));
		$wp_admin_bar->add_menu(array('parent' => $menu_site_name, 'id' => 'all-post', 'title' => 'Posts', 'href' => $website.'/wp-admin/edit.php?post_type=post', 'meta'  => array( 'class' => 'menu-bar-post' ),));
		$wp_admin_bar->add_menu(array('parent' => $menu_site_name, 'id' => 'all-pages', 'title' => 'Pages', 'href' => $website.'/wp-admin/edit.php?post_type=page', 'meta'  => array( 'class' => 'menu-bar-pages' ),));
	}
}
?>