<?php

/**
 * @class terraniaIconSetModule
 */
class terraniaIconSetModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('Icon Set', 'fl-builder'),
			'description'   	=> __('Display Sets of Icon with Text.', 'fl-builder'),
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
FLBuilder::register_module('terraniaIconSetModule', array(
    'menu'         => array(
		'title'         => __('Header Menu', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
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
						'label'         => __('Photo Background', 'fl-builder'),
                        'description'   => 'Add a photo background',
					),
					'photo_url'     => array(
						'type'          => 'text',
						'label'         => __('Photo URL', 'fl-builder'),
						'placeholder'   => __( 'http://www.example.com/my-photo.jpg', 'fl-builder' )
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
							'selector'        => '.fl-heading-text'
						)
					),
                    'subheading'        => array(
						'type'            => 'text',
						'label'           => __('Subheading Text', 'fl-builder'),
						'default'         => '',
						'preview'         => array(
							'type'            => 'text',
							'selector'        => '.fl-subheading-text'
						)
					)
				)
			),
            'alignment'          => array(
				'title'         => __('Heading Text Alignment', 'fl-builder'),
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
							'selector'        => '.alignment',
							'property'        => 'text-align'
						)
					)
				)
			),
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
	'icon'         => array(
		'title'         => __('Icon Blurb', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'items'         => array(
						'type'          => 'form',
						'label'         => __('Icon Blurb', 'fl-builder'),
						'form'          => 'icon_blurb_template_form', // ID from registered form below
						'preview_text'  => 'icon_blurb_title', // Name of a field to use for the preview text
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
FLBuilder::register_settings_form('icon_blurb_template_form', array(
	'title' => __('Add Icon Blurb', 'fl-builder'),
	'tabs'  => array(
		'general'      => array(
			'title'         => __('Icon Blurb content', 'fl-builder'),
			'sections'      => array(
				'content'       => array(
					'title'         => __('Icon Blurb Content', 'fl-builder'),
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