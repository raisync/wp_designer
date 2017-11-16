<?php
/**
 * @class featuredBlurbSetModule
 */
class featuredBlurbSetModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('Featured Blurb Set', 'fl-builder'),
			'description'   	=> __('Display a Featured Blurb Set.', 'fl-builder'),
			'category'      	=> __('Theme Modules', 'fl-builder'),
			'partial_refresh'	=> true
		));
		// Register and enqueue your own.
	}
	
	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		//$classname = 'portfolio-mixitup' . $this->settings->layout;
		//return $classname;
	}
}

/*Testimonial Avatar Size*/
add_image_size( 'portfolio-mixitup', 366 , 366, true );

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('featuredBlurbSetModule', array(
	'content'         => array(
		'title'         => __('Content', 'fl-builder'),
        'sections'      => array(
            'general'       => array(
                'title'         => '',
                'fields'        => array(
                    'items'         => array(
                        'type'          => 'form',
                        'label'         => __('Blurb Content', 'fl-builder'),
                        'form'          => 'featured_blurb_template_form', // ID from registered form below
                        'preview_text'  => 'blurb_title', // Name of a field to use for the preview text
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
					),                      
				)
			),
			'heading_style'       => array(
				'title'         => 'Heading Style',
				'fields'        => array(
                    'tag'           => array(
						'type'          => 'select',
						'label'         => __( 'HTML Tag', 'fl-builder' ),
						'default'       => 'h2',
						'options'       => array(
							'h1'            =>  'h1',
							'h2'            =>  'h2',
							'h3'            =>  'h3',
							'h4'            =>  'h4',
							'h5'            =>  'h5',
							'h6'            =>  'h6'
						)
					),
                )
            ),
            'blurb_style'       => array(
				'title'         => 'Blurb Style',
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

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('featured_blurb_template_form', array(
	'title' => __('Add Content', 'fl-builder'),
	'tabs'  => array(
        'Content'       => array(
            'title'         => 'Content',
            'sections'        => array(
                'photo_options'       => array(
                    'title'         => __('Photo Options', 'fl-builder'),
                    'fields'        => array(
                        'photo_source'  => array(
                            'type'          => 'select',
                            'label'         => __('Photo Source', 'fl-builder'),
                            'default'       => 'library',
                            'options'       => array(
                                'library'       => __('Media Library', 'fl-builder'),
                                'url'           => __('URL', 'fl-builder')
                            ),
                            'toggle'        => array(
                                'library'       => array(
                                    'fields'        => array('photo')
                                ),
                                'url'           => array(
                                    'fields'        => array('photo_url', 'caption')
                                )
                            )
                        ),
                        'photo'         => array(
                            'type'          => 'photo',
                            'label'         => __('Photo', 'fl-builder')
                        ),
                        'photo_url'     => array(
                            'type'          => 'text',
                            'label'         => __('Photo URL', 'fl-builder'),
                            'placeholder'   => __( 'http://www.example.com/my-photo.jpg', 'fl-builder' )
                        ),
                    )
                ),
                'content'       => array(
                    'title'         => 'Content',
                    'fields'        => array(
                        'blurb_title'        => array(
                            'type'            => 'text',
                            'label'           => __('Heading Text', 'fl-builder'),
                            'default'         => '',
                            'preview'         => array(
                                'type'            => 'text',
                                'selector'        => '.fl-heading-text'
                            )
                        ),
                        'blurb_content' => array(
                            'type'          => 'textarea',
                            'label'           => __('Excerpt', 'fl-builder'),
                            'default'         => '',
                            'rows'          => 4,
                            'preview'       => array(
                                'type'          => 'text',
                                'selector'      => '.fl-blurb-content'
                            )
                        )
                    )
                ),
                'link'       => array(
                    'title'         => 'Link',
                    'fields'        => array(
                        'link_url'     => array(
                            'type'          => 'link',
                            'label'         => __('Link URL', 'fl-builder'),
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
                        ),
                    )
                )
            )
        )
	)
));