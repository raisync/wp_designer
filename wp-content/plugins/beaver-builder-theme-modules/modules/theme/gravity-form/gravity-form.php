<?php

/**
 * @class gFormModule
 */
class gFormModule extends FLBuilderModule {

	/**
	 * @property $data
	 */
	public $data = null;

	/**
	 * @property $_editor
	 * @protected
	 */
	protected $_editor = null;

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('Gravity Form', 'fl-builder'),
			'description'   	=> __('Display a Form with Gravity Forms', 'fl-builder'),
			'category'      	=> __('Theme Modules', 'fl-builder'),
			'partial_refresh'	=> true
		));
	}

}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('gFormModule', array(
	'general'       => array( // Tab
		'title'         => __('General', 'fl-builder'), // Tab title
		'sections'      => array( // Tab Sections
			'general'       => array( // Section
				'title'         => '', // Section Title
				'fields'        => array( // Section Fields
					'design_style'     => array(
                        'type'          => 'select',
                        'label'         => __('Look and Feel', 'fl-builder'),
                        'description'   => __('Select form design', 'fl-builder'),
                        'default'       => 'style1',
                        'options'       => array(
                            'style1'      =>  __('Style 1', 'fl-builder'),
                            'style2'      =>  __('Style 2', 'fl-builder')
                        )
                    ),
				)
			)
		)
	),
    'form'         => array(
		'title'         => __('Gravity Form', 'fl-builder'),
		'sections'      => array(
			'form'       => array(
				'title'         => '',
				'fields'        => array(
                    'form_id'        => array(
						'type'          => 'text',
						'label'         => __('Form ID', 'fl-builder'),
                        'description'   => '',
                        'placeholder'   => 'ID',
						'default'       => '1',
						'size'          => '3',
					),
                    'show_title'     => array(
						'type'          => 'select',
						'label'         => __('Show Form Title?', 'fl-builder'),
						'default'       => 'false',
						'options'       => array(
							'true'       =>  __('Yes', 'fl-builder'),
							'false'      =>  __('No', 'fl-builder')
						),
						'preview'         => array(
							'type'            => 'none'
						)
					),
                    'show_description'     => array(
						'type'          => 'select',
						'label'         => __('Show Form Description?', 'fl-builder'),
						'default'       => 'false',
						'options'       => array(
							'true'       =>  __('Yes', 'fl-builder'),
							'false'      =>  __('No', 'fl-builder')
						),
						'preview'         => array(
							'type'            => 'none'
						)
					),
                    'ajax'     => array(
						'type'          => 'select',
						'label'         => __('Enable Ajax?', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'       =>  __('Yes', 'fl-builder'),
							'false'      =>  __('No', 'fl-builder')
						),
						'preview'         => array(
							'type'            => 'none'
						)
					),
                    'tabindex'        => array(
						'type'          => 'text',
						'label'         => __('Tab Index', 'fl-builder'),
                        'description'   => '',
                        'placeholder'   => '49',
						'default'       => '49',
						'size'          => '3',
					),
				)
			)
		)
	),
    'style'         => array(
		'title'         => __('Label Style', 'fl-builder'),
		'sections'      => array(
			'colors'        => array(
				'title'         => __('Colors', 'fl-builder'),
				'fields'        => array(
                    'photo'         => array(
						'type'          => 'photo',
                        'show_reset'    => true,
						'label'         => __('Photo Background', 'fl-builder'),
                        'description'   => 'Add a photo background (leave blank for none)',
					),
					'bg_color'          => array(
                        'type'          => 'color',
                        'show_reset'    => true,
                        'label'         => __('Add Background Color', 'fl-builder'),
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '#gravity-form:before',
                            'property'        => 'background'
                        )
                    ),
                    'bg_opacity' => array(
                        'type'          => 'text',
                        'label'         => __('Filter Opacity', 'fl-builder'),
                        'description'   => __(' from 0 - 1 (eg: 0.5)', 'fl-builder'),
                        'default'       => '1',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '#gravity-form:before',
                            'property'        => 'opacity'
                        )
                    ),
				)
			),
		)
	)
));