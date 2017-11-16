<?php

/**
 * @class listModule
 */
class listModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('List', 'fl-builder'),
			'description'   	=> __('Display a list.', 'fl-builder'),
			'category'      	=> __('Theme Modules', 'fl-builder'),
			'partial_refresh'	=> true
		));
		// Register and enqueue your own.
//		$this->add_css( 'owl-carousel', FL_MODULE_THEME_URL . 'assets/owlcarousel/owl.carousel.css' );
//		$this->add_css( 'owl-carousel-theme', FL_MODULE_THEME_URL . 'assets/owlcarousel/owl.theme.default.min.css' );
//		$this->add_js( 'owl-carousel', FL_MODULE_THEME_URL . 'assets/owlcarousel/owl.carousel.min.js', array(), '', true );
//		$this->add_js( 'parallax-stellar', FL_MODULE_THEME_URL . 'assets/js/jquery.stellar.js', array(), '', true );
//        $this->add_js( 'scrollme', FL_MODULE_THEME_URL . 'assets/js/jquery.scrollme.js', array(), '', true );
	}
	/**
	 * @method get_classname
	 */
//	public function get_classname()
//	{
//		$classname = 'slider-template-1';
//		return $classname;
//	}
//----------------------------------------------------------------------------------------------------------------
    /**
	 * @method get_classname
	 */
//	public function get_menuclassname()
//	{
//		$classname = 'header-sticky';
//		return $classname;
//	}
//----------------------------------------------------------------------------------------------------------------
}

