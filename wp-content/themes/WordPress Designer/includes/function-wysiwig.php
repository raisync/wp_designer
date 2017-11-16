<?php 
/*Wysiwig Custom Color*/
add_filter('tiny_mce_before_init', 'my_mce4_options');
function my_mce4_options($init) {
	$default_colours = '"000000", "Black", "993300", "Burnt orange", "333300", "Dark olive", "003300", "Dark green", "003366", "Dark azure", "000080", "Navy Blue", "333399", "Indigo", "333333", "Very dark gray", "800000", "Maroon", "FF6600", "Orange", "808000", "Olive", "008000", "Green", "008080", "Teal", "0000FF", "Blue", "666699", "Grayish blue", "808080", "Gray", "FF0000", "Red", "FF9900", "Amber", "99CC00", "Yellow green", "339966", "Sea green", "33CCCC", "Turquoise", "3366FF", "Royal blue", "800080", "Purple", "999999", "Medium gray", "FF00FF", "Magenta", "FFCC00", "Gold", "FFFF00", "Yellow", "00FF00", "Lime", "00FFFF", "Aqua", "00CCFF", "Sky blue", "993366", "Brown", "C0C0C0", "Silver" ';
	$custom_colours =  '"ffffff", "ffffff",
						"ffffff", "ffffff",
						"ffffff", "ffffff",
						"ffffff", "ffffff",
						"ffffff", "ffffff",
						"ffffff", "ffffff",
						"ffffff", "ffffff",
						"ffffff", "ffffff",
						"0aa43d", "0aa43d",
						"d92b2c", "d92b2c",
						"cacaca", "cacaca",
						';
  $init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']';
  $init['textcolor_rows'] = 6;
  return $init;
}
/*Wysiwig Custom Buttons*/
add_filter( 'mce_buttons_2', 'wdm_add_mce_fontoptions' );
if ( ! function_exists( 'wdm_add_mce_fontoptions' ) ) {
   function wdm_add_mce_fontoptions( $buttons ) {
		 array_unshift( $buttons, 'fontselect' );
		 //array_unshift( $buttons, 'fontsizeselect' );
		 return $buttons;
   }
}
/*Wysiwig Custom font sizes*/
add_filter( 'tiny_mce_before_init', 'wpex_mce_text_sizes' );
if ( ! function_exists( 'wpex_mce_text_sizes' ) ) {
	function wpex_mce_text_sizes( $initArray ){
		$initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 15px 16px 17px 18px 19px 20px 21px 22px 23px 24px 25px 26px 27px 28px 29px 30px 32px 33px 34px 35px 36px 37px 38px 39px 40px 41px 42px 43px 44px 45px 46px 47px 48px 49px 50px 51px 52px 53px 54px 55px 56px 57px 58px 59px 60px";
		return $initArray;
	}
}
/*Wysiwig Custom Buttons*/
add_filter( 'mce_buttons_2', 'format_mce_editor_buttons' );
function format_mce_editor_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
/*Wysiwig Custom Buttons*/
add_filter( 'tiny_mce_before_init', 'format_mce_before_init' );
function format_mce_before_init( $settings ) {
    $style_formats = array(
		/*Headings Look Like*/
		array(
            'title' => 'Headings Look Like',
            'items' => array(
				array( 'title' => 'Look likes Heading 1', 'selector' => '*', 'classes' => 'h1' ),
				array( 'title' => 'Look likes Heading 2', 'selector' => '*', 'classes' => 'h2' ),
				array( 'title' => 'Look likes Heading 3', 'selector' => '*', 'classes' => 'h3' ),
				array( 'title' => 'Look likes Heading 4', 'selector' => '*', 'classes' => 'h4' ),
				array( 'title' => 'Look likes Heading 5', 'selector' => '*', 'classes' => 'h5' ),
				array( 'title' => 'Look likes Heading 6', 'selector' => '*', 'classes' => 'h6' ),
            ),
        ),
		/*Wrappers*/
		array(
            'title' => 'Wrappers',
            'items' => array(
				array( 'title' => 'small', 			'inline' => 'small',	'wrapper' => true, ),
				array( 'title' => 'mark', 			'inline' => 'mark', 'wrapper' => true, ),
				array( 'title' => 'blockquote', 	'block' => 'blockquote', 'wrapper' => true, ),  
				array( 'title' => 'div', 			'block' => 'div', 'wrapper' => true, ),
				array( 'title' => 'pre', 			'block' => 'pre', 'wrapper' => true, ),
				array( 'title' => 'header', 		'block' => 'header', 'wrapper' => true, ),
				array( 'title' => 'footer', 		'block' => 'footer', 'wrapper' => true, ),
				array( 'title' => 'aside', 			'block' => 'aside', 'wrapper' => true, ),
				array( 'title' => 'nav', 			'block' => 'nav', 'wrapper' => true, ),
				array( 'title' => 'figure', 		'block' => 'figure', 'wrapper' => true, ),
				array( 'title' => 'figcaption', 	'block' => 'figcaption', 'wrapper' => true, ),
				array( 'title' => 'cite', 			'block' => 'cite', 'wrapper' => true, ),
            ),
        ),
		/*Font-weight*/
		array(
            'title' => 'Font Weight',
            'items' => array(
				array( 'title' => 'Thin', 		'inline' => 'span', 'styles' => array( 'font-weight' => '100', ) ),
				array( 'title' => 'Light', 		'inline' => 'span', 'styles' => array( 'font-weight' => '300', ) ),
				array( 'title' => 'Regular', 	'inline' => 'span', 'styles' => array( 'font-weight' => '400', ) ),
				array( 'title' => 'Semibold', 	'inline' => 'span', 'styles' => array( 'font-weight' => '600', ) ),
				array( 'title' => 'Bold', 		'inline' => 'span', 'styles' => array( 'font-weight' => '700', ) ),
				array( 'title' => 'Bolder', 	'inline' => 'span', 'styles' => array( 'font-weight' => '800', ) ),
				array( 'title' => 'Ultrabold', 	'inline' => 'span', 'styles' => array( 'font-weight' => '900', ) ),
            ),
        ),
		/*Line Height*/
		array(
            'title' => 'Line Height',
            'items' => array(
				array( 'title' => 'Normal', 'selector' => '*', 'styles' => array( 'line-height' => 'normal', ) ),
				array( 'title' => '0.5em', 'selector' => '*', 'styles' => array( 'line-height' => '0.5em', ) ),
				array( 'title' => '0.6em', 'selector' => '*', 'styles' => array( 'line-height' => '0.6em', ) ),
				array( 'title' => '0.7em', 'selector' => '*', 'styles' => array( 'line-height' => '0.7em', ) ),
				array( 'title' => '0.8em', 'selector' => '*', 'styles' => array( 'line-height' => '0.8em', ) ),
				array( 'title' => '0.9em', 'selector' => '*', 'styles' => array( 'line-height' => '0.9em', ) ),
				array( 'title' => '1.0em', 'selector' => '*', 'styles' => array( 'line-height' => '1.0em', ) ),
				array( 'title' => '1.1em', 'selector' => '*', 'styles' => array( 'line-height' => '1.1em', ) ),
				array( 'title' => '1.2em', 'selector' => '*', 'styles' => array( 'line-height' => '1.2em', ) ),
				array( 'title' => '1.3em', 'selector' => '*', 'styles' => array( 'line-height' => '1.3em', ) ),
				array( 'title' => '1.4em', 'selector' => '*', 'styles' => array( 'line-height' => '1.4em', ) ),
				array( 'title' => '1.5em', 'selector' => '*', 'styles' => array( 'line-height' => '1.5em', ) ),
				array( 'title' => '1.6em', 'selector' => '*', 'styles' => array( 'line-height' => '1.6em', ) ),
				array( 'title' => '1.7em', 'selector' => '*', 'styles' => array( 'line-height' => '1.7em', ) ),
				array( 'title' => '1.8em', 'selector' => '*', 'styles' => array( 'line-height' => '1.8em', ) ),
				array( 'title' => '1.9em', 'selector' => '*', 'styles' => array( 'line-height' => '1.9em', ) ),
				array( 'title' => '2.0em', 'selector' => '*', 'styles' => array( 'line-height' => '2.0em', ) ),
				array( 'title' => '2.1em', 'selector' => '*', 'styles' => array( 'line-height' => '2.1em', ) ),
				array( 'title' => '2.2em', 'selector' => '*', 'styles' => array( 'line-height' => '2.2em', ) ),
				array( 'title' => '2.3em', 'selector' => '*', 'styles' => array( 'line-height' => '2.3em', ) ),
				array( 'title' => '2.4em', 'selector' => '*', 'styles' => array( 'line-height' => '2.4em', ) ),
				array( 'title' => '2.5em', 'selector' => '*', 'styles' => array( 'line-height' => '2.5em', ) ),
				array( 'title' => '2.6em', 'selector' => '*', 'styles' => array( 'line-height' => '2.6em', ) ),
				array( 'title' => '2.7em', 'selector' => '*', 'styles' => array( 'line-height' => '2.7em', ) ),
				array( 'title' => '2.8em', 'selector' => '*', 'styles' => array( 'line-height' => '2.8em', ) ),
				array( 'title' => '2.9em', 'selector' => '*', 'styles' => array( 'line-height' => '2.9em', ) ),
				array( 'title' => '3.0em', 'selector' => '*', 'styles' => array( 'line-height' => '3.0em', ) ),
            ),
        ),
		/*Margin Top*/
		array(
            'title' => 'Margin Top',
            'items' => array(
				array( 'title' => '0px', 'selector' => '*', 'styles' => array( 'margin-top' => '0px', ) ),
				array( 'title' => '5px', 'selector' => '*', 'styles' => array( 'margin-top' => '5px', ) ),
				array( 'title' => '10px', 'selector' => '*', 'styles' => array( 'margin-top' => '10px', ) ),
				array( 'title' => '15px', 'selector' => '*', 'styles' => array( 'margin-top' => '15px', ) ),
				array( 'title' => '20px', 'selector' => '*', 'styles' => array( 'margin-top' => '20px', ) ),
				array( 'title' => '25px', 'selector' => '*', 'styles' => array( 'margin-top' => '25px', ) ),
				array( 'title' => '30px', 'selector' => '*', 'styles' => array( 'margin-top' => '30px', ) ),
				array( 'title' => '35px', 'selector' => '*', 'styles' => array( 'margin-top' => '35px', ) ),
				array( 'title' => '40px', 'selector' => '*', 'styles' => array( 'margin-top' => '40px', ) ),
				array( 'title' => '45px', 'selector' => '*', 'styles' => array( 'margin-top' => '45px', ) ),
				array( 'title' => '50px', 'selector' => '*', 'styles' => array( 'margin-top' => '50px', ) ),
				array( 'title' => '55px', 'selector' => '*', 'styles' => array( 'margin-top' => '55px', ) ),
				array( 'title' => '60px', 'selector' => '*', 'styles' => array( 'margin-top' => '60px', ) ),
				array( 'title' => '65px', 'selector' => '*', 'styles' => array( 'margin-top' => '65px', ) ),
				array( 'title' => '70px', 'selector' => '*', 'styles' => array( 'margin-top' => '70px', ) ),
				array( 'title' => '75px', 'selector' => '*', 'styles' => array( 'margin-top' => '75px', ) ),
            ),
        ),
		/*Margin Bottom*/
		array(
            'title' => 'Margin Bottom',
            'items' => array(
				array( 'title' => '0px', 'selector' => '*', 'styles' => array( 'margin-bottom' => '0px', ) ),
				array( 'title' => '5px', 'selector' => '*', 'styles' => array( 'margin-bottom' => '5px', ) ),
				array( 'title' => '10px', 'selector' => '*', 'styles' => array( 'margin-bottom' => '10px', ) ),
				array( 'title' => '15px', 'selector' => '*', 'styles' => array( 'margin-bottom' => '15px', ) ),
				array( 'title' => '20px', 'selector' => '*', 'styles' => array( 'margin-bottom' => '20px', ) ),
				array( 'title' => '25px', 'selector' => '*', 'styles' => array( 'margin-bottom' => '25px', ) ),
				array( 'title' => '30px', 'selector' => '*', 'styles' => array( 'margin-bottom' => '30px', ) ),
				array( 'title' => '35px', 'selector' => '*', 'styles' => array( 'margin-bottom' => '35px', ) ),
				array( 'title' => '40px', 'selector' => '*', 'styles' => array( 'margin-bottom' => '40px', ) ),
				array( 'title' => '45px', 'selector' => '*', 'styles' => array( 'margin-bottom' => '45px', ) ),
				array( 'title' => '50px', 'selector' => '*', 'styles' => array( 'margin-bottom' => '50px', ) ),
				array( 'title' => '55px', 'selector' => '*', 'styles' => array( 'margin-bottom' => '55px', ) ),
				array( 'title' => '60px', 'selector' => '*', 'styles' => array( 'margin-bottom' => '60px', ) ),
				array( 'title' => '65px', 'selector' => '*', 'styles' => array( 'margin-bottom' => '65px', ) ),
				array( 'title' => '70px', 'selector' => '*', 'styles' => array( 'margin-bottom' => '70px', ) ),
				array( 'title' => '75px', 'selector' => '*', 'styles' => array( 'margin-bottom' => '75px', ) ),
            ),
        ),
		/*Padding Top*/
		array(
            'title' => 'Padding Top',
            'items' => array(
				array( 'title' => '0px', 'selector' => '*', 'styles' => array( 'padding-top' => '0px', ) ),
				array( 'title' => '5px', 'selector' => '*', 'styles' => array( 'padding-top' => '5px', ) ),
				array( 'title' => '10px', 'selector' => '*', 'styles' => array( 'padding-top' => '10px', ) ),
				array( 'title' => '15px', 'selector' => '*', 'styles' => array( 'padding-top' => '15px', ) ),
				array( 'title' => '20px', 'selector' => '*', 'styles' => array( 'padding-top' => '20px', ) ),
				array( 'title' => '25px', 'selector' => '*', 'styles' => array( 'padding-top' => '25px', ) ),
				array( 'title' => '30px', 'selector' => '*', 'styles' => array( 'padding-top' => '30px', ) ),
				array( 'title' => '35px', 'selector' => '*', 'styles' => array( 'padding-top' => '35px', ) ),
				array( 'title' => '40px', 'selector' => '*', 'styles' => array( 'padding-top' => '40px', ) ),
				array( 'title' => '45px', 'selector' => '*', 'styles' => array( 'padding-top' => '45px', ) ),
				array( 'title' => '50px', 'selector' => '*', 'styles' => array( 'padding-top' => '50px', ) ),
				array( 'title' => '55px', 'selector' => '*', 'styles' => array( 'padding-top' => '55px', ) ),
				array( 'title' => '60px', 'selector' => '*', 'styles' => array( 'padding-top' => '60px', ) ),
				array( 'title' => '65px', 'selector' => '*', 'styles' => array( 'padding-top' => '65px', ) ),
				array( 'title' => '70px', 'selector' => '*', 'styles' => array( 'padding-top' => '70px', ) ),
				array( 'title' => '75px', 'selector' => '*', 'styles' => array( 'padding-top' => '75px', ) ),
            ),
        ),
		/*Padding Bottom*/
		array(
            'title' => 'Padding Bottom',
            'items' => array(
				array( 'title' => '0px', 'selector' => '*', 'styles' => array( 'padding-bottom' => '0px', ) ),
				array( 'title' => '5px', 'selector' => '*', 'styles' => array( 'padding-bottom' => '5px', ) ),
				array( 'title' => '10px', 'selector' => '*', 'styles' => array( 'padding-bottom' => '10px', ) ),
				array( 'title' => '15px', 'selector' => '*', 'styles' => array( 'padding-bottom' => '15px', ) ),
				array( 'title' => '20px', 'selector' => '*', 'styles' => array( 'padding-bottom' => '20px', ) ),
				array( 'title' => '25px', 'selector' => '*', 'styles' => array( 'padding-bottom' => '25px', ) ),
				array( 'title' => '30px', 'selector' => '*', 'styles' => array( 'padding-bottom' => '30px', ) ),
				array( 'title' => '35px', 'selector' => '*', 'styles' => array( 'padding-bottom' => '35px', ) ),
				array( 'title' => '40px', 'selector' => '*', 'styles' => array( 'padding-bottom' => '40px', ) ),
				array( 'title' => '45px', 'selector' => '*', 'styles' => array( 'padding-bottom' => '45px', ) ),
				array( 'title' => '50px', 'selector' => '*', 'styles' => array( 'padding-bottom' => '50px', ) ),
				array( 'title' => '55px', 'selector' => '*', 'styles' => array( 'padding-bottom' => '55px', ) ),
				array( 'title' => '60px', 'selector' => '*', 'styles' => array( 'padding-bottom' => '60px', ) ),
				array( 'title' => '65px', 'selector' => '*', 'styles' => array( 'padding-bottom' => '65px', ) ),
				array( 'title' => '70px', 'selector' => '*', 'styles' => array( 'padding-bottom' => '70px', ) ),
				array( 'title' => '75px', 'selector' => '*', 'styles' => array( 'padding-bottom' => '75px', ) ),
            ),
        ),
    );
    $settings['style_formats'] = json_encode( $style_formats );
    return $settings;
}
?>