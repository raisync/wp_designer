<?php

/**
 * @class customSliderModule
 */
class customSliderModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('Advance Banner Slider', 'fl-builder'),
			'description'   	=> __('Display an Advance Slider.', 'fl-builder'),
			'category'      	=> __('Theme Modules', 'fl-builder'),
			'partial_refresh'	=> true
		));
		// Register and enqueue your own.
		$this->add_css( 'owl-carousel', FL_MODULE_THEME_URL . 'assets/owlcarousel/owl.carousel.css' );
		$this->add_css( 'owl-carousel-theme', FL_MODULE_THEME_URL . 'assets/owlcarousel/owl.theme.default.min.css' );
		$this->add_js( 'owl-carousel', FL_MODULE_THEME_URL . 'assets/owlcarousel/owl.carousel.min.js', array(), '', true );
		$this->add_js( 'parallax-stellar', FL_MODULE_THEME_URL . 'assets/js/jquery.stellar.js', array(), '', true );
        $this->add_js( 'scrollme', FL_MODULE_THEME_URL . 'assets/js/jquery.scrollme.js', array(), '', true );
	}
	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'slider-template';
		return $classname;
	}
}

/*Module Image Size*/
add_image_size( 'slider-ui-image', 1000 , 907, true );

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('customSliderModule', array(
	'slides'         => array(
		'title'         => __('Slides', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'items'         => array(
						'type'          => 'form',
						'label'         => __('Slide', 'fl-builder'),
						'form'          => 'slider_template_1_form', // ID from registered form below
						'preview_text'  => 'slider_title', // Name of a field to use for the preview text
						'multiple'      => true
					),
				)
			)
		)
	),
	'style'        => array(
		'title'         => __('Style', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
                    'max_height'        => array(
						'type'          => 'select',
						'label'         => __('Slider Full Height?', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'       => __('Yes', 'fl-builder'),
							'false'      => __('No', 'fl-builder'),
						),
                        'toggle'        => array(
							'false'       => array(
								'fields'        => array('slider_height')
							)
						)
					),
                    'slider_height'    => array(
						'type'          => 'text',
						'label'         => __('Custom Height', 'fl-builder'),
						'default'       => '600',
						'description'   => 'px',
						'maxlength'     => '3',
						'size'          => '5',
						'placeholder'   => '600'
					),
					'mobile_max_height'    => array(
						'type'          => 'text',
						'label'         => __('Mobile - Slider Height', 'fl-builder'),
						'default'       => '600',
						'description'   => 'px',
						'maxlength'     => '3',
						'size'          => '5',
						'placeholder'   => '600'
					), 
					'autoplay'        => array(
						'type'          => 'select',
						'label'         => __('Autoplay', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'    => __('Yes', 'fl-builder'),
							'false'      => __('No', 'fl-builder'),
						)
					), 
					'slider_bg_color'       => array(
						'type'          => 'color',
						'label'         => 'Background Color',
						'show_reset'    => true,
					),   
					'overlay_opacity'    => array(
						'type'          => 'text',
						'label'         => __('Background Overlay Opacity', 'fl-builder'),
						'default'       => '50',
						'description'   => '%',
						'maxlength'     => '3',
						'size'          => '5',
						'placeholder'   => '0'
					)
				)
			),
            'positioning'       => array(
				'title'         => 'Position of Slider Text',
				'fields'        => array(
                    't_position'        => array(
						'type'          => 'select',
						'label'         => __('Set Position', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'l_top'      => __('Top Left', 'fl-builder'),
							'r_top'      => __('Top Right', 'fl-builder'),
							'l_bot'      => __('Bottom Left', 'fl-builder'),
							'r_bot'      => __('Bottom Right', 'fl-builder'),
							'center'     => __('Center', 'fl-builder'),
						)
					),
                    'h_margin'    => array(
						'type'          => 'text',
						'label'         => __('Set Horizontal Text Margin', 'fl-builder'),
						'default'       => '20',
						'description'   => 'px',
						'maxlength'     => '3',
						'size'          => '5',
						'placeholder'   => '0'
					),
                    'v_margin'    => array(
						'type'          => 'text',
						'label'         => __('Set Vertical Text Margin', 'fl-builder'),
						'default'       => '20',
						'description'   => 'px',
						'maxlength'     => '3',
						'size'          => '5',
						'placeholder'   => '0'
					)
                    
                )
            ),
            'button_style'     => array(
				'title'         => __('Button Style', 'fl-builder'),
				'fields'        => array(
                    'btn_margintop' => array(
                        'type'          => 'text',
                        'label'         => __('Button Margin Top (adjust button position between the banner text)', 'fl-builder'),
                        'description'   => __(' px', 'fl-builder'),
                        'default'       => '8',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => 'a.slider-ui-button',
                            'property'        => 'margin-top',
                            'unit'            => 'px'
                        )
                    ),
                    'btn_bgcolor'        => array(
						'type'          => 'select',
						'label'         => __('Button Background Color', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'transparent'    => __('Transparent', 'fl-builder'),
							'custom'      => __('Custom', 'fl-builder'),
						),
                        'toggle'        => array(
							'custom'        => array(
								'fields'        => array('custom_btn_bgcolor', 'btn_opacity')
							)
						)
					),
                    'custom_btn_bgcolor'          => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Button Highlight Color', 'fl-builder'),
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.slider-ui-button.highlight',
                            'property'        => 'background-color',
						)	
					),
                    'border_color'          => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Button Border Color', 'fl-builder'),
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.slider-ui-button.highlight',
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
                            'selector'        => '.slider-ui-button.highlight',
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
                            'selector'        => '.slider-ui-button.highlight',
							'property'        => 'border-style'
                        )
                    ),
                    'btn_color'          => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Button Highlight Font Color', 'fl-builder'),
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.slider-ui-button.highlight',
                            'property'        => 'color',
						)	
					),
                    'btn_opacity' => array(
						'type'          => 'text',
						'label'         => __('Opacity', 'fl-builder'),
						'default'       => '1',
						'maxlength'     => '3',
						'size'          => '4',
						'preview'         => array(
							'type'            => 'css',
                            'rules'       => array(
                                array (
                                    'selector'        => '.slider-ui-button',
                                    'property'        => 'opacity'
                                ),
                                array (
                                    'selector'        => '.slider-ui-button.highlight',
                                    'property'        => 'opacity'
                                ),
                            )
							
						)
					),
                    'btn_font'          => array(
						'type'          => 'font',
						'default'		=> array(
							'family'		=> 'Default',
							'weight'		=> 300
						),
						'label'         => __('Font', 'fl-builder'),					
					),
                    'btn_b_radius' => array(
						'type'          => 'text',
						'label'         => __('Add Border Radius', 'fl-builder'),
						'default'       => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
                        'preview'         => array(
                            'type'            => 'css',
                            'rules'       => array(
                                array (
                                    'selector'        => '.slider-ui-button.highlight',
                                    'property'        => 'border-radius',
                                ),
                                array (
                                    'selector'        => '.slider-ui-button',
                                    'property'        => 'border-radius',
                                ),
                            )
						)	
					),
					'btn_font_size'     => array(
						'type'          => 'select',
						'label'         => __('Font Size', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('btn_custom_font_size')
							)
						)
					),
					'btn_custom_font_size' => array(
						'type'          => 'text',
						'label'         => __('Custom Font Size', 'fl-builder'),
						'default'       => '24',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'btn_line_height'     => array(
						'type'          => 'select',
						'label'         => __('Line Height', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('btn_custom_line_height')
							)
						)
					),
					'btn_custom_line_height' => array(
						'type'          => 'text',
						'label'         => __('Custom Line Height', 'fl-builder'),
						'default'       => '1.4',
						'maxlength'     => '4',
						'size'          => '4',
						'description'   => 'em'
					),
					'btn_letter_spacing'     => array(
						'type'          => 'select',
						'label'         => __('Letter Spacing', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('btn_custom_letter_spacing')
							)
						)
					),
					'btn_custom_letter_spacing' => array(
						'type'          => 'text',
						'label'         => __('Custom Letter Spacing', 'fl-builder'),
						'default'       => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					)
                )
            ),
			'padding'       => array(
				'title'         => 'Padding',
				'fields'        => array(       
					'padding_top'       => array(
						'type'          => 'text',
						'label'         => 'Top',
						'placeholder'         => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),    
					'padding_bottom'       => array(
						'type'          => 'text',
						'label'         => 'Bottom',
						'placeholder'         => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),    
					'padding_left'       => array(
						'type'          => 'text',
						'label'         => 'Left',
						'placeholder'         => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),    
					'padding_right'       => array(
						'type'          => 'text',
						'label'         => 'Right',
						'placeholder'         => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
					),
				)
			)
		)
	),
    'text_style'         => array(
		'title'         => __('Text Style', 'fl-builder'),
		'sections'      => array(
			'pre_structure'     => array(
				'title'         => __('Pretitle Structure', 'fl-builder'),
				'fields'        => array(
                    'pre_title_color'          => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Title Text Color', 'fl-builder'),
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.slider-parallax-text h3',
                            'property'        => 'color'
						)
					),
                    'pre_title_opacity' => array(
						'type'          => 'text',
						'label'         => __('Title Text Opacity', 'fl-builder'),
						'default'       => '1',
						'maxlength'     => '3',
						'size'          => '4',
						'preview'         => array(
							'type'            => 'css',
							'selector'        => '.slider-parallax-text h3',
                            'property'        => 'opacity'
						)
					),
                    'pre_font'          => array(
						'type'          => 'font',
						'default'		=> array(
							'family'		=> 'Default',
							'weight'		=> 300
						),
						'label'         => __('Font', 'fl-builder'),
						'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.slider-parallax-text h3',
                            'property'        => 'color'
						)						
					),
					'pre_font_size'     => array(
						'type'          => 'select',
						'label'         => __('Font Size', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('pre_custom_font_size')
							)
						)
					),
					'pre_custom_font_size' => array(
						'type'          => 'text',
						'label'         => __('Custom Font Size', 'fl-builder'),
						'default'       => '24',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'pre_line_height'     => array(
						'type'          => 'select',
						'label'         => __('Line Height', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('pre_custom_line_height')
							)
						)
					),
					'pre_custom_line_height' => array(
						'type'          => 'text',
						'label'         => __('Custom Line Height', 'fl-builder'),
						'default'       => '1.4',
						'maxlength'     => '4',
						'size'          => '4',
						'description'   => 'em'
					),
					'pre_letter_spacing'     => array(
						'type'          => 'select',
						'label'         => __('Letter Spacing', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('pre_custom_letter_spacing')
							)
						)
					),
					'pre_custom_letter_spacing' => array(
						'type'          => 'text',
						'label'         => __('Custom Letter Spacing', 'fl-builder'),
						'default'       => '0',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					)
                )
            ),
            'structure'     => array(
				'title'         => __('Title/Heading Structure', 'fl-builder'),
				'fields'        => array(
                    'title_color'          => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Title Text Color', 'fl-builder'),
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.slider-parallax-text h2',
                            'property'        => 'color',
						)
					),
                    'title_opacity' => array(
						'type'          => 'text',
						'label'         => __('Title Text Opacity', 'fl-builder'),
						'default'       => '1',
						'maxlength'     => '3',
						'size'          => '4',
						'preview'         => array(
							'type'            => 'css',
							'selector'        => '.slider-parallax-text h2',
                            'property'        => 'opacity'
						)
					),
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
                                    'selector'        => '.slider-parallax-text h2',
                                    'property'        => 'color',
                                ),
                                    array(
                                    'selector'        => '.slider-parallax-text p',
                                    'property'        => 'color',
                                ),
                            )
						)						
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
                    'content_color'          => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Content Text Color', 'fl-builder'),
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.slider-parallax-text p',
                            'property'        => 'color',
						)
					),
                    'content_opacity' => array(
						'type'          => 'text',
						'label'         => __('Content Text Opacity', 'fl-builder'),
						'default'       => '1',
						'maxlength'     => '3',
						'size'          => '4',
						'preview'         => array(
							'type'            => 'css',
							'selector'        => '.slider-parallax-text p',
                            'property'        => 'opacity'
						)
					),
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
                                    'selector'        => '.slider-parallax-text h2',
                                    'property'        => 'color',
                                ),
                                    array(
                                    'selector'        => '.slider-parallax-text p',
                                    'property'        => 'color',
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
    )
));

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('slider_template_1_form', array(
	'title' => __('Add Slide', 'fl-builder'),
	'tabs'  => array(
		'general'      => array(
			'title'         => __('Slider Info', 'fl-builder'),
			'sections'      => array(
				'info'       => array(
					'title'         => __('Slider Info', 'fl-builder'),
					'fields'        => array(
						'slider_bg_image'       => array(
							'type'          => 'photo',
							'label'         => 'Background Image',
						),
                        'slider_pretitle'       => array(
							'type'          => 'text',
							'label'         => 'Pretitle',
							'default'       => __('', 'fl-builder'),
							'placeholder'   => __('Pretitle', 'fl-builder'),
						),
						'slider_title'       => array(
							'type'          => 'text',
							'label'         => 'Title',
							'default'       => __('', 'fl-builder'),
							'placeholder'   => __('Title', 'fl-builder'),
						),
						'slider_text'       => array(
							'type'          => 'textarea',
							'label'         => 'Text',
							'default'       => __('', 'fl-builder'),
                            'placeholder'   => __('Enter Slider text...', 'fl-builder'),
						),
						'slider_btn_title'       => array(
							'type'          => 'text',
							'label'         => 'Button Title',
							'default'       => '',
							'placeholder'   => __('Enter Button Title...', 'fl-builder'),
						),
						'slider_btn_1_label'       => array(
							'type'          => 'text',
							'label'         => 'Button 1 label',
							'default'       => '',
                            'placeholder'   => __('Button 1 Label', 'fl-builder'),
						),
						'slider_btn_1_link'       => array(
							'type'          => 'link',
							'label'         => 'Button 1 Link',
						),
						'slider_btn_2_label'       => array(
							'type'          => 'text',
							'label'         => 'Button 2 label',
							'default'       => '',
                            'placeholder'   => __('Button 2 Label', 'fl-builder'),
						),
						'slider_btn_2_link'       => array(
							'type'          => 'link',
							'label'         => 'Button 2 Link',
						),
					)
				),
			)
		)
	)
));