/*Module Image Size*/
add_image_size( 'slider-ui-image', 1000 , 907, true );

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('listModule', array(
    'menu'         => array(
		'title'         => __('Header Menu', 'fl-builder'),
		'sections'      => array(
            'style'       => array(
				'title'         => 'Properties',
				'fields'        => array(
					'columns'  => array(
						'type'          => 'select',
						'label'         => __('Number of Columns per row', 'fl-builder'),
						'default'       => '3',
						'options'       => array(
							'12'       => __('1 column only', 'fl-builder'),
							'6'        => __('2 columns', 'fl-builder'),
							'4'        => __('3 columns', 'fl-builder'),
							'3'        => __('4 columns', 'fl-builder'),
						)
					),
                    'str_limit' => array(
						'type'          => 'text',
						'label'         => __('Limit Excerpt', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'characters (including whitespaces)',
						'placeholder'   => '10'
					),
				)
			)
		)
	),
    'text_style'         => array(
		'title'         => __('Text Style', 'fl-builder'),
		'sections'      => array(
			'colors'        => array(
				'title'         => __('Colors', 'fl-builder'),
				'fields'        => array(
					'color'          => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Text Color', 'fl-builder'),
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.list-item-content h2',
                            'property'        => 'color',
						)	
					),
                    'opacity' => array(
						'type'          => 'text',
						'label'         => __('Opacity', 'fl-builder'),
						'default'       => '1',
						'maxlength'     => '3',
						'size'          => '4',
						'preview'         => array(
                            'type'            => 'css',
                            'rules'        => array(
                                array(
                                    'selector'        => '.list-item-content h2',
                                    'property'        => 'opacity',
                                ),
                                    array(
                                    'selector'        => '.list-item-content p',
                                    'property'        => 'opacity',
                                ),
                            )
						)
					),
                    'icon_color'          => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Icon Color', 'fl-builder'),
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '#lists i.icon-lg',
                            'property'        => 'color',
						)	
					),
				)
			),
            'structure'     => array(
				'title'         => __('List Item Style', 'fl-builder'),
				'fields'        => array(
                    'font'          => array(
						'type'          => 'font',
						'default'		=> array(
							'family'		=> 'Default',
							'weight'		=> 300
						),
						'label'         => __('Font', 'fl-builder'),
						'preview'         => array(
                            'type'            => 'css',
                            'rules'        => array(
                                array(
                                    'selector'        => '.list-item-content h2',
                                    'property'        => 'font-family',
                                ),
                                    array(
                                    'selector'        => '.list-item-content p',
                                    'property'        => 'font-family',
                                ),
                            )
						)						
					),
                    'icon_size'     => array(
						'type'          => 'select',
						'label'         => __('Icon Size', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('custom_icon_size')
							)
						)
					),
					'custom_icon_size' => array(
						'type'          => 'text',
						'label'         => __('Custom Icon Size', 'fl-builder'),
						'default'       => '24',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'font_size'     => array(
						'type'          => 'select',
						'label'         => __('Font Size', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('custom_font_size')
							)
						)
					),
					'custom_font_size' => array(
						'type'          => 'text',
						'label'         => __('Custom Font Size', 'fl-builder'),
						'default'       => '24',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'line_height'     => array(
						'type'          => 'select',
						'label'         => __('Line Height', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('custom_line_height')
							)
						)
					),
					'custom_line_height' => array(
						'type'          => 'text',
						'label'         => __('Custom Line Height', 'fl-builder'),
						'default'       => '1.4',
						'maxlength'     => '4',
						'size'          => '4',
						'description'   => 'em'
					),
					'letter_spacing'     => array(
						'type'          => 'select',
						'label'         => __('Letter Spacing', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('custom_letter_spacing')
							)
						)
					),
					'custom_letter_spacing' => array(
						'type'          => 'text',
						'label'         => __('Custom Letter Spacing', 'fl-builder'),
						'default'       => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					)
                )
            ),
            'p_structure'   => array(
				'title'         => __( 'Content Structure', 'fl-builder' ),
				'fields'        => array(
                    'p_font'          => array(
						'type'          => 'font',
						'default'		=> array(
							'family'		=> 'Default',
							'weight'		=> 300
						),
						'label'         => __('Font', 'fl-builder'),
						'preview'         => array(
                            'type'            => 'css',
                            'rules'        => array(
                                array(
                                    'selector'        => '.list-item-content h2',
                                    'property'        => 'font-family',
                                ),
                                    array(
                                    'selector'        => '.list-item-content p',
                                    'property'        => 'font-family',
                                ),
                            )
						)						
					),
					'p_font_size'     => array(
						'type'          => 'select',
						'label'         => __('Font Size', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('p_custom_font_size')
							)
						)
					),
					'p_custom_font_size' => array(
						'type'          => 'text',
						'label'         => __('Custom Font Size', 'fl-builder'),
						'default'       => '24',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'p_line_height'     => array(
						'type'          => 'select',
						'label'         => __('Line Height', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('p_custom_line_height')
							)
						)
					),
					'p_custom_line_height' => array(
						'type'          => 'text',
						'label'         => __('Custom Line Height', 'fl-builder'),
						'default'       => '1.4',
						'maxlength'     => '4',
						'size'          => '4',
						'description'   => 'em'
					),
					'p_letter_spacing'     => array(
						'type'          => 'select',
						'label'         => __('Letter Spacing', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('p_custom_letter_spacing')
							)
						)
					),
					'p_custom_letter_spacing' => array(
						'type'          => 'text',
						'label'         => __('Custom Letter Spacing', 'fl-builder'),
						'default'       => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					)
                )
			)
        )
    ),
	'item'         => array(
		'title'         => __('List Item', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'items'         => array(
						'type'          => 'form',
						'label'         => __('List Item', 'fl-builder'),
						'form'          => 'list_item_template_form', // ID from registered form below
						'preview_text'  => 'title', // Name of a field to use for the preview text
						'multiple'      => true
					),
				)
			)
		)
	),
	
));

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('list_item_template_form', array(
	'title' => __('Add List Item', 'fl-builder'),
	'tabs'  => array(
		'general'      => array(
			'title'         => __('List Item content', 'fl-builder'),
			'sections'      => array(
				'content'       => array(
					'title'         => __('List Item Content', 'fl-builder'),
					'fields'        => array(
                        'image_options'     => array(
                            'type'          => 'select',
                            'label'         => __('Image Type', 'fl-builder'),
                            'default'       => 'default',
                            'options'       => array(
                                'icon'       =>  __('Icon', 'fl-builder'),
                                'image'      =>  __('Image', 'fl-builder')
                            ),
                            'toggle'        => array(
                                'icon'        => array(
                                    'fields'        => array('icon')
                                ),
                                'image'        => array(
                                    'fields'        => array('image')
                                )
                            )
                        ),
                        'icon'          => array(
                            'type'          => 'icon',
                            'label'         => __('Icon', 'fl-builder'),
                            'description'   => 'Select an Icon',
                        ),
                        'image'       => array(
                            'type'          => 'photo',
                            'label'         => 'an Image object',
                            'description'   => 'Upload an image object',
                        ),
                        'title'       => array(
							'type'          => 'text',
							'label'         => 'Title',
							'default'   => __('', 'fl-builder'),
							'placeholder'   => __('Enter Title', 'fl-builder'),
						),
						'excerpt'       => array(
							'type'          => 'textarea',
							'label'         => 'Excerpt',
							'default'   => __('', 'fl-builder'),
							'placeholder'   => __('Enter Excerpt', 'fl-builder'),
						)
					)
				),
			)
		)
	)
));