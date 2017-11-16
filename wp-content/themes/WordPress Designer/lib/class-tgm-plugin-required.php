<?php
require_once get_stylesheet_directory() . '/lib/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'child_plugins_register_required_plugins' );

function child_plugins_register_required_plugins() {
	$plugins = array(
		// This is an example of how to include a plugin bundled with a theme.
		/*Required Plugins*/
		array(
			'name'      => 'Advanced Custom Fields',
			'slug'      => 'advanced-custom-fields',
			'required'  => true,
			'force_deactivation' 	 => true, // If set to true, it forces the specified plugin to be active at all times while the current theme (or plugin) is active. The plugin can only be deactivated after switching themes or deactivation of your plugin.
		),
		array(
			'name'               => 'Beaver Builder (Lite Version)', // The plugin name.
			'slug'               => 'beaver-builder-lite-version', // The plugin slug (typically the folder name).
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		),
		array(
			'name'               => 'Beaver Builder Theme Modules', // The plugin name.
			'slug'               => 'beaver-builder-theme-modules', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/lib/plugins/beaver-builder-theme-modules.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
		),
		array(
			'name'               => 'Gravity Form', // The plugin name.
			'slug'               => 'gravityform', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/lib/plugins/gravityforms.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
		),
		array(
			'name'               => 'Gravity Form Custom Button', // The plugin name.
			'slug'               => 'customize-submit-button-for-gravity-forms', // The plugin slug (typically the folder name).
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		),
		array(
			'name'      => 'Breadcrumb NavXT',
			'slug'      => 'breadcrumb-navxt',
			'required'  => true,
			'force_deactivation' => false,
		),
		array(
			'name'      => 'WP-PageNavi',
			'slug'      => 'wp-pagenavi',
			'required'  => true,
			'force_deactivation' => false,
		),
		array(
			'name'      => 'Image Widget',
			'slug'      => 'image-widget',
			'required'  => true,
			'force_deactivation' => false,
		),
		
		/*Recommended Plugins*/
		array(
			'name'      => 'Advanced Custom Fields Repeater & Flexible Content Fields Collapser',
			'slug'      => 'advanced-custom-field-repeater-collapser',
			'required'  => false,
		),
		array(
			'name'      => 'Simple Custom Post Order',
			'slug'      => 'simple-custom-post-order',
			'required'  => false,
		),
		array(
			'name'      => 'Featured Image Admin Thumb',
			'slug'      => 'featured-image-admin-thumb-fiat',
			'required'  => false,
		),
		array(
			'name'      => 'Post Duplicator',
			'slug'      => 'post-duplicator',
			'required'  => false,
		),
		array(
			'name'      => 'Selection Sharer',
			'slug'      => 'selection-sharer',
			'required'  => false,
		),
		array(
			'name'      => 'LightGallery',
			'slug'      => 'lightgallery',
			'required'  => false,
		),
		array(
			'name'      => 'Simple Lightbox',
			'slug'      => 'simple-lightbox',
			'required'  => false,
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'child-plugins',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
	);

	tgmpa( $plugins, $config );
}
