<?php

/**
 * @class customDividerModule
 */
class customDividerModule extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('Advance Divider', 'fl-builder'),
			'description'   	=> __('Display a divider.', 'fl-builder'),
			'category'      	=> __('Theme Modules', 'fl-builder'),
			'partial_refresh'	=> true
		));
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('customDividerModule', array(
    'style'        => array(
		'title'         => __('Style', 'fl-builder'),
		'sections'      => array(
            'general'     => array(
                'title'         => __('', 'fl-builder'),
				'fields'        => array(
				    'add_icon'        => array(
                        'type'          => 'select',
                        'label'         => __('Add Icon?', 'fl-builder'),
                        'default'       => 'false',
                        'options'       => array(
                            'true'       =>  __('Sure!', 'fl-builder'),
                            'false'      =>  __('No, Thanks.', 'fl-builder')
                        ),
                        'toggle'        => array(
                            'true'        => array(
                                'sections'        => array('icon_section')
                            )
                        )
                    ),
                )
            ),
            'divider_color'          => array(
				'title'         => __('Color', 'fl-builder'),
				'fields'        => array(
                    'color'          => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Divider Color', 'fl-builder'),
                        'preview'         => array(
							'type'            => 'css',
							'selector'        => '#divider',
                            'property'        => 'background'
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
							'selector'        => '#divider',
                            'property'        => 'opacity'
						)
					)
				)
			),
            'divider_structure'          => array(
				'title'         => __('Structure', 'fl-builder'),
				'fields'        => array(
                    'max_width'        => array(
						'type'          => 'select',
						'label'         => __('Divider Full Width?', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'    => __('Yes', 'fl-builder'),
							'false'      => __('Custom', 'fl-builder'),
						),
                        'toggle'        => array(
							'false'       => array(
								'fields'        => array('custom_width')
							)
						)
					),
                    'custom_width'    => array(
						'type'          => 'text',
						'label'         => __('Custom Width', 'fl-builder'),
						'default'       => '600',
						'description'   => 'px',
						'maxlength'     => '3',
						'size'          => '5',
						'placeholder'   => '600'
					),
                    'height'    => array(
						'type'          => 'text',
						'label'         => __('Height', 'fl-builder'),
						'default'       => '2',
						'description'   => 'px',
						'maxlength'     => '1',
						'size'          => '5',
						'placeholder'   => '2'
					),
                    'dv_alignment'        => array(
                        'type'          => 'select',
                        'label'         => __('Divider Alignment?', 'fl-builder'),
                        'default'       => 'center',
                        'options'       => array(
                            'left'       =>  __('Left', 'fl-builder'),
                            'right'      =>  __('Right', 'fl-builder'),
                            'center'     =>  __('Center', 'fl-builder')
                        ),
                        'toggle'        => array(
							'left'       => array(
                                    'preview'         => array(
                                    'type'            => 'css',
                                    'selector'        => '#divider',
                                    'property'        => 'margin-left',
                                    'unit'            => 'px'
                                )
							),
                            'right'       => array(
                                    'preview'         => array(
                                    'type'            => 'css',
                                    'selector'        => '#divider',
                                    'property'        => 'margin-right',
                                    'unit'            => 'px'
                                )
							)
						)
                        
                    )
				)
			),
            'icon_section'          => array(
				'title'         => __('Icon Style', 'fl-builder'),
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
                                'fields'        => array('icon', 'icon_alignment', 'icon_size')
                            ),
                            'image'        => array(
                                'fields'        => array('image', 'image_size', 'image_alignment')
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
                    'icon_color'          => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Icon Color', 'fl-builder'),
                        'preview'         => array(
							'type'            => 'css',
							'selector'        => '#divider i.icon-lg',
                            'property'        => 'color'
						)	
					),
                    'icon_alignment'        => array(
                        'type'          => 'select',
                        'label'         => __('Icon Alignment?', 'fl-builder'),
                        'default'       => 'center',
                        'options'       => array(
                            'left'       =>  __('Left', 'fl-builder'),
                            'right'      =>  __('Right', 'fl-builder'),
                            'center'     =>  __('Center', 'fl-builder')
                        ),
                        'preview'         => array(
							'type'            => 'css',
							'selector'        => '#divider i.icon-lg',
                            'property'        => 'text-align'
						)
                    ),
                    'icon_size'    => array(
						'type'          => 'text',
						'label'         => __('Icon Size', 'fl-builder'),
						'default'       => '20',
						'description'   => 'px',
						'maxlength'     => '3',
						'size'          => '5',
						'placeholder'   => '20',
                        'preview'         => array(
							'type'            => 'css',
							'selector'        => '#divider i.icon-lg',
                            'property'        => 'font-size',
                            'unit'            => 'px'
						)
					),
                    'image_size'        => array(
						'type'          => 'select',
						'label'         => __('Image Full Width?', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'    => __('Yes', 'fl-builder'),
							'false'      => __('Custom', 'fl-builder'),
						),
                        'toggle'        => array(
							'false'       => array(
								'fields'        => array('custom_image_size')
							)
						)
					),
                    'custom_image_size'    => array(
						'type'          => 'text',
						'label'         => __('Custom Width', 'fl-builder'),
						'default'       => '600',
						'description'   => 'px',
						'maxlength'     => '3',
						'size'          => '5',
						'placeholder'   => '600'
					),
                    'image_alignment'        => array(
                        'type'          => 'select',
                        'label'         => __('Image Alignment?', 'fl-builder'),
                        'default'       => 'center',
                        'options'       => array(
                            'left'       =>  __('Left', 'fl-builder'),
                            'right'      =>  __('Right', 'fl-builder'),
                            'center'     =>  __('Center', 'fl-builder')
                        ),
                        'preview'         => array(
							'type'            => 'css',
							'selector'        => '#divider .image',
                            'property'        => 'text-align'
						)
                    ),
				)
			),
            'r_structure'   => array(
				'title'         => __( 'Mobile Structure', 'fl-builder' ),
				'fields'        => array(
					'r_icon_size'    => array(
						'type'          => 'text',
						'label'         => __('Mobile - Icon Size', 'fl-builder'),
						'default'       => '20',
						'description'   => 'px',
						'maxlength'     => '3',
						'size'          => '5',
						'placeholder'   => '20'
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