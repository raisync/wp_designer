<?php

/**
 * @class buttonsAdvancedModule
 */
class buttonsAdvancedModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('Buttons - Advance', 'fl-builder'),
			'description'   	=> __('Displays Multiple Buttons with advanced settings.', 'fl-builder'),
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
FLBuilder::register_module('buttonsAdvancedModule', array(
    'item'         => array(
		'title'         => __('Button Items', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'items'         => array(
						'type'          => 'form',
						'label'         => __('Button Item', 'fl-builder'),
						'form'          => 'button_item_template_form', // ID from registered form below
						'preview_text'  => 'title', // Name of a field to use for the preview text
						'multiple'      => true
					),
				)
			)
		)
	),
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
		'title'         => __('Global Buttons Style', 'fl-builder'),
		'sections'      => array(
            'style'        => array(
				'title'         => __('Button Style', 'fl-builder'),
				'fields'        => array(
                    'overall_style'     => array(
						'type'          => 'select',
						'label'         => __('Overall Button Style', 'fl-builder'),
						'default'       => 'solid',
						'options'       => array(
							'solid'       =>  __('Solid', 'fl-builder'),
							'bordered'    =>  __('Bordered', 'fl-builder'),
							'ultimate'    =>  __('Ultimate', 'fl-builder')
						),
                        'toggle'        => array(
                            'solid'        => array(
								'fields'        => array('btn_bg')
							),
							'bordered'        => array(
								'fields'        => array('border_color', 'border_style', 'border_width')
							),
                            'ultimate'        => array(
								'fields'        => array('btn_bg', 'border_color', 'border_style', 'border_width')
							)
						)
					),
                    'border_color'          => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Button Border Color', 'fl-builder'),
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '#buttons .button-item',
                            'property'        => 'border-color'
						)
					),
                    'border_width' => array(
                        'type'          => 'unit',
                        'label'         => __('Border Width', 'fl-builder'),
                        'description'   => __(' px', 'fl-builder'),
                        'default'       => '8',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '#buttons .button-item',
                            'property'        => 'border-width',
                            'unit'            => 'px'
                        )
                    ),
                    'border_style'     => array(
                        'type'          => 'select',
                        'label'         => __('Border Line Style', 'fl-builder'),
                        'default'       => 'solid',
                        'options'       => array(
                            'dashed'      =>  __('Dashed', 'fl-builder'),
                            'dotted'      =>  __('Dotted', 'fl-builder'),
                            'double'      =>  __('Double', 'fl-builder'),
                            'solid'       =>  __('Solid', 'fl-builder'),
                            'groove'      =>  __('Groove', 'fl-builder'),
                            'ridge'       =>  __('Ridge', 'fl-builder')
                        ),
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '#buttons .button-item',
							'property'        => 'border-style'
                        )
                    ),
                    'btn_radius' => array(
                        'type'          => 'unit',
                        'label'         => __('Add Border Radius', 'fl-builder'),
                        'description'   => __(' px', 'fl-builder'),
                        'placeholder'   => __('20', 'fl-builder'),
                        'default'       => '8',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '#buttons .button-item',
                            'property'        => 'border-radius',
                            'unit'            => 'px'
                        )
                    ),
                    'btn_dropshadow'     => array(
                        'type'          => 'select',
                        'label'         => __('Add Button Drop Shadow', 'fl-builder'),
                        'default'       => 'none',
                        'options'       => array(
                            'none'         =>  __('None', 'fl-builder'),
                            'light'        =>  __('Light', 'fl-builder'),
                            'normal'       =>  __('Normal', 'fl-builder'),
                            'dark'         =>  __('Dark', 'fl-builder'),
                            'darker'       =>  __('Darker', 'fl-builder'),
                            'darkest'      =>  __('Black as Night', 'fl-builder')
                        ),
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '#buttons .button-item',
							'property'        => 'box-shadow'
                        )
                    ),
                )
            ),
			'colors'        => array(
				'title'         => __('Colors', 'fl-builder'),
				'fields'        => array(
                    'btn_bg'          => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Button Background Color', 'fl-builder'),
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '#buttons .button-item',
                            'property'        => 'background-color'
						)
					),
					'color'          => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Text Color', 'fl-builder'),
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.button-item-content h2',
                            'property'        => 'color' 
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
                            'selector'        => '.button-item-content h2',
                            'property'        => 'opacity'
						)
					),
                    'icon_color'          => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Icon Color', 'fl-builder'),
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '#buttons i.icon-lg',
                            'property'        => 'color' 
						)
					),
                    'hover_color'          => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Hover Color', 'fl-builder'),
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '#buttons .button-item:hover',
                            'property'        => 'background' 
						)
					),
                    'hover_text_color'          => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Hover Text Color', 'fl-builder'),
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '#buttons .button-item:hover',
                            'property'        => 'color'
						)
					)
				)
			),
            'structure'     => array(
				'title'         => __('Button Item Style', 'fl-builder'),
				'fields'        => array(
                    'font'          => array(
						'type'          => 'font',
						'default'		=> array(
							'family'		=> 'Default',
							'weight'		=> 300
						),
						'label'         => __('Font', 'fl-builder'),
						'preview'         => array(
                            'type'            => 'font',
                            'selector'        => '.button-item-content h2'
						)						
					),
                    'font_style'     => array(
						'type'          => 'select',
						'label'         => __('Font Style', 'fl-builder'),
						'default'       => 'normal',
						'options'       => array(
							'normal'       =>  __('Normal', 'fl-builder'),
							'italic'       =>  __('Italic', 'fl-builder')
						),
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.button-item-content',
                            'property'        => 'font-style'
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
					),
                    'btn_padding'     => array(
						'type'          => 'select',
						'label'         => __('Button Padding', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('custom_btn_padding')
							)
						)
					),
					'custom_btn_padding' => array(
						'type'          => 'text',
						'label'         => __('Custom Button Padding', 'fl-builder'),
						'default'       => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '#button .button-item',
                            'property'        => 'padding',
                            'unit'            => 'px'
						)
					)
                )
            )
        )
    ),
	
));

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('button_item_template_form', array(
	'title' => __('Add button Item', 'fl-builder'),
	'tabs'  => array(
		'general'      => array(
			'title'         => __('Button Item content', 'fl-builder'),
			'sections'      => array(
				'content'       => array(
					'title'         => __('Button Item Content', 'fl-builder'),
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
                            'show_remove'   => true
                        ),
                        'image'       => array(
                            'type'          => 'photo',
                            'label'         => 'an Image object',
                            'description'   => 'Upload an image object',
                            'show_remove'   => true
                        ),
                        'title'       => array(
							'type'          => 'text',
							'label'         => 'Title',
							'default'   => __('', 'fl-builder'),
							'placeholder'   => __('Enter Title', 'fl-builder'),
						)
					)
				),
                'link'          => array(
                    'title'         => __('Link', 'fl-builder'),
                    'fields'        => array(
                        'link'          => array(
                            'type'          => 'link',
                            'label'         => __('Link', 'fl-builder'),
                            'preview'         => array(
                                'type'            => 'none'
                            )
                        ),
                        'link_target'   => array(
                            'type'          => 'select',
                            'label'         => __('Link Target', 'fl-builder'),
                            'default'       => '_self',
                            'options'       => array(
                                '_self'         => __('Same Window', 'fl-builder'),
                                '_blank'        => __('New Window', 'fl-builder')
                            ),
                            'preview'         => array(
                                'type'            => 'none'
                            )
                        )
                    )
                )
            )
        ),
        'style'      => array(
            'title'         => __('Style', 'fl-builder'),
            'sections'      => array(
                
            )
        )
	)
));