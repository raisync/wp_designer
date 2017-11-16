<?php
/**
 * @class terraniaTeamModule
 */
class terraniaTeamModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('Team Gallery', 'fl-builder'),
			'description'   	=> __('Display Folio from Posttype.', 'fl-builder'),
			'category'      	=> __('Theme Modules', 'fl-builder'),
			'partial_refresh'	=> true
		));
		// Register and enqueue your own.
//		$this->add_js( 'mixitup', $this->url . 'js/jquery.mixitup.min.js', array(), '', true );
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
FLBuilder::register_module('terraniaTeamModule', array(
	'slides'         => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
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
						'default'       => 'col-md-4',
						'options'       => array(
							'col-md-2'    		=> __('Column 6', 'fl-builder'),
							'col-md-3'    		=> __('Column 4', 'fl-builder'),
							'col-md-4'    		=> __('Column 3', 'fl-builder'),
							'col-md-6'    		=> __('Column 2', 'fl-builder'),
							'col-md-12'    		=> __('Column 1', 'fl-builder'),
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