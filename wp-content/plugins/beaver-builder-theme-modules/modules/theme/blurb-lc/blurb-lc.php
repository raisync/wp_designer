<?php

/**
 * @class CustomBlurbModule
 */
class CustomBlurbModule extends FLBuilderModule {

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
			'name'          	=> __('Blurb', 'fl-builder'),
			'description'   	=> __('Upload a photo with text or display one from the media library.', 'fl-builder'),
			'category'      	=> __('Theme Modules', 'fl-builder'),
			'partial_refresh'	=> true
		));
	}

	/**
	 * @method get_link
	 */
	public function get_link()
	{
		$photo = $this->get_data();

		if($this->settings->link_type == 'url') {
			$link = $this->settings->link_url;
		}
		else if($this->settings->link_type == 'lightbox') {
			$link = $photo->url;
		}
		else if($this->settings->link_type == 'file') {
			$link = $photo->url;
		}
		else if($this->settings->link_type == 'page') {
			$link = $photo->link;
		}
		else {
			$link = '';
		}

		return $link;
	}

	/**
	 * @method get_alt
	 */
	public function get_alt()
	{
		$photo = $this->get_data();

		if(!empty($photo->alt)) {
			return htmlspecialchars($photo->alt);
		}
		else if(!empty($photo->description)) {
			return htmlspecialchars($photo->description);
		}
		else if(!empty($photo->caption)) {
			return htmlspecialchars($photo->caption);
		}
		else if(!empty($photo->title)) {
			return htmlspecialchars($photo->title);
		}
	}

	/**
	 * @method get_attributes
	 */
	public function get_attributes()
	{
		$attrs = '';
		
		if ( isset( $this->settings->attributes ) ) {
			foreach ( $this->settings->attributes as $key => $val ) {
				$attrs .= $key . '="' . $val . '" ';
			}
		}
		
		return $attrs;
	}

	/**
	 * @method _has_source
	 * @protected
	 */
	protected function _has_source()
	{
		if($this->settings->photo_source == 'url' && !empty($this->settings->photo_url)) {
			return true;
		}
		else if($this->settings->photo_source == 'library' && !empty($this->settings->photo_src)) {
			return true;
		}

		return false;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('CustomBlurbModule', array(
	'general'       => array( // Tab
		'title'         => __('General', 'fl-builder'), // Tab title
		'sections'      => array( // Tab Sections
            'show_label'       => array( // Section
				'title'         => 'Display Label', // Section Title
				'fields'        => array(
                    'show_label'     => array(
                        'type'          => 'select',
                        'label'         => __('Show Circle Icon', 'fl-builder'),
                        'description'   => __('Display an icon, image or text label', 'fl-builder'),
                        'default'       => 'false',
                        'options'       => array(
                            'true'       =>  __('Yes', 'fl-builder'),
                            'false'      =>  __('No', 'fl-builder')
                        ),
                        'toggle'        => array(
                            'true'        => array(
                                'sections'        => array('label')
                            )
                        )
                    )
                )
            ),
			'label'       => array( // Section
				'title'         => 'Icon Label', // Section Title
				'fields'        => array( // Section Fields
                    'image_options'     => array(
                        'type'          => 'select',
                        'label'         => __('Circle Icon Type', 'fl-builder'),
                        'description'   => __('Select a label type', 'fl-builder'),
                        'default'       => 'icon',
                        'options'       => array(
                            'icon'       =>  __('Icon', 'fl-builder'),
                            'image'      =>  __('Image', 'fl-builder'),
                            'text'   =>  __('Text', 'fl-builder')
                        ),
                        'toggle'        => array(
                            'icon'        => array(
                                'fields'        => array('icon','icon_size')
                            ),
                            'image'        => array(
                                'fields'        => array('image')
                            ),
                            'text'        => array(
                                'fields'        => array('text')
                            )
                        )
                    ),
                    'icon'          => array(
                        'type'          => 'icon',
                        'label'         => __('Icon', 'fl-builder'),
                        'description'   => 'Select an Icon',
                    ),
                    'icon_size' => array(
                        'type'          => 'unit',
                        'label'         => __('Icon Size', 'fl-builder'),
                        'description'   => __(' px', 'fl-builder'),
                        'placeholder'   => __('20', 'fl-builder'),
                        'default'       => '20',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.blurb-number h3 span',
                            'property'        => 'font-size',
                            'unit'            => 'px'
                        )
                    ),
                    'image'       => array(
                        'type'          => 'photo',
                        'label'         => 'an Image object',
                        'description'   => 'Upload an image object',
                    ),
                    'text'        => array(
						'type'            => 'text',
						'label'           => __('Label', 'fl-builder'),
                        'default'         => '1',
						'maxlength'       => '3',
						'size'            => '4',
                        'class'         => 'blurb-number',
                        'description'   => __( '(3 Character Limit)', 'fl-builder' ),
						'preview'         => array(
							'type'            => 'text',
							'selector'        => '.blurb-number h3'
						)
					)
				)
			),
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
						'label'         => __('Photo', 'fl-builder'),
                        'show_remove'	=> true,
					),
					'photo_url'     => array(
						'type'          => 'text',
						'label'         => __('Photo URL', 'fl-builder'),
						'placeholder'   => __( 'http://www.example.com/my-photo.jpg', 'fl-builder' )
					),
                    'bg_position'          => array(
						'type'          => 'select',
						'label'         => __('Set BG Photo position', 'fl-builder'),
						'default'       => '',
						'options'       => array(
							'center center'  => __('Center Center', 'Photo Filter.', 'fl-builder' ),
							'center top'     => __('Center Top', 'Photo Filter.', 'fl-builder' ),
							'center bottom'  => __('Center Bottom', 'Photo Filter.', 'fl-builder' ),
							'left top'       => __('Left Top', 'fl-builder'),
							'left bottom'    => __('Left Bottom', 'fl-builder'),
							'right top'      => __('Right Top', 'fl-builder'),
							'right bottom'   => __('Right Bottom', 'fl-builder')
						),
                        'preview'         => array(
							'type'            => 'text',
							'selector'        => '#blurb',
                            'property'        => 'background-position'
						)
					),
                    'filter'          => array(
						'type'          => 'select',
						'label'         => __('Add Filter', 'fl-builder'),
						'default'       => '',
						'options'       => array(
							''              => _x( 'None', 'Photo Filter.', 'fl-builder' ),
							'grayscale'     => __('Grayscale', 'fl-builder'),
							'sepia'         => __('Sepia', 'fl-builder')
						)
					),
                    'filter_color'          => array(
                        'type'          => 'color',
                        'show_reset'    => true,
                        'label'         => __('Add Filter Color', 'fl-builder'),
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '#blurb:before',
                            'property'        => 'background'
                        )
                    ),
                    'filter_opacity' => array(
                        'type'          => 'text',
                        'label'         => __('Filter Opacity', 'fl-builder'),
                        'description'   => __(' from 0 - 1 (eg: 0.5)', 'fl-builder'),
                        'default'       => '1',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '#blurb:before',
                            'property'        => 'opacity'
                        )
                    ),
                    'max_width'        => array(
						'type'          => 'select',
						'label'         => __('Image Full Width?', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'    => __('Yes', 'fl-builder'),
							'false'      => __('Custom', 'fl-builder'),
						),
                        'toggle'        => array(
							'false'       => array(
								'fields'        => array('img_width')
							)
						)
					),
                    'img_width'    => array(
						'type'          => 'unit',
						'label'         => __('Custom Width', 'fl-builder'),
						'default'       => '600',
						'description'   => 'px',
						'maxlength'     => '3',
						'size'          => '5',
						'placeholder'   => '800'
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
						'default'       => '600',
						'description'   => 'px',
						'maxlength'     => '3',
						'size'          => '5',
						'placeholder'   => '800'
					),
				)
			)
		)
	),
    'blurb_design'       => array(
		'title'         => __('Design', 'fl-builder'),
		'sections'      => array(
            'blurb_style'       => array( // Section
                'title'         => 'Style', // Section Title
				'fields'        => array(
                    'design_style'     => array(
                        'type'          => 'select',
                        'label'         => __('Look and Feel', 'fl-builder'),
                        'description'   => __('Select overall blurb design layout', 'fl-builder'),
                        'default'       => 'normal',
                        'options'       => array(
                            'style1'      =>  __('Style 1', 'fl-builder'),
                            'style2'      =>  __('Style 2', 'fl-builder'),
                            'style3'      =>  __('Style 3', 'fl-builder')
                        )
                    ),
                    't_position'        => array(
						'type'          => 'select',
						'label'         => __('Set Position of text content', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'top'        => __('Top', 'fl-builder'),
							'bottom'     => __('Bottom', 'fl-builder'),
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
            'label'       => array( // Section
				'title'         => 'Icon Label Style', // Section Title
				'fields'        => array( // Section Fields
                    'label_color'          => array(
                        'type'          => 'color',
                        'show_reset'    => true,
                        'label'         => __('Label Text Color', 'fl-builder'),
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.blurb-number h3',
                            'property'        => 'color'
                        )
                    ),
                    'label_bgcolor'          => array(
                        'type'          => 'color',
                        'show_reset'    => true,
                        'label'         => __('Label Background Color', 'fl-builder'),
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.blurb-number h3',
                            'property'        => 'background'
                        )
                    ),
                    'label_opacity' => array(
                        'type'          => 'text',
                        'label'         => __('Label Opacity', 'fl-builder'),
                        'description'   => __(' from 0 - 1 (eg: 0.5)', 'fl-builder'),
                        'default'       => '1',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.blurb-number',
                            'property'        => 'opacity'
                        )
                    ),
                    'label_size' => array(
                        'type'          => 'unit',
                        'label'         => __('Label size', 'fl-builder'),
                        'description'   => __(' px', 'fl-builder'),
                        'default'       => '95',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'preview'         => array(
                            'type'            => 'css',
                            'rules'     => array(
                                array (
                                    'selector'        => '.blurb-number h3',
                                    'property'        => 'width'
                                ),
                                array (
                                    'selector'        => '.blurb-number h3',
                                    'property'        => 'height'
                                ),
                            )
                        )
                    ),
                    'label_b_radius'        => array(
						'type'          => 'select',
						'label'         => __('Full Circle or Custom Border Radius?', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'    => __('Circle', 'fl-builder'),
							'false'      => __('Custom', 'fl-builder'),
						),
                        'toggle'        => array(
							'false'       => array(
								'fields'        => array('custom_label_b_radius')
							)
						)
					),
                    'custom_label_b_radius' => array(
                        'type'          => 'unit',
                        'label'         => __('Add Border Radius', 'fl-builder'),
                        'description'   => __(' px', 'fl-builder'),
                        'placeholder'   => __('20', 'fl-builder'),
                        'default'       => '20',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.blurb-number h3',
                            'property'        => 'border-radius',
                            'unit'            => 'px'
                        )
                    ),
                    'label_border' => array(
                        'type'          => 'unit',
                        'label'         => __('Border Width', 'fl-builder'),
                        'description'   => __(' px', 'fl-builder'),
                        'default'       => '8',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.blurb-number h3',
                            'property'        => 'border-width',
                            'unit'            => 'px'
                        )
                    ),
                    'label_border_style'     => array(
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
                            'selector'        => '.blurb-number h3',
							'property'        => 'border-style'
                        )
                    ),
                    'label_border_color'          => array(
                        'type'          => 'color',
                        'show_reset'    => true,
                        'label'         => __('Border Color', 'fl-builder'),
                        'default'         => 'fff',
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.blurb-number h3',
							'property'        => 'border-color'
                        )
                    ),
                    
				)
			),
            'drop_shadow'       => array( // Section
                'title'         => 'Drop Shadow', // Section Title
				'fields'        => array(
                    'h_shadow'        => array(
						'type'            => 'unit',
						'label'           => __('Distance X', 'fl-builder'),
                        'description'     => 'px',
                        'default'         => '0',
                        'placeholder'     => '0',
						'maxlength'       => '3',
						'size'            => '4',
                        'description'   => 'px',
						'preview'         => array(
							'type'            => 'css',
							'selector'        => '#blurb',
							'property'        => 'box-shadow',
                            'unit'            => 'px'
						)
					),
                    'v_shadow'        => array(
						'type'            => 'unit',
						'label'           => __('Distance Y', 'fl-builder'),
                        'description'     => 'px',
                        'default'         => '0',
                        'placeholder'     => '0',
						'maxlength'       => '3',
						'size'            => '4',
                        'description'   => 'px',
						'preview'         => array(
							'type'            => 'css',
							'selector'        => '#blurb',
							'property'        => 'box-shadow',
                            'unit'            => 'px'
						)
					),
                    'blur'        => array(
						'type'            => 'unit',
						'label'           => __('Blur', 'fl-builder'),
                        'description'     => 'px',
                        'default'         => '0',
                        'placeholder'     => '0',
						'maxlength'       => '3',
						'size'            => '4',
                        'description'   => 'px',
						'preview'         => array(
							'type'            => 'css',
							'selector'        => '#blurb',
							'property'        => 'box-shadow',
                            'unit'            => 'px'
						)
					),
                    'spread'        => array(
						'type'            => 'unit',
						'label'           => __('Size', 'fl-builder'),
                        'description'     => 'px',
                        'default'         => '0',
                        'placeholder'     => '0',
						'maxlength'       => '3',
						'size'            => '4',
                        'description'   => 'px',
						'preview'         => array(
							'type'            => 'css',
							'selector'        => '#blurb',
							'property'        => 'box-shadow',
							'unit'            => 'px'
						)
					),
                    'shadow_color'          => array(
                        'type'          => 'color',
                        'show_reset'    => true,
                        'label'         => __('Shadow Color', 'fl-builder'),
                        'default'         => '212121',
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '#blurb',
							'property'        => 'color'
                        )
                    ),
                    'shadow_opacity' => array(
                        'type'          => 'text',
                        'label'         => __('Opacity', 'fl-builder'),
                        'description'   => __(' from 0 - 1 (eg: 0.5)', 'fl-builder'),
                        'default'       => '1',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '#blurb',
                            'property'        => 'box-shadow'
                        )
                    )
                )
            ),
            'border_radius'       => array( // Section
                'title'         => 'Border Radius', // Section Title
				'fields'        => array(
                    'b_radius'        => array(
						'type'          => 'select',
						'label'         => __('Full Circle or Custom Border Radius?', 'fl-builder'),
						'default'       => 'true',
						'options'       => array(
							'true'    => __('Circle', 'fl-builder'),
							'false'      => __('Custom', 'fl-builder'),
						),
                        'toggle'        => array(
							'false'       => array(
								'fields'        => array('custom_b_radius')
							)
						)
					),
                    'custom_b_radius' => array(
                        'type'          => 'unit',
                        'label'         => __('Add Border Radius', 'fl-builder'),
                        'description'   => __(' px', 'fl-builder'),
                        'placeholder'   => __('20', 'fl-builder'),
                        'default'       => '20',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '#blurb',
                            'property'        => 'border-radius',
                            'unit'            => 'px'
                        )
                    ),
                )
            ),
            'border_style'       => array( // Section
                'title'         => 'Add Border', // Section Title
				'fields'        => array(
                    'border' => array(
                        'type'          => 'text',
                        'label'         => __('Border Width', 'fl-builder'),
                        'description'   => __(' px', 'fl-builder'),
                        'default'       => '0',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '#blurb',
                            'property'        => 'border-width'
                        )
                    ),
                    'border_style'     => array(
                        'type'          => 'select',
                        'label'         => __('Line Style', 'fl-builder'),
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
                            'selector'        => '#blurb',
							'property'        => 'border-style'
                        )
                    ),
                    'border_color'          => array(
                        'type'          => 'color',
                        'show_reset'    => true,
                        'label'         => __('Color', 'fl-builder'),
                        'default'         => '212121',
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '#blurb',
							'property'        => 'border-color'
                        )
                    ),
                )
            ),
        )
    ),
    'text'       => array(
		'title'         => __('Blurb Text', 'fl-builder'),
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
							'selector'        => '.heading-title-text'
						)
					),
                    'blurb_content' => array(
                        'type'          => 'textarea',
                        'label'         => __('Content', 'fl-builder'),
                        'rows'          => 4,
                        'preview'       => array(
                            'type'          => 'text',
                            'selector'      => '.blurb-content-text'
                        )
                    ),
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
		'title'         => __('Text Style', 'fl-builder'),
		'sections'      => array(
			'colors'        => array(
				'title'         => __('Colors', 'fl-builder'),
				'fields'        => array(
					'color'          => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Text Color', 'fl-builder')
					),
                    'opacity' => array(
                        'type'          => 'text',
                        'label'         => __('Opacity', 'fl-builder'),
                        'description'   => __(' from 0 - 1 (eg: 0.5)', 'fl-builder'),
                        'default'       => '1',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.heading-title',
                            'property'        => 'opacity'
                        )
                    ),
                    'highlight_color'      => array(
						'type'          => 'color',
						'show_reset'    => true,
						'label'         => __('Highlight Text Color', 'fl-builder'),
						'description'   => __(' for b and em tags', 'fl-builder'),
					),
				)
			),
            'sizes'        => array(
				'title'         => __('Sizes', 'fl-builder'),
				'fields'        => array(
					'title_font_size' => array(
                        'type'          => 'unit',
                        'label'         => __('Title Font Size', 'fl-builder'),
                        'description'   => __(' px', 'fl-builder'),
                        'placeholder'   => __('24', 'fl-builder'),
                        'default'       => '24',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.heading-title-text',
                            'property'        => 'font-size',
                            'unit'            => 'px'
                        )
                    ),
                    'content_font_size' => array(
                        'type'          => 'unit',
                        'label'         => __('Content Text Size', 'fl-builder'),
                        'description'   => __(' px', 'fl-builder'),
                        'placeholder'   => __('14', 'fl-builder'),
                        'default'       => '14',
                        'maxlength'     => '3',
                        'size'          => '4',
                        'preview'         => array(
                            'type'            => 'css',
                            'selector'        => '.blurb-content-text',
                            'property'        => 'font-size',
                            'unit'            => 'px'
                        )
                    ),
				)
			),
            'fonts'        => array(
				'title'         => __('Fonts', 'fl-builder'),
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
							'selector'        => '.fl-heading-text'
						)					
					),
                    'content_font'          => array(
						'type'          => 'font',
						'default'		=> array(
							'family'		=> 'Default',
							'weight'		=> 300
						),
						'label'         => __('Font', 'fl-builder'),
						'preview'         => array(
							'type'            => 'font',
							'selector'        => '.blurb-content-text'
						)					
					),
				)
			),
			'structure'     => array(
				'title'         => __('Structure', 'fl-builder'),
				'fields'        => array(
                    'text_padding' => array(
						'type'          => 'text',
						'label'         => __('Padding', 'fl-builder'),
						'default'       => '15',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'h_alignment'     => array(
						'type'          => 'select',
						'label'         => __('Horizontal Alignment', 'fl-builder'),
						'default'       => 'left',
						'options'       => array(
							'left'      =>  __('Left', 'fl-builder'),
							'center'    =>  __('Center', 'fl-builder'),
							'right'     =>  __('Right', 'fl-builder')
						),
                        'preview'       => array(
                            'type'          => 'css',
                            'rules'           => array(
                                array(
                                    'selector'        => '.heading-title',
							         'property'        => 'text-align'
                                ),
                                array(
                                    'selector'        => '.blurb-content-text',
							         'property'        => 'text-align'
                                ),    
                            )
                        )
					),
					'tag'           => array(
						'type'          => 'select',
						'label'         => __( 'HTML Tag', 'fl-builder' ),
						'default'       => 'h3',
						'options'       => array(
							'h1'            =>  'h1',
							'h2'            =>  'h2',
							'h3'            =>  'h3',
							'h4'            =>  'h4',
							'h5'            =>  'h5',
							'h6'            =>  'h6'
						)
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