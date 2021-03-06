<?php 
if( class_exists('acf') ){
	include_once( get_stylesheet_directory() . '/includes/acf/acf-repeater/acf-repeater.php' );
	include_once( get_stylesheet_directory() . '/includes/acf/acf-gallery/acf-gallery.php' );
	include_once( get_stylesheet_directory() . '/includes/acf/acf-nav-menu/acf-nav-menu.php' );
	
	/*Custom Post Type Start*/
	function my_acf_google_map_api( $api ){
		$api['key'] = 'AIzaSyARgl1K2BLpzVNMuj2QSaIgJznPsQpFQ0c';
		return $api;
	}
	add_filter('acf/fields/google_map/api', 'my_acf_google_map_api', 10);
	/*Custom Post Type End*/

	/*Heading Style*/
	if(function_exists("register_field_group"))
	{
		register_field_group(array (
			'id' => 'acf_header',
			'title' => 'Header',
			'fields' => array (
				array (
					'key' => 'field_58be643929f59',
					'label' => 'Header Style',
					'name' => 'header_style',
					'type' => 'radio',
					'choices' => array (
						'' => 'Default',
						'absolute' => 'Absolute <small>(Float Transparent - for Fullwidth Slider)</small>',
						'sticky' => 'Sticky',
					),
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => '',
					'layout' => 'vertical', //horizontal
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'page',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'side',
				'layout' => 'default',
				'hide_on_screen' => array (
					0 => 'custom_fields',
				),
			),
			'menu_order' => 0,
		));
	}

	/*Content Padding*/
	if(function_exists("register_field_group"))
	{
		register_field_group(array (
			'id' => 'acf_page-setting',
			'title' => 'Page Setting Option',
			'fields' => array (
				array (
					'key' => 'field_57a8495806610_page_setting',
					'label' => 'Page Setting',
					'name' => 'page_setting',
					'type' => 'radio',
					'choices' => array (
						'default' => 'Default',
						'no-title' => 'No Title',
						'no-header' => 'No Header',
						'no-footer' => 'No Footer',
						'no-header-footer' => 'No Header & Footer',
					),
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'default',
					'layout' => 'vertical',
				),
				array (
					'key' => 'field_57a8495806610',
					'label' => 'Content Padding',
					'name' => 'content_padding',
					'type' => 'radio',
					'instructions' => 'You can remove space padding in top or bottom',
					'choices' => array (
						'default' => 'Default',
						'bottom-padding' => 'Bottom Padding',
						'top-padding' => 'Top Padding',
						'no-padding' => 'No Padding',
					),
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'default',
					'layout' => 'vertical',
				),
				array (
					'key' => 'field_58991a95e46e5',
					'label' => 'Page Title',
					'name' => 'page_title',
					'type' => 'text',
					'instructions' => 'Page title with html code',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_58991ad1e46e6',
					'label' => 'Page Title Description',
					'name' => 'page_title_description',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_58991aede46e7',
					'label' => 'Page Title Background',
					'name' => 'page_title_background',
					'type' => 'image',
					'save_format' => 'object',
					'preview_size' => 'medium',
					'library' => 'all',
				),
				array (
					'key' => 'field_58991aede46e7_position',
					'label' => 'Page Title Background Position',
					'name' => 'page_title_background_position',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '50% 50%',
					'instructions' => 'ie: 50% -100px',
					'prepend' => 'background-position',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_58991aede46e7_position_parallax',
					'label' => 'Page Title Background Position Parallax',
					'name' => 'page_title_background_position_parallax',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '50% 70%',
					'instructions' => 'Set background position value to enable PARALLAX effect on scroll 50% 0-100%',
					'prepend' => 'background-position',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_58991b29e46e8',
					'label' => 'Page Title Background Overlay',
					'name' => 'page_title_background_overlay',
					'type' => 'color_picker',
					'default_value' => '#1a4168',
				),
				array (
					'key' => 'field_58991b875c8cc',
					'label' => 'Page Title Background Overlay Opacity',
					'name' => 'page_title_background_overlay_opacity',
					'type' => 'number',
					'default_value' => '70',
					'placeholder' => 70,
					'prepend' => 'from 1 - 100',
					'append' => '%',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array (
					'key' => 'field_58991aede46e7_image_1',
					'label' => 'Page Title Image 1',
					'name' => 'page_title_image_1',
					'type' => 'image',
					'save_format' => 'object',
					'preview_size' => 'medium',
					'library' => 'all',
				),
				array (
					'key' => 'field_58991aede46e7_image_1_top',
					'label' => 'Page Title Image 1 Top',
					'name' => 'page_title_image_1_top',
					'type' => 'number',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => 'top',
					'append' => 'px',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array (
					'key' => 'field_58991aede46e7_image_2',
					'label' => 'Page Title Image 2',
					'name' => 'page_title_image_2',
					'type' => 'image',
					'save_format' => 'object',
					'preview_size' => 'medium',
					'library' => 'all',
				),
				array (
					'key' => 'field_58991aede46e7_image_2_top',
					'label' => 'Page Title Image 2 Top',
					'name' => 'page_title_image_2_top',
					'type' => 'number',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => 'top',
					'append' => 'px',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array (
					'key' => 'field_57a8495802017',
					'label' => 'Alignment',
					'name' => 'page_title_alignment',
					'type' => 'radio',
					'choices' => array (
						'' => 'Default',
						'left' => 'Left',
						'center' => 'Center',
						'right' => 'Right',
					),
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => '',
					'layout' => 'horizontal',
				),
				array (
					'key' => 'field_57a8495802017_breadcrumbs',
					'label' => 'Breadcrumbs',
					'name' => 'page_title_breadcrumbs',
					'type' => 'radio',
					'choices' => array (
						'' => 'Default',
						'on' => 'On',
						'off' => 'Off',
					),
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => '',
					'layout' => 'horizontal',
				),
				array (
					'key' => 'field_57a8495802017_top',
					'label' => 'Page Title Padding Top',
					'name' => 'page_title_padding_top',
					'type' => 'number',
					'default_value' => '',
					'placeholder' => 30,
					'prepend' => 'padding-top',
					'append' => 'px',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array (
					'key' => 'field_57a8495802017_bottom',
					'label' => 'Page Title Padding Bottom',
					'name' => 'page_title_padding_bottom',
					'type' => 'number',
					'default_value' => '',
					'placeholder' => 40,
					'prepend' => 'padding-bottom',
					'append' => 'px',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array (
					'key' => 'field_57a8495802017_button',
					'label' => 'Page Title button',
					'name' => 'page_title_button',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => 'STATS <i class="fa fa-bar-chart" aria-hidden="true"></i>',
					'instructions' => 'This will replace the Breadcrumbs',
					'prepend' => 'Button Label',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array (
					'key' => 'field_57a8495802017_button_url',
					'label' => 'Page Title button Url',
					'name' => 'page_title_button_url',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '#link',
					'instructions' => 'This will replace the Breadcrumbs',
					'prepend' => 'Button Link',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array (
					'key' => 'field_57a8495802017_button_2',
					'label' => 'Page Title button 2',
					'name' => 'page_title_button_2',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => 'SCHEDULE <i class="fa fa-calendar" aria-hidden="true"></i>',
					'instructions' => 'This will replace the Breadcrumbs',
					'prepend' => 'Button Label',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
				),
				array (
					'key' => 'field_57a8495802017_button_2_url',
					'label' => 'Page Title button 2 Url',
					'name' => 'page_title_button_2_url',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '#link',
					'instructions' => 'This will replace the Breadcrumbs',
					'prepend' => 'Button Link',
					'append' => '',
					'min' => '',
					'max' => '',
					'step' => '',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'post',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'page',
						'order_no' => 0,
						'group_no' => 0,
					),
					array (
						'param' => 'page_type',
						'operator' => '!=',
						'value' => 'front_page',
						'order_no' => 1,
						'group_no' => 0,
					),
					array (
						'param' => 'page_template',
						'operator' => '!=',
						'value' => 'page-landing.php',
						'order_no' => -1,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'default',
				'hide_on_screen' => array (
					1 => 'custom_fields',
					2 => 'discussion',
					3 => 'comments',
					//4 => 'revisions',
					5 => 'slug',
					6 => 'author',
					7 => 'send-trackbacks',
				),
			),
			'menu_order' => 100,
		));
	}
	
	/*Post Format*/
	if(function_exists("register_field_group"))
	{
		register_field_group(array (
			'id' => 'acf_post-format-audio',
			'title' => 'Post Format - Audio',
			'fields' => array (
				array (
					'key' => 'field_58e72553b0ff1',
					'label' => 'Audios',
					'name' => 'audios',
					'type' => 'repeater',
					'sub_fields' => array (
						array (
							'key' => 'field_58e72617d86a5',
							'label' => 'Source',
							'name' => 'source',
							'type' => 'select',
							'column_width' => '',
							'choices' => array (
								'media' => 'Media',
								'url' => 'Url',
							),
							'default_value' => 'media',
							'allow_null' => 0,
							'multiple' => 0,
						),
						array (
							'key' => 'field_58e7261fd86a6',
							'label' => 'Audio File',
							'name' => 'audio_file',
							'type' => 'file',
							'conditional_logic' => array (
								'status' => 1,
								'rules' => array (
									array (
										'field' => 'field_58e72617d86a5',
										'operator' => '==',
										'value' => 'media',
									),
								),
								'allorany' => 'all',
							),
							'column_width' => '',
							'save_format' => 'object',
							'library' => 'all',
						),
						array (
							'key' => 'field_58e72659d86a7',
							'label' => 'Audio Url',
							'name' => 'audio_url',
							'type' => 'text',
							'conditional_logic' => array (
								'status' => 1,
								'rules' => array (
									array (
										'field' => 'field_58e72617d86a5',
										'operator' => '==',
										'value' => 'url',
									),
								),
								'allorany' => 'all',
							),
							'column_width' => '',
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'formatting' => 'html',
							'maxlength' => '',
						),
						array (
							'key' => 'field_58e7266ad86a8',
							'label' => 'Poster',
							'name' => 'poster',
							'type' => 'image',
							'column_width' => '',
							'save_format' => 'object',
							'preview_size' => 'thumbnail',
							'library' => 'all',
						),
						array (
							'key' => 'field_58e72672d86a9',
							'label' => 'Title',
							'name' => 'title',
							'type' => 'text',
							'column_width' => '',
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'formatting' => 'html',
							'maxlength' => '',
						),
						array (
							'key' => 'field_58e727776546a',
							'label' => 'Author',
							'name' => 'author',
							'type' => 'text',
							'column_width' => '',
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'formatting' => 'html',
							'maxlength' => '',
						),
						array (
							'key' => 'field_58e74f163b1c9',
							'label' => 'Background Color',
							'name' => 'background_color',
							'type' => 'color_picker',
							'column_width' => '',
							'default_value' => '',
						),
						array (
							'key' => 'field_58e74f5b37193',
							'label' => 'UI Color',
							'name' => 'ui_color',
							'type' => 'radio',
							'column_width' => '',
							'choices' => array (
								'dark' => 'Dark',
								'light' => 'Light',
							),
							'other_choice' => 0,
							'save_other_choice' => 0,
							'default_value' => 'dark',
							'layout' => 'horizontal',
						),
					),
					'row_min' => '',
					'row_limit' => '',
					'layout' => 'row',
					'button_label' => 'Add Audio',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_format',
						'operator' => '==',
						'value' => 'audio',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'no_box',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
		register_field_group(array (
			'id' => 'acf_post-format-gallery',
			'title' => 'Post Format - Gallery',
			'fields' => array (
				array (
					'key' => 'field_58da22330e48d',
					'label' => 'Gallery',
					'name' => 'gallery',
					'type' => 'gallery',
					'preview_size' => 'thumbnail',
					'library' => 'all',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_format',
						'operator' => '==',
						'value' => 'gallery',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'no_box',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
		register_field_group(array (
			'id' => 'acf_post-format-image',
			'title' => 'Post Format - Image',
			'fields' => array (
				array (
					'key' => 'field_58da22330e48d',
					'label' => 'Gallery',
					'name' => 'gallery',
					'type' => 'gallery',
					'preview_size' => 'thumbnail',
					'library' => 'all',
				),
				array (
					'key' => 'field_58e34cfc55f3d',
					'label' => 'Style',
					'name' => 'style',
					'type' => 'radio',
					'choices' => array (
						'slider' => 'Slider',
						'carousel' => 'Carousel',
					),
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'slider',
					'layout' => 'horizontal',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_format',
						'operator' => '==',
						'value' => 'image',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'no_box',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
		register_field_group(array (
			'id' => 'acf_post-format-link',
			'title' => 'Post Format - Link',
			'fields' => array (
				array (
					'key' => 'field_58ead9866efbd',
					'label' => 'Source',
					'name' => 'source',
					'type' => 'select',
					'choices' => array (
						'page' => 'Page',
						'url' => 'URL',
					),
					'default_value' => 'page',
					'allow_null' => 0,
					'multiple' => 0,
				),
				array (
					'key' => 'field_58ead9786efbc',
					'label' => 'Link',
					'name' => 'link',
					'type' => 'page_link',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_58ead9866efbd',
								'operator' => '==',
								'value' => 'page',
							),
						),
						'allorany' => 'all',
					),
					'post_type' => array (
						0 => 'all',
					),
					'allow_null' => 0,
					'multiple' => 0,
				),
				array (
					'key' => 'field_58ead9ba6efbe',
					'label' => 'Url',
					'name' => 'url',
					'type' => 'text',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_58ead9866efbd',
								'operator' => '==',
								'value' => 'url',
							),
						),
						'allorany' => 'all',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_58eadb08cb87b',
					'label' => 'Link Text',
					'name' => 'link_text',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_58eadb08cb87b_icon',
					'label' => 'Icon',
					'name' => 'icon',
					'type' => 'image',
					'column_width' => '',
					'save_format' => 'object',
					'preview_size' => 'thumbnail',
					'library' => 'all',
				),
				array (
					'key' => 'field_58eadb08cb87b_color',
					'label' => 'Bg Color',
					'name' => 'bg_color',
					'type' => 'color_picker',
					'default_value' => '',
				),
				array (
					'key' => 'field_58eadb08cb87b_color_text',
					'label' => 'Text Color',
					'name' => 'text_color',
					'type' => 'color_picker',
					'default_value' => '',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_format',
						'operator' => '==',
						'value' => 'link',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'no_box',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
		register_field_group(array (
			'id' => 'acf_post-format-video',
			'title' => 'Post Format - Video',
			'fields' => array (
				array (
					'key' => 'field_58dc7938747f4',
					'label' => 'Videos',
					'name' => 'videos',
					'type' => 'repeater',
					'sub_fields' => array (
						array (
							'key' => 'field_58de24e013c3f',
							'label' => 'Source',
							'name' => 'source',
							'type' => 'select',
							'column_width' => '',
							'choices' => array (
								'media' => 'Media',
								'oembed' => 'oEmbed',
							),
							'default_value' => '',
							'allow_null' => 0,
							'multiple' => 0,
						),
						array (
							'key' => 'field_58de264113c42',
							'label' => 'Video oEmbed',
							'name' => 'video_oembed',
							'type' => 'oembed',
							'conditional_logic' => array (
								'status' => 1,
								'rules' => array (
									array (
										'field' => 'field_58de24e013c3f',
										'operator' => '==',
										'value' => 'oembed',
									),
								),
								'allorany' => 'all',
							),
							'column_width' => '',
							'preview_size' => 0,
							'returned_size' => 0,
							'returned_format' => 'url',
						),
						array (
							'key' => 'field_58dc7973747f5',
							'label' => 'Video File',
							'name' => 'video_file',
							'type' => 'file',
							'conditional_logic' => array (
								'status' => 1,
								'rules' => array (
									array (
										'field' => 'field_58de24e013c3f',
										'operator' => '==',
										'value' => 'media',
									),
								),
								'allorany' => 'all',
							),
							'column_width' => '',
							'save_format' => 'object',
							'library' => 'all',
						),
						array (
							'key' => 'field_58dc9fa67c215',
							'label' => 'Poster',
							'name' => 'poster',
							'type' => 'image',
							'instructions' => 'This poster is for thumbnail navigation and media file cover only.',
							'column_width' => '',
							'save_format' => 'object',
							'preview_size' => 'thumbnail',
							'library' => 'all',
						),
						array (
							'key' => 'field_58dc7994747f6',
							'label' => 'Title',
							'name' => 'title',
							'type' => 'text',
							'column_width' => '',
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'formatting' => 'html',
							'maxlength' => '',
						),
						array (
							'key' => 'field_58dc799f747f7',
							'label' => 'Description',
							'name' => 'description',
							'type' => 'textarea',
							'column_width' => '',
							'default_value' => '',
							'placeholder' => '',
							'maxlength' => '',
							'rows' => '',
							'formatting' => 'br',
						),
					),
					'row_min' => '',
					'row_limit' => '',
					'layout' => 'row',
					'button_label' => 'Add Video',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_format',
						'operator' => '==',
						'value' => 'video',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'no_box',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
		register_field_group(array (
			'id' => 'acf_post-format-quote',
			'title' => 'Post Format - Quote',
			'fields' => array (
				array (
					'key' => 'field_58fd5fe60ae55',
					'label' => 'Quote',
					'name' => 'quote',
					'type' => 'textarea',
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => '',
					'formatting' => 'br',
				),
				array (
					'key' => 'field_58fd5ff50ae56',
					'label' => 'Author',
					'name' => 'author',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_58fd5ffe0ae57',
					'label' => 'Position',
					'name' => 'position',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_58fd600b0ae58',
					'label' => 'Avatar',
					'name' => 'avatar',
					'type' => 'image',
					'save_format' => 'object',
					'preview_size' => 'thumbnail',
					'library' => 'all',
				),
				array (
					'key' => 'field_58fd601b0ae59',
					'label' => 'Bg Color',
					'name' => 'bg_color',
					'type' => 'color_picker',
					'default_value' => '',
				),
				array (
					'key' => 'field_58fd602e0ae5a',
					'label' => 'Text Color',
					'name' => 'text_color',
					'type' => 'color_picker',
					'default_value' => '',
				),
				array (
					'key' => 'field_58fd7645ab816',
					'label' => 'Text Hightlight Color',
					'name' => 'text_hightlight_color',
					'type' => 'color_picker',
					'default_value' => '',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_format',
						'operator' => '==',
						'value' => 'quote',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'no_box',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
	}
}
?>