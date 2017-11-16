<?php
/**
 * @class postFeaturedModule
 */
class postFeaturedModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('Post Featured', 'fl-builder'),
			'description'   	=> __('Display Posts from Posttype.', 'fl-builder'),
			'category'      	=> __('Theme Modules', 'fl-builder'),
			'partial_refresh'	=> true
		));
		// Register and enqueue your own.
//		$this->add_js( 'mixitup', $this->url . 'js/jquery.mixitup.min.js', array(), '', true );
        $this->add_css( 'owl-carousel', FL_MODULE_THEME_URL . 'assets/owlcarousel/owl.carousel.css' );
		$this->add_css( 'owl-carousel-theme', FL_MODULE_THEME_URL . 'assets/owlcarousel/owl.theme.default.min.css' );
		$this->add_js( 'owl-carousel', FL_MODULE_THEME_URL . 'assets/owlcarousel/owl.carousel.min.js', array(), '', true );
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
FLBuilder::register_module('postFeaturedModule', array(
	'slides'         => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
                    'posttype'         => array(
						'type'          => 'post-type',
						'label'         => __('Source', 'fl-builder'),
						'default'       => 'partner'
					),
					'totalpost'         => array(
						'type'          => 'text',
						'label'         => __('Number of Portfolio display', 'fl-builder'),
						'default'       => __('9', 'fl-builder'),
						'placeholder'       => __('9', 'fl-builder'),
						'maxlength'     => '2',
						'size'          => '1',
					),
					'grid'         => array(
						'type'          => 'select',
						'label'         => __('Number of Column', 'fl-builder'),
						'default'       => '4',
						'options'       => array(
							'6'    		=> __('Column 6', 'fl-builder'),
							'4'    		=> __('Column 4', 'fl-builder'),
							'3'    		=> __('Column 3', 'fl-builder'),
							'2'    		=> __('Column 2', 'fl-builder'),
							'1'    		=> __('Column 1', 'fl-builder'),
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
					)
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