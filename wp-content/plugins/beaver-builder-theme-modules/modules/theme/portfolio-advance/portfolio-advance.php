<?php
/**
 * @class advancePostGalleryModule
 */
class advancePostGalleryModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('Advance Posts Gallery', 'fl-builder'),
			'description'   	=> __('Display Posts from Posttype.', 'fl-builder'),
			'category'      	=> __('Theme Modules', 'fl-builder'),
			'partial_refresh'	=> true
		));
		// Register and enqueue your own.
		$this->add_js( 'mixitup', $this->url . 'js/jquery.mixitup.min.js', array(), '', true );
	}
	
	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'portfolio-mixitup' . $this->settings->layout;
		return $classname;
	}
}

/*Testimonial Avatar Size*/
add_image_size( 'portfolio-mixitup', 366 , 366, true );

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('advancePostGalleryModule', array(
	'slides'         => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'posttype'         => array(
						'type'          => 'post-type',
						'label'         => __('Source', 'fl-builder'),
						'default'       => 'accomodations'
					),
					'totalpost'         => array(
						'type'          => 'text',
						'label'         => __('Number of Portfolio display', 'fl-builder'),
						'default'       => __('9', 'fl-builder'),
						'placeholder'       => __('9', 'fl-builder'),
						'maxlength'     => '2',
						'size'          => '3',
					),
					'grid'         => array(
						'type'          => 'select',
						'label'         => __('Number of Column', 'fl-builder'),
						'default'       => 'grid-4',
						'options'       => array(
							'grid-2'    		=> __('Column 6', 'fl-builder'),
							'grid-2-5'    		=> __('Column 5', 'fl-builder'),
							'grid-3'    		=> __('Column 4', 'fl-builder'),
							'grid-4'    		=> __('Column 3', 'fl-builder'),
							'grid-6'    		=> __('Column 2', 'fl-builder'),
							'grid-12'    		=> __('Column 1', 'fl-builder'),
						)
					),
					'effects'         => array(
						'type'          => 'select',
						'label'         => __('Animation Effects', 'fl-builder'),
						'default'       => 'rotateX',
						'options'       => array(
							'scale'    		=> __('scale', 'fl-builder'),
							'translateX'    => __('translateX', 'fl-builder'),
							'translateY'    => __('translateY', 'fl-builder'),
							'translateZ'    => __('translateZ', 'fl-builder'),
							'rotateX'    	=> __('rotateX', 'fl-builder'),
							'rotateY'    	=> __('rotateY', 'fl-builder'),
							'rotateZ'    	=> __('rotateZ', 'fl-builder'),
							'stagger'    	=> __('stagger', 'fl-builder'),
						)
					),
					'duration'         => array(
						'type'          => 'select',
						'label'         => __('Animation Duration', 'fl-builder'),
						'default'       => '400',
						'options'       => array(
							'300'    		=> __('300', 'fl-builder'),
							'400'    		=> __('400', 'fl-builder'),
							'500'    		=> __('500', 'fl-builder'),
							'600'    		=> __('600', 'fl-builder'),
							'700'    		=> __('700', 'fl-builder'),
							'800'    		=> __('800', 'fl-builder'),
							'900'    		=> __('900', 'fl-builder'),
							'1000'    		=> __('1000', 'fl-builder'),
						)
					),
                    'post_orderby'         => array(
						'type'          => 'select',
						'label'         => __('Order By', 'fl-builder'),
						'default'       => 'date',
						'options'       => array(
							'date'    		=> __('Date', 'fl-builder'),
							'name'          => __('Name', 'fl-builder')
						)
					),
                    'post_order'         => array(
						'type'          => 'select',
						'label'         => __('Order', 'fl-builder'),
						'default'       => 'ASC',
						'options'       => array(
							'ASC'    		=> __('Ascending', 'fl-builder'),
							'DESC'          => __('Descending', 'fl-builder')
						)
					),
                    'str_limit' => array(
						'type'          => 'text',
						'label'         => __('Post Content Limit', 'fl-builder'),
						'default'       => '',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'characters (including whitespaces)',
						'placeholder'   => '10'
					)
				)
			),
            'heading'       => array(
				'title'         => 'Heading',
				'fields'        => array(
					'heading'        => array(
						'type'            => 'text',
						'label'           => __('Heading Text', 'fl-builder'),
						'default'         => '',
						'preview'         => array(
							'type'            => 'text',
							'selector'        => '.post-heading-text'
						)
					)
				)
			)
		)
	),
	'style'        => array(
		'title'         => __('Style', 'fl-builder'),
		'sections'      => array(
            'navigation'       => array(
				'title'         => 'Navigation',
				'fields'        => array( 
                    'text_align'         => array(
						'type'          => 'select',
						'label'         => __('Positioning', 'fl-builder'),
						'default'       => 'right',
						'options'       => array(
							'left'    		 => __('Left', 'fl-builder'),
							'center'         => __('Center', 'fl-builder'),
							'right'          => __('Right', 'fl-builder')
						),
                        'preview'    => array(
                            'type'       => 'css',
                            'selector'   => '.portfolio-filter',
                            'property'   => 'text-align'
                        )
					),
                    'nav_color'          => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Active Item Color', 'fl-builder'),
                        'default'       => 'BE8D5E',
                        'preview'         => array(
							'type'         => 'css',
                            'rules'        => array (
                                array (
                                    'selector'        => '.portfolio-filter .active',
                                    'property'        => 'color'
                                ),
                                array (
                                    'selector'        => '.portfolio-filter .active',
                                    'property'        => 'border-bottom'
                                ),
                            )
							
						)	
					),
                )
            ),
            'posts'     => array(
				'title'         => __('Posts', 'fl-builder'),
				'fields'        => array(
                    'max_height'        => array(
						'type'          => 'select',
						'label'         => __('Image Full Height?', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'    => __('Yes', 'fl-builder'),
							'false'      => __('Custom', 'fl-builder'),
						),
                        'toggle'        => array(
							'false'       => array(
								'fields'        => array('img_height')
							)
						)
					),
                    'img_height'    => array(
						'type'          => 'unit',
						'label'         => __('Custom Height', 'fl-builder'),
						'default'       => '60',
						'description'   => '%',
						'maxlength'     => '3',
						'size'          => '5',
						'placeholder'   => '60'
					),
                )
            ),
            'structure'     => array(
				'title'         => __('Heading Text', 'fl-builder'),
				'fields'        => array(
                    'alignment'     => array(
						'type'          => 'select',
						'label'         => __('Alignment', 'fl-builder'),
						'default'       => 'left',
						'options'       => array(
							'left'      =>  __('Left', 'fl-builder'),
							'center'    =>  __('Center', 'fl-builder'),
							'right'     =>  __('Right', 'fl-builder')
						),
						'preview'         => array(
							'type'            => 'css',
							'selector'        => '.post-heading',
							'property'        => 'text-align'
						)
					),
                    'color'          => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Text Color', 'fl-builder'),
                        'preview'         => array(
							'type'            => 'css',
							'selector'        => '.post-heading-text',
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
							'selector'        => '.post-heading',
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
							'type'            => 'font',
							'selector'        => '.post-heading-text'
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
            'r_structure'   => array(
				'title'         => __( 'Mobile Structure Label', 'fl-builder' ),
				'fields'        => array(
					'r_alignment'   => array(
						'type'          => 'select',
						'label'         => __('Alignment', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('r_custom_alignment')
							)
						),
						'preview'         => array(
							'type'            => 'none'
						)
					),
					'r_custom_alignment' => array(
						'type'          => 'select',
						'label'         => __('Custom Alignment', 'fl-builder'),
						'default'       => 'center',
						'options'       => array(
							'left'      =>  __('Left', 'fl-builder'),
							'center'    =>  __('Center', 'fl-builder'),
							'right'     =>  __('Right', 'fl-builder')
						),
						'preview'         => array(
							'type'            => 'none'
						)
					),
					'r_font_size'   => array(
						'type'          => 'select',
						'label'         => __('Font Size', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('r_custom_font_size')
							)
						),
						'preview'         => array(
							'type'            => 'none'
						)
					),
					'r_custom_font_size' => array(
						'type'          => 'text',
						'label'         => __('Custom Font Size', 'fl-builder'),
						'default'       => '24',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px',
						'preview'         => array(
							'type'            => 'none'
						)
					),
					'r_line_height'     => array(
						'type'          => 'select',
						'label'         => __('Line Height', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('r_custom_line_height')
							)
						)
					),
					'r_custom_line_height' => array(
						'type'          => 'text',
						'label'         => __('Custom Line Height', 'fl-builder'),
						'default'       => '1.4',
						'maxlength'     => '4',
						'size'          => '4'
					),
					'r_letter_spacing'     => array(
						'type'          => 'select',
						'label'         => __('Letter Spacing', 'fl-builder'),
						'default'       => 'default',
						'options'       => array(
							'default'       =>  __('Default', 'fl-builder'),
							'custom'        =>  __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'custom'        => array(
								'fields'        => array('r_custom_letter_spacing')
							)
						)
					),
					'r_custom_letter_spacing' => array(
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
	)
));