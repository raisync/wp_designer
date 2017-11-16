<?php

/**
 * @class linkModule
 */
class linkModule extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('Link', 'fl-builder'),
			'description'   	=> __('Display a link text.', 'fl-builder'),
			'category'      	=> __('Theme Modules', 'fl-builder'),
			'partial_refresh'	=> true
		));
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('linkModule', array(
	'general'       => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
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
                    'icon'          => array(
                        'type'          => 'icon',
                        'label'         => __('Icon', 'fl-builder'),
                        'description'   => 'Select an Icon',
                    ),
				)
			),
            'alignment'          => array(
				'title'         => __('Text Alignment', 'fl-builder'),
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
							'selector'        => '.fl-heading',
							'property'        => 'text-align'
						)
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
    'style'         => array(
		'title'         => __('Link Style', 'fl-builder'),
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
							'selector'        => '.heading-link-text',
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
							'selector'        => '.heading-link',
                            'property'        => 'opacity'
						)
					),
                    'h_color'          => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Link Hover Color', 'fl-builder')
					),
				)
			),
            'structure'     => array(
				'title'         => __('Structure', 'fl-builder'),
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
							'selector'        => '.heading-link-text'
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
				'title'         => __( 'Mobile Structure', 'fl-builder' ),
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
			)
        )
    )
));