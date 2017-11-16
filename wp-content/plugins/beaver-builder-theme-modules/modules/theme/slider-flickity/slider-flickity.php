<?php

/**
 * @class FlickitySlider
 */
class FlickitySlider extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Slider Flickity  (Full Screen)', 'fl-builder'),
			'description'   	=> __('Display Slider.', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
		$this->add_css('button-css');
		$this->add_css( 'flickity', $this->url . 'css/flickity.css' );
		$this->add_js( 'flickity', $this->url . 'js/flickity.pkgd.min.js', array(), '', true );
	}
	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'slider-flickity ' . $this->settings->height;
		return $classname;
	}
}

/*Module Image Size*/
add_image_size( 'flickity-image', 1000 , 907, true );

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('FlickitySlider', array(
	'slides'         => array(
		'title'         => __('Slides', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'items'         => array(
						'type'          => 'form',
						'label'         => __('Slide', 'fl-builder'),
						'form'          => 'flickity_repeater_form', // ID from registered form below
						'preview_text'  => 'slider_description', // Name of a field to use for the preview text
						'multiple'      => true
					),
				)
			)
		)
	),
	'style'        => array(
		'title'         => __('Style', 'fl-builder'),
		'sections'      => array(
			'autoplay_setting'       => array(
				'title'         => 'Slider Autoplay',
				'fields'        => array(                              
					'autoplay'        => array(
						'type'          => 'select',
						'label'         => __('Autoplay', 'fl-builder'),
						'default'       => true,
						'options'       => array(
							true    => __('Yes', 'fl-builder'),
							'false'      => __('No', 'fl-builder'),
						),
						'toggle'        => array(
							true        => array(
								'fields'        => array('autoplay_delay')
							),
						),
					),
					'autoplay_delay'        => array(
						'type'          => 'unit',
						'label'         => __('Autoplay Delay', 'fl-builder'),
						'minlength'     => '4',
						'maxlength'     => '5',
						'size'          => '6',
						'description'   => 'millisecond',
						'placeholder'   => '6000',
					),
				)
			),
			'height_setting'       => array(
				'title'         => 'Slider Height',
				'fields'        => array(        
					'height'        => array(
						'type'          => 'select',
						'label'         => __('Height', 'fl-builder'),
						'default'       => 'customheight',
						'options'       => array(
							'fullscreen'    => __('Full Screen', 'fl-builder'),
							'autoheight'      => __('Auto Height', 'fl-builder'),
							'customheight'      => __('Custom Height', 'fl-builder'),
						),
						'toggle'        => array(
							'fullscreen'        => array(
								'fields'        => array('fullscreen_setting')
							),
							'customheight'        => array(
								'fields'        => array('customheight')
							),
						),
					),
					'fullscreen_setting'        => array(
						'type'          => 'select',
						'label'         => __('Deduct Header Height', 'fl-builder'),
						'default'       => 'no',
						'options'       => array(
							'yes'    	=> __('Yes', 'fl-builder'),
							'no'     	=> __('No', 'fl-builder'),
						),
					),
					'customheight'        => array(
						'type'          => 'unit',
						'label'         => __('Custom Height', 'fl-builder'),
						'maxlength'     => '4',
						'size'          => '5',
						'description'   => 'px',
						'default'       => '500',
						'placeholder'   => '500',
					),
				)
			),
			'style_setting'       => array(
				'title'         => 'Slider Style',
				'fields'        => array(        
					'style'        => array(
						'type'          => 'select',
						'label'         => __('Style', 'fl-builder'),
						'default'       => 'slide',
						'options'       => array(
							'style_slide'    => __('Slide', 'fl-builder'),
							'style_fade'    => __('Fade', 'fl-builder'),
						),
					),
					'bg_color'        => array(
						'type'          => 'color',
						'label'         => __('Background Color', 'fl-builder'),
						'default'       => '000000',
						'show_reset'    => true,
					),
				)
			),
			'navs'       => array(
				'title'         => 'Navs',
				'fields'        => array(             
					'nav_color'        => array(
						'type'          => 'color',
						'label'         => __('Nav Color', 'fl-builder'),
						'default'       => '',
						'show_reset'       => 'true',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.slider-flickity .flickity-prev-next-button',
							'property'      => 'color',
						),
					),
					'nav_size'        => array(
						'type'          => 'unit',
						'label'         => __('Nav Size', 'fl-builder'),
						'default'       => '',
						'description'   => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slider-flickity .flickity-prev-next-button',
									'property'      => 'width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slider-flickity .flickity-prev-next-button',
									'property'      => 'height',
									'unit'      => 'px',
								), 
							),
						),
					),
					'nav_thick'        => array(
						'type'          => 'unit',
						'label'         => __('Nav Thickness', 'fl-builder'),
						'default'       => '',
						'description'   => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slider-flickity .flickity-prev-next-button.previous',
									'property'      => 'border-left-width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slider-flickity .flickity-prev-next-button.previous',
									'property'      => 'border-bottom-width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slider-flickity .flickity-prev-next-button.next',
									'property'      => 'border-right-width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slider-flickity .flickity-prev-next-button.next',
									'property'      => 'border-top-width',
									'unit'      => 'px',
								),
							),
						),
					),
					'nav_spacing'        => array(
						'type'          => 'unit',
						'label'         => __('Nav Spacing', 'fl-builder'),
						'default'       => '',
						'description'   => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slider-flickity .flickity-prev-next-button.previous',
									'property'      => 'left',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slider-flickity .flickity-prev-next-button.next',
									'property'      => 'right',
									'unit'      => 'px',
								), 
							),
						),
					),
				)
			),
			'dots'       => array(
				'title'         => 'Dots',
				'fields'        => array(   
					'dots_align'         => array(
						'type'          => 'select',
						'label'         => __('Dots Alignment', 'fl-builder'),
						'default'       => '',
						'options'       => array(
							''       		=> __('Center', 'fl-builder'),
							'left'          => __('Left', 'fl-builder'),
							'right'         => __('Right', 'fl-builder')
						)
					),          
					'dots_color'        => array(
						'type'          => 'color',
						'label'         => __('Dots Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => 'true',
						'preview'		=> array(
							'type'		=> 'css',
							'selector'		=> '.slider-flickity .flickity-page-dots .dot',
							'property'      => 'background-color',
						),
					),
					'dots_size'        => array(
						'type'          => 'unit',
						'label'         => __('Dots Size', 'fl-builder'),
						'default'       => '',
						'description'   => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slider-flickity .flickity-page-dots .dot',
									'property'      => 'width',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slider-flickity .flickity-page-dots .dot',
									'property'      => 'height',
									'unit'      => 'px',
								), 
								array(
									'selector'		=> '.slider-flickity .flickity-page-dots .dot',
									'property'      => 'border-raduis',
									'unit'      => 'px',
								), 
							),
						),
					),
					'dots_spacing'        => array(
						'type'          => 'unit',
						'label'         => __('Dots Spacing', 'fl-builder'),
						'default'       => '',
						'description'   => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slider-flickity .flickity-page-dots .dot',
									'property'      => 'margin-left',
									'unit'      => 'px',
								),
								array(
									'selector'		=> '.slider-flickity .flickity-page-dots .dot',
									'property'      => 'margin-right',
									'unit'      => 'px',
								), 
							),
						),
					),
					'dots_bottom'        => array(
						'type'          => 'unit',
						'label'         => __('Dots Bottom', 'fl-builder'),
						'default'       => '',
						'description'   => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slider-flickity .flickity-page-dots',
									'property'      => 'bottom',
									'unit'      => 'px',
								),
							),
						),
					),
					'dots_active_width'        => array(
						'type'          => 'unit',
						'label'         => __('Dots Active Width', 'fl-builder'),
						'default'       => '',
						'description'   => 'px',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slider-flickity .flickity-page-dots .dot.is-selected',
									'property'      => 'width',
									'unit'      => 'px',
								),
							),
						),
					),
					'dots_opacity'        => array(
						'type'          => 'unit',
						'label'         => __('Dots Not Active Opacity', 'fl-builder'),
						'default'       => '',
						'description'   => '0-1 eg: 0.6',
						'preview'		=> array(
							'type'		=> 'css',
							'rules'           => array(
								array(
									'selector'		=> '.slider-flickity .flickity-page-dots .dot:not(.is-selected)',
									'property'      => 'opacity',
								),
							),
						),
					),
				)
			),
		)
	),
	'buttons_setting'       => array(
		'title'         => __('Buttons Setting', 'fl-builder'),
		'sections'      => array(
			'setting'       => array(
				'title'         => '',
				'fields'        => array(
					'btn_align'         => array(
						'type'          => 'select',
						'label'         => __('Alignment', 'fl-builder'),
						'default'       => 'left',
						'options'       => array(
							'center'        => __('Center', 'fl-builder'),
							'left'          => __('Left', 'fl-builder'),
							'right'         => __('Right', 'fl-builder'),
						)
					),
					'btn_corners'         => array(
						'type'          => 'select',
						'label'         => __('Corners', 'fl-builder'),
						'default'       => ' btn-curved',
						'options'       => array(
							' btn-curved'        => __('Curved', 'fl-builder'),
							' btn-rounded'          => __('Rounded', 'fl-builder'),
							' btn-square'         => __('Square', 'fl-builder'),
							' btn-basic'         => __('Basic', 'fl-builder'),
						),
						'toggle'        => array(
							' btn-curved'          => array(
								'fields'        => array('btn_border_radius'),
							),
						)
					),
					'btn_size' => array(
						'type'          => 'select',
						'label'         => __('Button Size', 'fl-builder'),
						'default'       => ' btn-lg',
						'options'       => array(
							' btn-xs'        => __('extra Small', 'fl-builder'),
							' btn-sm'        => __('Small', 'fl-builder'),
							' btn-md'        => __('Medium', 'fl-builder'),
							' btn-lg'        => __('Large', 'fl-builder'),
							' btn-xl'        => __('Extra Large', 'fl-builder'),
						)
					),
					'btn_width'         => array(
						'type'          => 'select',
						'label'         => __('Width', 'fl-builder'),
						'default'       => '',
						'options'       => array(
							''          => _x( 'Auto', 'Width.', 'fl-builder' ),
							' btn-block'          => __('Full Width', 'fl-builder'),
							' btn-custom'        => __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							''          => array(
								'fields'        => array('btn_align')
							),
							' btn-block'          => array(),
							' btn-custom'        => array(
								'fields'        => array('btn_align', 'btn_custom_width')
							)
						)
					),
					'btn_custom_width'  => array(
						'type'          => 'text',
						'label'         => __('Custom Width', 'fl-builder'),
						'default'       => '200',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'btn_font_weight'         => array(
						'type'          => 'select',
						'label'         => __('Font Weight', 'fl-builder'),
						'default'       => '',
						'options'       => array(
							''    	=> __('Default', 'fl-builder'),
							'100'    	=> __('100 Thin', 'fl-builder'),
							'200'    	=> __('200 Extra-Light', 'fl-builder'),
							'300'    	=> __('300 Light', 'fl-builder'),
							'400'    	=> __('400 Normal', 'fl-builder'),
							'500'    	=> __('500 Medium', 'fl-builder'),
							'600'    	=> __('600 Semi-Bold', 'fl-builder'),
							'700'    	=> __('700 Bold', 'fl-builder'),
							'800'    	=> __('800 Extra-Bold', 'fl-builder'),
							'900'    	=> __('900 Ultra-Bold', 'fl-builder'),
						),
					),
					'btn_font_size'     => array(
						'type'          => 'text',
						'label'         => __('Font Size', 'fl-builder'),
						'default'       => '',
						'placeholder'   => '16',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'btn_padding'       => array(
						'type'          => 'text',
						'label'         => __('Padding Left & Right', 'fl-builder'),
						'default'       => '',
						'placeholder'   => '12',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'btn_padding_vertical'       => array(
						'type'          => 'text',
						'label'         => __('Padding Top & Bottom', 'fl-builder'),
						'default'       => '',
						'placeholder'   => '12',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'btn_border_radius' => array(
						'type'          => 'text',
						'label'         => __('Round Corners', 'fl-builder'),
						'default'       => '',
						'placeholder'   => '4',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'btn_custom_margin' => array(
						'type'          => 'text',
						'label'         => __('Button Margin', 'fl-builder'),
						'default'       => '',
						'placeholder'   => '15',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
				)
			),
		)
	),
));

/**
 * Register a settings form to use in the "form" field type above.
 */
FLBuilder::register_settings_form('flickity_repeater_form', array(
	'title' => __('Slide Setting', 'fl-builder'),
	'tabs'  => array(
		'general'      => array(
			'title'         => __('Slide Info', 'fl-builder'),
			'sections'      => array(
				'info'       => array(
					'title'         => __('Slider Info', 'fl-builder'),
					'fields'        => array(
						'slider_bg_image'       => array(
							'type'          => 'photo',
							'label'         => 'Background Image',
						),
						'slider_title'       => array(
							'type'          => 'text',
							'label'         => 'Title',
							'default'   => __('Featured Title', 'fl-builder'),
						),
						'slider_description'       => array(
							'type'          => 'textarea',
							'label'         => 'Description',
							'default'   => __('Header Content.', 'fl-builder'),
						),
					)
				),
			)
		),
		'setting'      => array(
			'title'         => __('Slide Setting', 'fl-builder'),
			'sections'      => array(
				'bg'       => array(
					'title'         => __('Background', 'fl-builder'),
					'fields'        => array(
						'slider_bg_image_position'        => array(
							'type'          => 'select',
							'label'         => __('Background Image Position', 'fl-builder'),
							'default'       => 'effect-top-bottom',
							'options'       => array(
								''    			=> __('Center', 'fl-builder'),
								'top center'    => __('Top', 'fl-builder'),
								'bottom center' => __('Bottom', 'fl-builder'),
							),
						),
						'slider_bg_image_opacity'       => array(
							'type'          => 'unit',
							'label'         => 'Background Image Opacity',
							'default'       => '',
							'description'   => '%',
							'placeholder'   => '100',
						),
						'slider_bg_color'       => array(
							'type'          => 'color',
							'label'         => 'Background Color',
							'show_reset'    => true,
						),
					)
				),
				'effects'       => array(
					'title'         => __('Effects', 'fl-builder'),
					'fields'        => array(
						'slide_effect'        => array(
							'type'          => 'select',
							'label'         => __('Slide Effects', 'fl-builder'),
							'default'       => '',
							'options'       => array(
								'effect-top-bottom'  => __('Overlay Top & Bottom', 'fl-builder'),
								'effect-top'   		 => __('Overlay Top Only', 'fl-builder'),
								'effect-bottom'    	 => __('Overlay Bottom Only', 'fl-builder'),
								''    				 => __('None', 'fl-builder'),
							),
							'toggle'        => array(
								'effect-top-bottom'        => array(
									'fields'        => array('slide_effect_top_color', 'slide_effect_bottom_color')
								),
								'effect-top'        => array(
									'fields'        => array('slide_effect_top_color')
								),
								'effect-bottom'        => array(
									'fields'        => array('slide_effect_bottom_color')
								),
							),
						),
						'slide_effect_top_color'       => array(
							'type'          => 'color',
							'label'         => 'Slide Effect Top Color',
							'default'    	=> '000000',
							'show_reset'    => true,
							'description'    => ' Default: 05abe0',
						),
						'slide_effect_bottom_color'       => array(
							'type'          => 'color',
							'label'         => 'Slide Effect Bottom Color',
							'default'    	=> '05abe0',
							'show_reset'    => true,
							'description'    => ' Default: 05abe0',
						),
					)
				),
			)
		),
		'content_setting'      => array(
			'title'         => __('Content Setting', 'fl-builder'),
			'sections'      => array(
				'aligment_setting'       => array(
					'title'         => '',
					'fields'        => array(   
						'content_aligment'        => array(
							'type'          => 'select',
							'label'         => __('Content Vertical Aligment', 'fl-builder'),
							'default'       => ' top',
							'options'       => array(
								' top'    		=> __('Top', 'fl-builder'),
								' middle'    	=> __('Middle', 'fl-builder'),
								''    			=> __('Bottom', 'fl-builder'),
							),
						),
						'content_aligment_horizontal'        => array(
							'type'          => 'select',
							'label'         => __('Content Horizontal Aligment', 'fl-builder'),
							'default'       => ' left',
							'options'       => array(
								' left'    		=> __('Left', 'fl-builder'),
								''    	=> __('Center', 'fl-builder'),
								' right'    			=> __('Right', 'fl-builder'),
							),
							'toggle'        => array(
								' left'          => array(
									'fields'        => array('mobile_target_centered')
								),
								' right'          => array(
									'fields'        => array('mobile_target_centered')
								),
							)
						),
						'mobile_target_centered'        => array(
							'type'          => 'select',
							'label'         => __( 'Align Centered on Mobile', 'fl-builder' ),
							'default'       => '',
							'options'       => array(
								''		=>  'No',
								' centered-mobile'		=>  'Yes',
							),
							'help'       => 'Also Adjust Title/Desc Width to 100% on Mobile, if Desctop/Tablet value is set.',
						),
					)
				),
				'padding_setting'       => array(
					'title'         => 'Padding',
					'fields'        => array(       
						'padding_top'       => array(
							'type'          => 'unit',
							'label'         => 'Top',
							'maxlength'     => '3',
							'size'          => '4',
							'description'   => 'px',
							'responsive'  => array(
								'placeholder' => array(
									'default'    => ( isset( $global_settings->padding_top ) ) ? $global_settings->padding_top : '60',
									'medium'     => ( isset( $global_settings->padding_top_medium ) ) ? $global_settings->padding_top_medium : '',
									'responsive' => ( isset( $global_settings->padding_top_responsive ) ) ? $global_settings->padding_top_responsive : '',
								)
							),
						),    
						'padding_bottom'       => array(
							'type'          => 'unit',
							'label'         => 'Bottom',
							'maxlength'     => '3',
							'size'          => '4',
							'description'   => 'px',
							'responsive'  => array(
								'placeholder' => array(
									'default'    => ( isset( $global_settings->padding_bottom ) ) ? $global_settings->padding_bottom : '60',
									'medium'     => ( isset( $global_settings->padding_bottom_medium ) ) ? $global_settings->padding_bottom_medium : '',
									'responsive' => ( isset( $global_settings->padding_bottom_responsive ) ) ? $global_settings->padding_bottom_responsive : '',
								)
							),
						),    
						'padding_left'       => array(
							'type'          => 'unit',
							'label'         => 'Left',
							'maxlength'     => '3',
							'size'          => '4',
							'description'   => 'px',
							'responsive'  => array(
								'placeholder' => array(
									'default'    => ( isset( $global_settings->padding_left ) ) ? $global_settings->padding_left : '15',
									'medium'     => ( isset( $global_settings->padding_left_medium ) ) ? $global_settings->padding_left_medium : '',
									'responsive' => ( isset( $global_settings->padding_left_responsive ) ) ? $global_settings->padding_left_responsive : '',
								)
							),
						),    
						'padding_right'       => array(
							'type'          => 'unit',
							'label'         => 'Right',
							'maxlength'     => '3',
							'size'          => '4',
							'description'   => 'px',
							'responsive'  => array(
								'placeholder' => array(
									'default'    => ( isset( $global_settings->padding_right ) ) ? $global_settings->padding_right : '15',
									'medium'     => ( isset( $global_settings->padding_right_medium ) ) ? $global_settings->padding_right_medium : '',
									'responsive' => ( isset( $global_settings->padding_right_responsive ) ) ? $global_settings->padding_right_responsive : '',
								)
							),
						),
					)
				),
				'font_title'       => array(
					'title'         => 'Title',
					'fields'        => array(
						'title_color'        => array(
							'type'          => 'color',
							'label'         => __('Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true,
						),
						'title_size'        => array(
							'type'          => 'unit',
							'label'         => __('Size', 'fl-builder'),
							'default'       => '',
							'placeholder'       => '60',
							'description'       => 'px',
							'responsive'  => array(
								'placeholder' => array(
									'default'    => ( isset( $global_settings->title_size ) ) ? $global_settings->title_size : '60',
									'medium'     => ( isset( $global_settings->title_size_medium ) ) ? $global_settings->title_size_medium : '',
									'responsive' => ( isset( $global_settings->title_size_responsive ) ) ? $global_settings->title_size_responsive : '',
								)
							),
						),
						'title_spacing'        => array(
							'type'          => 'unit',
							'label'         => __('Spacing', 'fl-builder'),
							'default'       => '',
							'description'       => 'px',
							'responsive'  => array(
								'placeholder' => array(
									'default'    => ( isset( $global_settings->title_spacing ) ) ? $global_settings->title_spacing : '30',
									'medium'     => ( isset( $global_settings->title_spacing_medium ) ) ? $global_settings->title_spacing_medium : '',
									'responsive' => ( isset( $global_settings->title_spacing_responsive ) ) ? $global_settings->title_spacing_responsive : '',
								)
							),
						),
						'title_lineheight'        => array(
							'type'          => 'unit',
							'label'         => __('Line Height', 'fl-builder'),
							'default'       => '',
							'placeholder'       => '1.3',
							'description'       => 'em',
						),
						'title_transform'        => array(
							'type'          => 'select',
							'label'         => __('Transform', 'fl-builder'),
							'default'       => '',
							'options'       => array(
								''				=> __('None', 'fl-builder'),
								'capitalize'	=> __('Capitalize', 'fl-builder'),
								'uppercase'		=> __('Uppercase', 'fl-builder'),
								'lowercase'		=> __('Lowercase', 'fl-builder'),
							),
						),
						'title_weight'        => array(
							'type'          => 'select',
							'label'         => __('Weight', 'fl-builder'),
							'default'       => '',
							'options'       => array(
								''    		=> __('Default', 'fl-builder'),
								'100'    	=> __('100 Thin', 'fl-builder'),
								'200'    	=> __('200 Extra-Light', 'fl-builder'),
								'300'    	=> __('300 Light', 'fl-builder'),
								'400'    	=> __('400 Normal', 'fl-builder'),
								'500'    	=> __('500 Medium', 'fl-builder'),
								'600'    	=> __('600 Semi-Bold', 'fl-builder'),
								'700'    	=> __('700 Bold', 'fl-builder'),
								'800'    	=> __('800 Extra-Bold', 'fl-builder'),
								'900'    	=> __('900 Ultra-Bold', 'fl-builder'),
							),
							'help'   		=> 'Its depend to the font family if the following font-weight supported.',
						),
						'title_width'       => array(
							'type'          => 'unit',
							'label'         => 'Width',
							'default'   => '',
							'placeholder'   => '50',
							'description'   => '%',
							'responsive'  => array(
								'placeholder' => array(
									'default'    => ( isset( $global_settings->title_width ) ) ? $global_settings->title_width : '50',
									'medium'     => ( isset( $global_settings->title_width_medium ) ) ? $global_settings->title_width_medium : '',
									'responsive' => ( isset( $global_settings->title_width_responsive ) ) ? $global_settings->title_width_responsive : '',
								)
							),
						),
					)
				),
				'font_desc'       => array(
					'title'         => 'Description',
					'fields'        => array(
						'desc_color'        => array(
							'type'          => 'color',
							'label'         => __('Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true,
						),
						'desc_size'        => array(
							'type'          => 'unit',
							'label'         => __('Size', 'fl-builder'),
							'default'       => '',
							'placeholder'       => '30',
							'description'       => 'px',
							'responsive'  => array(
								'placeholder' => array(
									'default'    => ( isset( $global_settings->desc_size ) ) ? $global_settings->desc_size : '30',
									'medium'     => ( isset( $global_settings->desc_size_medium ) ) ? $global_settings->desc_size_medium : '',
									'responsive' => ( isset( $global_settings->desc_size_responsive ) ) ? $global_settings->desc_size_responsive : '',
								)
							),
						),
						'desc_spacing'        => array(
							'type'          => 'unit',
							'label'         => __('Spacing', 'fl-builder'),
							'default'       => '',
							'description'       => 'px',
							'responsive'  => array(
								'placeholder' => array(
									'default'    => ( isset( $global_settings->desc_spacing ) ) ? $global_settings->desc_spacing : '30',
									'medium'     => ( isset( $global_settings->desc_spacing_medium ) ) ? $global_settings->desc_spacing_medium : '',
									'responsive' => ( isset( $global_settings->desc_spacing_responsive ) ) ? $global_settings->desc_spacing_responsive : '',
								)
							),
						),
						'desc_lineheight'        => array(
							'type'          => 'unit',
							'label'         => __('Line Height', 'fl-builder'),
							'default'       => '',
							'placeholder'       => '1.3',
							'description'       => 'em',
						),
						'desc_transform'        => array(
							'type'          => 'select',
							'label'         => __('Transform', 'fl-builder'),
							'default'       => '',
							'options'       => array(
								''				=> __('None', 'fl-builder'),
								'capitalize'	=> __('Capitalize', 'fl-builder'),
								'uppercase'		=> __('Uppercase', 'fl-builder'),
								'lowercase'		=> __('Lowercase', 'fl-builder'),
							),
						),
						'desc_weight'        => array(
							'type'          => 'select',
							'label'         => __('Weight', 'fl-builder'),
							'default'       => '',
							'options'       => array(
								''    		=> __('Default', 'fl-builder'),
								'100'    	=> __('100 Thin', 'fl-builder'),
								'200'    	=> __('200 Extra-Light', 'fl-builder'),
								'300'    	=> __('300 Light', 'fl-builder'),
								'400'    	=> __('400 Normal', 'fl-builder'),
								'500'    	=> __('500 Medium', 'fl-builder'),
								'600'    	=> __('600 Semi-Bold', 'fl-builder'),
								'700'    	=> __('700 Bold', 'fl-builder'),
								'800'    	=> __('800 Extra-Bold', 'fl-builder'),
								'900'    	=> __('900 Ultra-Bold', 'fl-builder'),
							),
							'help'   		=> 'Its depend to the font family if the following font-weight supported.',
						),
						'desc_width'       => array(
							'type'          => 'unit',
							'label'         => 'Width',
							'default'   => '',
							'placeholder'   => '50',
							'description'   => '%',
							'responsive'  => array(
								'placeholder' => array(
									'default'    => ( isset( $global_settings->desc_width ) ) ? $global_settings->desc_width : '50',
									'medium'     => ( isset( $global_settings->desc_width_medium ) ) ? $global_settings->desc_width_medium : '',
									'responsive' => ( isset( $global_settings->desc_width_responsive ) ) ? $global_settings->desc_width_responsive : '',
								)
							),
						),
					)
				),
			)
		),
		'general_button'      => array(
			'title'         => __('Button', 'fl-builder'),
			'sections'      => array(
				'info'       => array(
					'title'         => __('Button Info', 'fl-builder'),
					'fields'        => array(
						'btn_text'          => array(
							'type'          => 'text',
							'label'         => __('Text', 'fl-builder'),
							'default'       => __('Learn More', 'fl-builder'),
							'preview'         => array(
								'type'            => 'text',
								'selector'        => '.fl-button-text'
							)
						),
						'btn_link'          => array(
							'type'          => 'link',
							'label'         => __('Link', 'fl-builder'),
							'default'       => __('#', 'fl-builder'),
							'placeholder'   => __( 'http://www.example.com', 'fl-builder' ),
							'preview'       => array(
								'type'          => 'none'
							)
						),
						'btn_link_target'   => array(
							'type'          => 'select',
							'label'         => __('Link Target', 'fl-builder'),
							'default'       => '_self',
							'options'       => array(
								'_self'         => __('Same Window', 'fl-builder'),
								'_blank'        => __('New Window', 'fl-builder')
							),
							'preview'       => array(
								'type'          => 'none'
							)
						),
						'btn_link_nofollow'          => array(
							'type'          => 'select',
							'label'         => __('Link No Follow', 'fl-builder'),
							'default'       => 'no',
							'options' 		=> array(
								'yes' 			=> __('Yes', 'fl-builder'),
								'no' 			=> __('No', 'fl-builder'),
							),
							'preview'       => array(
								'type'          => 'none'
							)
						),
					)
				),
				'types'       => array(
					'title'         => __('Button Type', 'fl-builder'),
					'fields'        => array(
						'btn_type'          => array(
							'type'          => 'select',
							'label'         => __('Type', 'fl-builder'),
							'default'       => 'btn-default',
							'options' 		=> array(
								'btn-default' 	=> __('Default', 'fl-builder'),
								'btn-primary' 	=> __('Primary', 'fl-builder'),
								'btn-success' 	=> __('Success', 'fl-builder'),
								'btn-info' 		=> __('Info', 'fl-builder'),
								'btn-warning' 	=> __('Warning', 'fl-builder'),
								'btn-danger' 	=> __('Danger', 'fl-builder'),
								'btn-link' 		=> __('Link', 'fl-builder'),
							),
						),
						'btn_icon'          => array(
							'type'          => 'icon',
							'label'         => __('Icon', 'fl-builder'),
							'show_remove'   => true
						),
						'btn_icon_position' => array(
							'type'          => 'select',
							'label'         => __('Icon Position', 'fl-builder'),
							'default'       => 'before',
							'options'       => array(
								'before'        => __('Before Text', 'fl-builder'),
								'after'         => __('After Text', 'fl-builder')
							)
						),
						'btn_icon_animation' => array(
							'type'          => 'select',
							'label'         => __('Icon Visibility', 'fl-builder'),
							'default'       => '',
							'options'       => array(
								''        => __('Always Visible', 'fl-builder'),
								' btn-reveal'         => __('Fade In On Hover', 'fl-builder')
							)
						),
					)
				),
				'styles'       => array(
					'title'         => __('Button Style', 'fl-builder'),
					'fields'        => array(
						'btn_style' => array(
							'type'          => 'select',
							'label'         => __('Button Style', 'fl-builder'),
							'default'       => '',
							'options'       => array(
								''        => __('Default', 'fl-builder'),
								' btn-flat'        => __('Flat', 'fl-builder'),
								' btn-gradient'        => __('Gradient', 'fl-builder'),
								' btn-outline'        => __('Outline', 'fl-builder'),
							),
							'toggle'        => array(
								''          => array(
									'fields'        => array('btn_bg_color', 'btn_text_color', 'btn_border_color', 'btn_bg_hover_color', 'btn_text_hover_color', 'btn_border_hover_color')
								),
								' btn-flat'          => array(
									'fields'        => array('btn_bg_color', 'btn_text_color', 'btn_bg_hover_color', 'btn_text_hover_color')
								),
								' btn-gradient'          => array(
									'fields'        => array('btn_bg_color', 'btn_text_color', 'btn_bg_color_2', 'btn_bg_gradient_orientation', 'btn_bg_hover_color', 'btn_text_hover_color', 'btn_bg_hover_color_2', 'btn_bg_gradient_border')
								),
								' btn-outline'          => array(
									'fields'        => array('btn_text_color', 'btn_border_color', 'btn_text_hover_color', 'btn_border_hover_color')
								),
							)
						),
						'btn_bg_gradient_orientation' => array(
							'type'          => 'select',
							'label'         => __('Gradient Orientation', 'fl-builder'),
							'default'       => 'vertical',
							'options'       => array(
								'vertical'        => __('Vertical', 'fl-builder'),
								'horizontal'        => __('Horizontal', 'fl-builder'),
							),
						),
						'btn_bg_gradient_border' => array(
							'type'          => 'select',
							'label'         => __('Gradient Border', 'fl-builder'),
							'default'       => '',
							'options'       => array(
								''			=> __('Default', 'fl-builder'),
								' btn-borderless' => __('Borderless', 'fl-builder'),
							),
						),
						'btn_effects'         => array(
							'type'          => 'select',
							'label'         => __('Button Effects', 'fl-builder'),
							'default'       => ' btn-effects-outline',
							'options'       => array(
								''        				=> __('None', 'fl-builder'),
								' btn-effects-outline'	=> __('Outline', 'fl-builder'),
								' btn-effects-shadow'   => __('Shadow', 'fl-builder'),
								' btn-effects-3d'       => __('3D', 'fl-builder'),
							)
						),
					)
				),
				'colors'       => array(
					'title'         => __('Button Custom Color', 'fl-builder'),
					'fields'        => array(
						'btn_bg_color'      => array(
							'type'          => 'color',
							'label'         => __('Background Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true
						),
						'btn_bg_color_2'      => array(
							'type'          => 'color',
							'label'         => __('Background Gradient Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true
						),
						'btn_text_color'    => array(
							'type'          => 'color',
							'label'         => __('Text Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true
						),
						'btn_border_color'    => array(
							'type'          => 'color',
							'label'         => __('Border Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true
						),
						'btn_bg_hover_color' => array(
							'type'          => 'color',
							'label'         => __('Background Hover Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true,
						),
						'btn_bg_hover_color_2' => array(
							'type'          => 'color',
							'label'         => __('Background Gradient Hover Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true,
						),
						'btn_text_hover_color' => array(
							'type'          => 'color',
							'label'         => __('Text Hover Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true,
						),
						'btn_border_hover_color'    => array(
							'type'          => 'color',
							'label'         => __('Border Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true
						),
					)
				),
			)
		),
		'general_button_secondary'      => array(
			'title'         => __('Button Secondary', 'fl-builder'),
			'sections'      => array(
				'info_secondary'       => array(
					'title'         => __('Button Info', 'fl-builder'),
					'fields'        => array(
						'btn_text_secondary'          => array(
							'type'          => 'text',
							'label'         => __('Text', 'fl-builder'),
							'default'       => __('Contact Us', 'fl-builder'),
							'preview'         => array(
								'type'            => 'text',
								'selector'        => '.fl-button-text'
							)
						),
						'btn_link_secondary'          => array(
							'type'          => 'link',
							'label'         => __('Link', 'fl-builder'),
							'placeholder'   => __( 'http://www.example.com', 'fl-builder' ),
							'preview'       => array(
								'type'          => 'none'
							)
						),
						'btn_link_target_secondary'   => array(
							'type'          => 'select',
							'label'         => __('Link Target', 'fl-builder'),
							'default'       => '_self',
							'options'       => array(
								'_self'         => __('Same Window', 'fl-builder'),
								'_blank'        => __('New Window', 'fl-builder')
							),
							'preview'       => array(
								'type'          => 'none'
							)
						),
						'btn_link_nofollow_secondary'          => array(
							'type'          => 'select',
							'label'         => __('Link No Follow', 'fl-builder'),
							'default'       => 'no',
							'options' 		=> array(
								'yes' 			=> __('Yes', 'fl-builder'),
								'no' 			=> __('No', 'fl-builder'),
							),
							'preview'       => array(
								'type'          => 'none'
							)
						),
					)
				),
				'types_secondary'       => array(
					'title'         => __('Button Type', 'fl-builder'),
					'fields'        => array(
						'btn_type_secondary'          => array(
							'type'          => 'select',
							'label'         => __('Type', 'fl-builder'),
							'default'       => 'btn-default',
							'options' 		=> array(
								'btn-default' 	=> __('Default', 'fl-builder'),
								'btn-primary' 	=> __('Primary', 'fl-builder'),
								'btn-success' 	=> __('Success', 'fl-builder'),
								'btn-info' 		=> __('Info', 'fl-builder'),
								'btn-warning' 	=> __('Warning', 'fl-builder'),
								'btn-danger' 	=> __('Danger', 'fl-builder'),
								'btn-link' 		=> __('Link', 'fl-builder'),
							),
						),
						'btn_icon_secondary'          => array(
							'type'          => 'icon',
							'label'         => __('Icon', 'fl-builder'),
							'show_remove'   => true
						),
						'btn_icon_position_secondary' => array(
							'type'          => 'select',
							'label'         => __('Icon Position', 'fl-builder'),
							'default'       => 'before',
							'options'       => array(
								'before'        => __('Before Text', 'fl-builder'),
								'after'         => __('After Text', 'fl-builder')
							)
						),
						'btn_icon_animation_secondary' => array(
							'type'          => 'select',
							'label'         => __('Icon Visibility', 'fl-builder'),
							'default'       => '',
							'options'       => array(
								''        => __('Always Visible', 'fl-builder'),
								' btn-reveal'         => __('Fade In On Hover', 'fl-builder')
							)
						),
					)
				),
				'styles_secondary'       => array(
					'title'         => __('Button Style', 'fl-builder'),
					'fields'        => array(
						'btn_style_secondary' => array(
							'type'          => 'select',
							'label'         => __('Button Style', 'fl-builder'),
							'default'       => '',
							'options'       => array(
								''        => __('Default', 'fl-builder'),
								' btn-flat'        => __('Flat', 'fl-builder'),
								' btn-gradient'        => __('Gradient', 'fl-builder'),
								' btn-outline'        => __('Outline', 'fl-builder'),
							),
							'toggle'        => array(
								''          => array(
									'fields'        => array('btn_bg_color_secondary', 'btn_text_color_secondary', 'btn_border_color_secondary', 'btn_bg_hover_color_secondary', 'btn_text_hover_color_secondary', 'btn_border_hover_color_secondary')
								),
								' btn-flat'          => array(
									'fields'        => array('btn_bg_color_secondary', 'btn_text_color_secondary', 'btn_bg_hover_color_secondary', 'btn_text_hover_color_secondary')
								),
								' btn-gradient'          => array(
									'fields'        => array('btn_bg_color_secondary', 'btn_border_color_secondary', 'btn_text_hover_color_secondary', 'btn_text_color_secondary', 'btn_bg_color_2_secondary', 'btn_bg_gradient_orientation_secondary', 'btn_bg_hover_color_secondary', 'btn_text_hover_color_secondary', 'btn_bg_hover_color_2_secondary', 'btn_bg_gradient_border_secondary')
								),
								' btn-outline'          => array(
									'fields'        => array('btn_text_color_secondary', 'btn_border_color_secondary', 'btn_text_hover_color_secondary', 'btn_border_hover_color_secondary')
								),
							)
						),
						'btn_bg_gradient_orientation_secondary' => array(
							'type'          => 'select',
							'label'         => __('Gradient Orientation', 'fl-builder'),
							'default'       => 'vertical',
							'options'       => array(
								'vertical'        => __('Vertical', 'fl-builder'),
								'horizontal'        => __('Horizontal', 'fl-builder'),
							),
						),
						'btn_bg_gradient_border_secondary' => array(
							'type'          => 'select',
							'label'         => __('Gradient Border', 'fl-builder'),
							'default'       => '',
							'options'       => array(
								''			=> __('Default', 'fl-builder'),
								' btn-borderless' => __('Borderless', 'fl-builder'),
							),
						),
						'btn_effects_secondary'         => array(
							'type'          => 'select',
							'label'         => __('Button Effects', 'fl-builder'),
							'default'       => ' btn-effects-outline',
							'options'       => array(
								''        				=> __('None', 'fl-builder'),
								' btn-effects-outline'	=> __('Outline', 'fl-builder'),
								' btn-effects-shadow'   => __('Shadow', 'fl-builder'),
								' btn-effects-3d'       => __('3D', 'fl-builder'),
							)
						),
					)
				),
				'colors_secondary'       => array(
					'title'         => __('Button Custom Color', 'fl-builder'),
					'fields'        => array(
						'btn_bg_color_secondary'      => array(
							'type'          => 'color',
							'label'         => __('Background Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true
						),
						'btn_bg_color_2_secondary'      => array(
							'type'          => 'color',
							'label'         => __('Background Gradient Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true
						),
						'btn_text_color_secondary'    => array(
							'type'          => 'color',
							'label'         => __('Text Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true
						),
						'btn_border_color_secondary'    => array(
							'type'          => 'color',
							'label'         => __('Border Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true
						),
						'btn_bg_hover_color_secondary' => array(
							'type'          => 'color',
							'label'         => __('Background Hover Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true,
						),
						'btn_bg_hover_color_2_secondary' => array(
							'type'          => 'color',
							'label'         => __('Background Gradient Hover Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true,
						),
						'btn_text_hover_color_secondary' => array(
							'type'          => 'color',
							'label'         => __('Text Hover Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true,
						),
						'btn_border_hover_color_secondary'    => array(
							'type'          => 'color',
							'label'         => __('Border Color', 'fl-builder'),
							'default'       => '',
							'show_reset'    => true
						),
					)
				),
			)
		),
	)
));