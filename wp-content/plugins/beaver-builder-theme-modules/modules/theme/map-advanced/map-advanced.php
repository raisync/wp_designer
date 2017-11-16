<?php

/**
 * @class MapAdvancedModule
 */
class MapAdvancedModule extends FLBuilderModule {

	/** 
	 * @method __construct
	 */  
	public function __construct()
	{
		global $foldercategory;
		parent::__construct(array(
			'name'          	=> __('Map - Advance', 'fl-builder'),
			'description'   	=> __('Customable Map.', 'fl-builder'),
			'category'      	=> __($foldercategory, 'fl-builder'),
			'partial_refresh'	=> true
		));
		$this->add_js( 'map-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyARgl1K2BLpzVNMuj2QSaIgJznPsQpFQ0c', array(), '', true );
	}
}


function getLatLong($address){
    if(!empty($address)){
        //Formatted address
        $formattedAddr = str_replace(' ','+',$address);
        //Send request and receive json data by address
        $geocodeFromAddr = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false'); 
        $output = json_decode($geocodeFromAddr);
        //Get latitude and longitute from json data
        $data['latitude']  = $output->results[0]->geometry->location->lat; 
        $data['longitude'] = $output->results[0]->geometry->location->lng;
        //Return latitude and longitude of the given address
        if(!empty($data)){
            return $data;
        }else{
            return false;
        }
    }else{
        return false;   
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('MapAdvancedModule', array(
	'general'       => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'address'       => array(
						'type'          => 'text',
						'label'         => __('Address', 'fl-builder'),
						'placeholder'   => __('1865 Winchester Blvd #202 Campbell, CA 95008', 'fl-builder'),
					),
					'height'        => array(
						'type'          => 'unit',
						'label'         => __('Height', 'fl-builder'),
						'default'       => '400',
						'size'          => '5',
						'description'   => 'px',
					),
					'zoom'        => array(
						'type'          => 'unit',
						'label'         => __('Zoom', 'fl-builder'),
						'default'       => '',
						'placeholder'   => '15',
						'size'          => '2',
						'description'   => 'distance',
					),
					'marker'        => array(
						'type'          => 'photo',
						'label'         => __('Marker', 'fl-builder'),
						'show_remove'   => 'true',
					),
					'marker_animation'        => array(
						'type'          => 'select',
						'label'         => __('Animation', 'fl-builder'),
						'default'       => 'yes',
						'options' 		=> array(
							'yes' 		=> __('Yes', 'fl-builder'),
							'no' 		=> __('No', 'fl-builder')
						),
					),
					'map_color'        => array(
						'type'          => 'code',
						'label'         => 'Map Color by Snazzy Maps',
						'help'          => 'Paste the code then -> Pls remove the bracket "[" and "]" from first and last of the script to work',
						'description'   => 'Get Code <a href="https://snazzymaps.com/explore" target="_blank"><strong>Explore Style</strong></a> or <a href="https://snazzymaps.com/editor" target="_blank">Create Style</a> <br><strong>Pls remove the bracket <span style="color:red;">"[" and "]"</span> from first and last of the script to work</strong>',
						'editor'        => 'javascript',
						'rows'          => '5',
						'preview'           => array(
							'type'              => 'none'
						)
					),
				)
			)
		)
	)
));